<?php

namespace App\Http\Controllers\Api;

use App\Services\productsService;
use App\Request\Products\CreateProductValidation;
use App\Request\Products\UpdateProductValidation;

class ProductController extends BaseController
{
    private $productService;

    public function __construct(productsService $productService)
    {
        $this->productService = $productService;
    }
    
    public function index() 
    {
        $products = $this->productService->getProducts();
        return $this->sendResponse($products);
    }

    public function show($id)
    {
        $product = $this->productService->getProduct($id);
        return $this->sendResponse($product);
    }   

    public function store(CreateProductValidation $CreateProductValidation)
    {
        if(!empty($CreateProductValidation->getErrors())){
            return response()->json([$CreateProductValidation->getErrors(), 406]);  
        } 
        $data = $CreateProductValidation->all();
        $data['user_id'] = auth()->user()->id;
        $product = $this->productService->createProduct($data);
        return $this->sendResponse($product);
    }

    public function update($id, UpdateProductValidation $UpdateProductValidation)
    {
        if(!empty($UpdateProductValidation->getErrors())){
            return response()->json([$UpdateProductValidation->getErrors(), 406]);  
        } 

        $data = $UpdateProductValidation->all();
        $data['user_id'] = auth()->user()->id;
        $product = $this->productService->updateProduct($id, $data);
        return $this->sendResponse($product);
    }

    public function destroy($id)
    {
        $product = $this->productService->deleteProduct($id);
        return $this->sendResponse('Deleted successfully');
    }
}
