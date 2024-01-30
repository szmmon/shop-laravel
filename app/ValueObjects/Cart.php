<?php
namespace App\ValueObjects;
use Illuminate\Support\Collection;
use App\Models\Product;
use Illuminate\Support\Arr;

class Cart {

    private Collection $items;

    public function __construct(Collection $items = null) {
        $this->items = $items ?? Collection::empty();
    }
    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }

    public function getSum() {
        return $this->items->sum(function ($item){
            return $item->getSum();
        });
    }

    public function addItem(Product $product){

        $items = $this->items;
        $item = $items->first(function($item) use ($product){
            return $product->id == $item->getId();
        });        
        if (!is_null($item)){
            $items = $items->reject(function($item) use ($product){
            return $product->id == $item->getId(); 
            //znajdujemy obiekt w kolekcji i go usuwamy, potem podbijamy wartosc ilosci i za ifem tworzymy nowy obiekt z zaaktualizowana iloscia
        }); 
            $newItem = $item->addQuantity($product);
        }
        else{
            $newItem = new CartItem($product);
        }
        $items->add($newItem);

        return new Cart($items);
    }
    public function removeItem(Product $product){
        $items = $this->items->reject(function($item) use ($product){
            return $product->id == $item->getId(); 
            //znajdujemy obiekt w kolekcji i go usuwamy, potem podbijamy wartosc ilosci i za ifem tworzymy nowy obiekt z zaaktualizowana iloscia
        });
        return new Cart($items);

    }
}