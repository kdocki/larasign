<?php

include __DIR__ . '/../vendor/autoload.php';

// vendor address
$crmAddress = with(new CRM\AddressLookup)->findByTelephone('555 867-5309');

// adapter for vendor address
$address = new CRMAddressAdapter('Jenny Call', $crmAddress);

// our application code
$mailClient = new MailClient;

// the client expects an Address interface, not CRM\Address interface
$mailClient->sendLetter($address, 'Hello there, this is the body of the letter');