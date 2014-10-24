<?php

include_once __DIR__ . '/../vendor/autoload.php';

$message = "Helo world!";

$emailMessenger = new Messengers\Messenger(new Carriers\Email);
$snailMessenger = new Messengers\Messenger(new Carriers\SnailMail('PO Box 123, Somewhere, NY, 12345'));
$textMessenger = new  Messengers\PlainMessenger(new Carriers\TextMessage('123.456.7890'));

$emailMessenger->send($message);
$snailMessenger->send($message);
$textMessenger->send($message);