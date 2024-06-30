<?php

namespace App\Services;

use App\Models\Product;

class productsService{
    
    public function getProducts(){
        return Product::all();
    }

    public function getProduct($id){
        return Product::find($id);
    }

    public function createProduct(array $data){
        return Product::create($data);
    }

    public function updateProduct($id, array $data){
        $product = $this->getProduct($id);        
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->user_id = $data['user_id'];
        $product->details()->size = $data['size'];
        $product->details()->color = $data['color'];
        $product->details()->price = $data['price'];
        $product->save();
        return $product;
    }

    public function deleteProduct($id){
        $product = $this->getProduct($id);
        if($product){
            // if($product->image){
            //     $product->image()->delete();
            // }
            if($product->details){
                $product->details()->delete();
            }
            if($product->review)
            {
                $product->review()->delete();
            }
            $product->delete();
            
            return $product;
        }

    }
}