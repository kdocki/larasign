<?php namespace Example2;

class VendingMachine
{
	protected $insertedMoney;

	protected $totalMoney;

	protected $products = [
		'Dr. Pepper' 	=> ['amount' => 0, 'price' => 125],
		'Pepsi' 		=> ['amount' => 1, 'price' => 125],
		'Mountain Dew' 	=> ['amount' => 0, 'price' => 125],
	];

	public function __construct($totalMoney = 0, $insertedMoney = 0)
	{
		$this->totalMoney = $totalMoney;
		$this->insertedMoney = $insertedMoney;
	}

	public function insertMoney($money)
	{
		$this->insertedMoney += $money;
	}

	public function insertedMoney()
	{
		return $this->insertedMoney;
	}

	public function refundMoney()
	{
		$refund = $this->insertedMoney;

		$this->insertedMoney = 0;

		return $refund;
	}

	public function products()
	{
		return $this->products;
	}

	public function numberOfRemaining($product)
	{
		return $this->products[$product]['amount'];
	}

	public function priceOf($product)
	{
		return $this->products[$product]['price'];
	}

	public function purchase($product)
	{
		$this->totalMoney = $this->insertedMoney;
		$this->insertedMoney = 0;
		print "[vending machine now has {$this->totalMoney} cents]\n";
		print "[vending machine spits out $product]\n";
	}
}