<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__. '/price.php';

$priceAdjuster = new PriceAdjuster;

$product1 = new Product('Block Cheese', 3.99, $priceAdjuster);
$product2 = new Product('Frozen Pizza', 6.69, $priceAdjuster);
$product3 = new Product('Popcorn', 2.34, $priceAdjuster);
price('untouched prices', $product1, $product2, $product3);

$coupon1 = new Coupon('Block Cheese', 1.00, $priceAdjuster);
$coupon2 = new Coupon('Frozen Pizza', 2.00, $priceAdjuster);
price('adding 2 coupons', $product1, $product2, $product3);

$benefit1 = new CustomerBenefit(30, $priceAdjuster);
price('added 30% customer benefit', $product1, $product2, $product3);

$coupon3 = new Coupon('Popcorn', 2.00, $priceAdjuster);
price('adding 3rd coupon, customer looses 30% benefit', $product1, $product2, $product3);

$priceAdjuster->removeAdjustment($coupon1);
unset($coupon1);
price('removing coupon #1, now 30% benefit back', $product1, $product2, $product3);

$benefit1->modifyDiscount(45);
price('customer gets 45% discount now!', $product1, $product2, $product3);