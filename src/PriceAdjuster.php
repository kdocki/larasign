<?php

use Illuminate\Support\Collection;

class PriceAdjuster implements AbstractPriceAdjuster
{
	protected $cid = 1;

	public function __construct()
	{
		$this->products = new Collection;
		$this->coupons = new Collection;
		$this->customerBenefits = new Collection;
		$this->appliedCoupons = [];
	}

	public function adjustPrices()
	{
		$customerDiscount = $this->getCustomerDiscount();

		foreach ($this->products as $product)
		{
			$oldPrice = $product->price();
			$newPrice = round($this->getCouponDiscountForProduct($product) * (1 - $customerDiscount / 100), 2);
			if ($oldPrice !== $newPrice) $product->modifyPrice($newPrice);
		}
	}

	public function addAdjustment(PriceAdjustment $adjustment)
	{
		$this->{'add' . get_class($adjustment)}($adjustment);
	}

	public function removeAdjustment(PriceAdjustment $adjustment)
	{
		$this->{'remove' . get_class($adjustment)}($adjustment);
	}

	protected function addProduct(Product $product)
	{
		$this->addToCollection($this->products, $product);
	}

	protected function addCustomerBenefit(CustomerBenefit $benefit)
	{
		$this->addToCollection($this->customerBenefits, $benefit);
	}

	protected function addCoupon(Coupon $coupon)
	{
		$this->addToCollection($this->coupons, $coupon);
	}

	protected function removeProduct(Product $product)
	{
		unset($this->appliedCoupons[$product->cid]);

		$this->removeFromCollection($this->products, $product);
	}

	protected function removeCoupon(Coupon $coupon)
	{
		$key = array_search($coupon->cid, $this->appliedCoupons);

		if ($key !== false) unset($this->appliedCoupons[$key]);

		$this->removeFromCollection($this->coupons, $coupon);
	}

	protected function removeCustomerBenefit(CustomerBenefit $benefit)
	{
		$this->removeFromCollection($this->customerBenefits, $benefit);
	}

	protected function addToCollection($collection, $object)
	{
		$object->cid = $this->cid++;

		$collection->push($object);

		$this->adjustPrices();
	}

	protected function removeFromCollection($collection, $object)
	{
		$key = $collection->search($object);

		$collection->forget($key);

		$this->adjustPrices();
	}

	protected function getCouponDiscountForProduct($product)
	{
		$coupon = $this->getOneCouponPerProduct($product);

		return $product->original() - ($coupon ? $coupon->amount() : 0);
	}

	protected function getOneCouponPerProduct($product)
	{
		$appliedCoupons = $this->appliedCoupons;

		$alreadyMapped = isset($appliedCoupons[$product->cid]) ? $appliedCoupons[$product->cid] : false;

		$found = $this->coupons->filter(function($coupon) use ($product, $appliedCoupons, $alreadyMapped)
		{
			if ($alreadyMapped !== false)
			{
				return $coupon->cid == $alreadyMapped;
			}

			return $product->name() == $coupon->name() && !in_array($coupon->cid, $appliedCoupons);
		});

		if ($found->isEmpty()) return null;

		$coupon = $found->first();

		$this->appliedCoupons[$product->cid] = $coupon->cid;

		return $coupon;
	}

	protected function getCustomerDiscount()
	{
		/// tally up all the customer discounts
		$customerDiscount = min(100, $this->customerBenefits->reduce(function($value, $benefit)
		{
			$discount = $benefit ? $benefit->discount() : 0;

			return $value + $discount;
		}));

		// prevent using over 3 coupons business rule
		// and getting customer benefit discounts
		if ($this->coupons->count() > 2)
		{
			$customerDiscount = 0;
		}

		return $customerDiscount;
	}
}