<?php

require_once 'Order.php';
require_once 'OrderItem.php';
require_once 'ItemDao.php';
require_once 'OrderManager.php';

$order = new Order();
$item_dao = ItemDao::getInstance();

$order->addItem(new OrderItem($item_dao->findById(1), 2));
$order->addItem(new OrderItem($item_dao->findById(2), 1));
$order->addItem(new OrderItem($item_dao->findById(3), 3));

// 注文処理
OrderManager::order($order);
