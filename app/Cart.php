<?php

namespace App;

class Cart
{
    public $_items = null;
    public $_totalQuantity = 0;
    public $_totalPrice = 0;
    
    public function __construct($oldCart) {
        if($oldCart) {
            $this->_items = $oldCart->_items;
            $this->_totalQuantity = $oldCart->_totalQuantity;
            $this->_totalPrice = $oldCart->_totalPrice; 
        }  
    }
    
    public function add($item, $id) {
        //poczatkowy stan
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        //gdy mamy juz taki item w koszyku
        if ($this->_items) {
            if(array_key_exists($id, $this->_items)) {
                $storedItem = $this->_items[$id];  //nadpisujemy
            }
        }
        
        $storedItem['quantity']++;
        $storedItem['price'] = $storedItem['quantity'] * $item->price;
        
        $this->_items[$id] = $storedItem;
        
        $this->_totalQuantity++;
        $this->_totalPrice += $item->price;
    }
    
    public function delete($id) {
        $this->_totalQuantity -= $this->_items[$id]['quantity'];
        $this->_totalPrice -= $this->_items[$id]['price'];
        unset($this->_items[$id]);
        return;
    }
    
    public function update($id, $value) {
        if($value <= 0 ) {
            return;   
        }
        
        if($this->_items[$id]['quantity'] == $value ) {
            return;   
        }
        
        if($this->_items[$id]['quantity'] > $value) {
            $oldQuantity = $this->_items[$id]['quantity'];
            $oldPrice = $this->_items[$id]['price'];
            
            $this->_items[$id]['quantity'] = $value;
            $this->_items[$id]['price'] = ($value * $this->_items[$id]['item']['price']);
            
            $this->_totalQuantity -= $oldQuantity - $this->_items[$id]['quantity'];
            $this->_totalPrice -= ($oldPrice - $this->_items[$id]['price']);
            return;   
        }
        
        $oldQuantity = $this->_items[$id]['quantity'];
        $oldPrice = $this->_items[$id]['price'];

        $this->_items[$id]['quantity'] = $value;
        $this->_items[$id]['price'] = ($value * $this->_items[$id]['item']['price']);

        $this->_totalQuantity += ($this->_items[$id]['quantity'] - $oldQuantity);
        $this->_totalPrice += ($this->_items[$id]['price'] - $oldPrice);
        return;    
    }
}
