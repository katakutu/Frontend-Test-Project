<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function index()
    {
    	$data = array(
    		'data ' => array(
    			[
    				'image' 	=> 'https://kommercio.id/full-stack-test/assets/product-1.jpg',
    				'price' 	=> '15000000',
    				'currency'	=> 'IDR',
    				'name'		=> 'IPhone 7'
    			],
    			[
    				'image' 	=> 'https://kommercio.id/full-stack-test/assets/product-2.jpg',
    				'price' 	=> '250000',
    				'currency'	=> 'IDR',
    				'name'		=> '3 Soliders Toy'
    			],
    			[
    				'image' 	=> 'https://kommercio.id/full-stack-test/assets/product-3.jpg',
    				'price' 	=> '125000',
    				'currency'	=> 'IDR',
    				'name'		=> 'Cool T-Shirt'
    			],
    			[
    				'image' 	=> 'https://kommercio.id/full-stack-test/assets/product-2.jpg',
    				'price' 	=> '250000',
    				'currency'	=> 'IDR',
    				'name'		=> 'Another Toy'
    			],
    			[
    				'image' 	=> 'https://kommercio.id/full-stack-test/assets/product-3.jpg',
    				'price' 	=> '125000',
    				'currency'	=> 'IDR',
    				'name'		=> 'Another T-Shirt'
    			]
    		)
    	);

    	return response()->json($data);
    }
}
