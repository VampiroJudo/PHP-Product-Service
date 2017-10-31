<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    
    /**
    *Display a listing of the resource.
    *
    * @return Response
    */
    public function index() {
    	return Product::paginate();

    }

    /**
    *Store a newly created resource in storage.
    *
    * @param Request $request
    * @return Response
    */

    public function store(Request $request) {

    
}