<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   public $items=null;
   public $totalQty=0;
   public $totalPrice=0;

   public function __construct($oldCart)
   {

      if($oldCart){
          $this->items=$oldCart->items;
          $this->totalQty=$oldCart->totalQty;
          $this->totalPrice=$oldCart->totalPrice;
      }
   }

   public function  add($item,$id){
       $storedItem=['id'=>$item->id,'qty'=>0,'price'=>$item->price,'item'=>$item];
       if($this->items){
           if(array_key_exists($id,$this->items)){
               $storedItem=$this->items[$id];
           }
       }
       $storedItem['qty']++;
       $storedItem['price'] = $item->price * $storedItem['qty'];
       $this->items[$id] = $storedItem;
       $this->totalQty++;
       $this->totalPrice += $item->price;
   }


   public function remove($id)
   {
       if (!$this->items || !isset($this->items[$id])) {
           return false;
       }

       $this->totalQty -= $this->items[$id]['qty'];
       $this->shippingCost = ($this->totalQty * 1) + 1;
       $this->totalPrice -= $this->items[$id] * $this->items[$id]['qty'];
       $this->subTotal = $this->totalPrice + $this->shippingCost;

       // and remove the item
       unset($this->items[$id]);
   }

    public function updateItem($item, $id, $quantity) {
        $this->items[$id]['qty'] = $quantity;
        $this->items[$id]['price'] = $quantity * $item->price;

        $this->totalQty = 0;
        foreach($this->items as $element) {
            $this->totalQty += $element['qty'];
            $this->totalPrice = $this->totalQty * $item->price;
        }
    }



}
