<?php namespace Example3;

class VendingMachine extends \StateMachine\DefaultContext
{
	use \StateMachine\Stateful;

	protected $state = '\Example3\IdleState';

	protected $context = 'this';

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

		print "[inserted $money / {$this->insertedMoney}]\n";
	}

	public function insertedMoney()
	{
		return $this->insertedMoney;
	}

	public function refundMoney()
	{
		$refund = $this->insertedMoney;

		$this->insertedMoney = 0;

		print "[refunding {$refund}]\n";

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

	public function canPurchase($product)
	{
		if ($this->numberOfRemaining($product) < 1)
		{
			print "sorry, we are out of $product, please choose another product\n";
			return false;
		}

		if ($this->priceOf($product) > $this->insertedMoney)
		{
			print "sorry, you need to add more money to buy a $product\n";
			return false;
		}

		return true;
	}

	public function makePurchase($product)
	{
		if (!$this->canPurchase($product)) return;

		$this->totalMoney = $this->insertedMoney;
		$this->insertedMoney = 0;
		print "[vending machine now has {$this->totalMoney} cents]\n";
		print "[vending machine spits out $product]\n";
	}
}