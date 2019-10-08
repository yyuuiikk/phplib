<?php

require_once 'OrderItem.php';

class Order
{
	private $items;

	public function __construct()
	{
		$this->items = [];
	}

	public function addItem(OrderItem $order_item)
	{
		$this->items[$order_item->getItem()->getId()] = $order_item;
	}

	public function getItems()
	{
		return $this->items;
	}
}
