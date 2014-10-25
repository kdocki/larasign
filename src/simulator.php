<?php

include __DIR__ . '/../vendor/autoload.php';

$menulink1 = new MenuLink('google', 'http://google.com');
$menulink2 = new MenuLink('facebook', 'http://facebook.com');
$menulink3 = new MenuLink('kelt', 'http://keltdockins.com');
$menuitem1 = new MenuItem('some text');

$megaMenu = new MenuCollection;
$subMenu1 = new MenuCollection;
$subMenu2 = new MenuCollection;
$subMenu3 = new MenuCollection;

$megaMenu->add($subMenu1);
$megaMenu->add($subMenu2);

$subMenu1->add($menulink1);
$subMenu1->add($menulink2);
$subMenu2->add($menulink3);
$subMenu2->add($subMenu3);
$subMenu3->add($menuitem1);


print '<!-- printing entire mega menu -->' . PHP_EOL;
$megaMenu->output();

print PHP_EOL . '<!-- printing submenu only -->' . PHP_EOL;
$subMenu1->output();

print PHP_EOL . '<!-- printing menuitem1 only -->' . PHP_EOL;
$menuitem1->output();