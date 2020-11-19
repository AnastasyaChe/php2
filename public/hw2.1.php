<?php
abstract class Product {

	protected static $price = 30;
	protected $qnty;

	public function __construct($qnty)
    {
        $this->qnty = $qnty;
    }

	abstract public function getFinalCost();

	public function getTotalCost(){
		return $this->qnty * $this-> getFinalCost()
	};
};

class DigitalProduct extends Product {
	public $qnty = 1;

	public function getFinalCost() {
		return self::$price/2;
	}
	

};

class PeiceProduct extends Product {
	public $qnty = 1;
	public function getFinalCost() {
		return self::$price;
	}

};

class WeightProduct extends Product {
	protected static $priceKG = 20;
	private $qnty = 1;

	public function getFinalCost() {
		return self::$priceKG * $this->qnty;
	}
}

$prod1 = new DigitalProduct(5);
$prod2 = new PeiceProduct(7);
$prod3 = new WeightProduct(0.3);

echo "Стоимость цифрового товара {$prod1->getFinalCost()} <br/>";
echo "Общая сумма за цифровые товары {$prod1->getTotalCost()} <br/>";
echo "Стоимость штучного товара {$prod2->getFinalCost()} <br/>";
echo "Общая сумма за штучные товары {$prod2->getTotalCost()} <br/>";
echo "Стоимость весового товара {$prod3->getFinalCost()} <br/>";

