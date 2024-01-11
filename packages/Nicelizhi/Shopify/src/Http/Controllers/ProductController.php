<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Nicelizhi\Shopify\Models\ShopifyProduct;
//use Nicelizhi\Shopify\Repositories\ProductRepository;

class ProductController extends Controller
{


    public function __construct(
        //protected ProductRepository $productRepository,
        protected ShopifyProduct $ShopifyProduct

    ){

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = $this->ShopifyProduct->paginate(1);

        //var_dump($products);

        return view('shopify::products.index', compact('products'));
    }
}