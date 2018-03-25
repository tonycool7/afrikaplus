<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/12/17
 * Time: 3:10 AM
 */

namespace App\Shop;


class Cart
{
    public $cartItems = null;
    public $totalPrice = 0;
    public $totalQty = 0;

    function __construct($oldCart)
    {
        if($oldCart){
            $this->cartItems = $oldCart->cartItems;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }

    }

    function add($item){
        $newItem = ['qty' => 0, 'price' => $item->new_price, 'item' => $item];
        if($this->cartItems){
            if(array_key_exists($item->id, $this->cartItems)){
                $newItem = $this->cartItems[$item->id];
            }
        }
        $newItem['qty']++;
        $newItem['price'] = $item->new_price * $newItem['qty'];
        $this->cartItems[$item->id] = $newItem;
        $this->totalQty++;
        $this->totalPrice += $item->new_price;
    }
}