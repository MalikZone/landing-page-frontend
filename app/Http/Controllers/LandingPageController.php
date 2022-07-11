<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    public function index(){

        $fetchProductsAPI = Http::get('http://localhost:8000/api/products');
        $productResponse  = json_decode($fetchProductsAPI, true);
        $productResponse['status'] ? $products = $productResponse['data'] : $products = [];

        $fetchServicesAPI = Http::get('http://localhost:8000/api/services');
        $serviceResponse  = json_decode($fetchServicesAPI, true);
        $serviceResponse['status'] ? $services = $productResponse['data'] : $services = [];

        return view('landing-page', compact('products', 'services'));

    }
}
