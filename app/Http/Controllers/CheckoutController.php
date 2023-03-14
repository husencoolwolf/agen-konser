<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  public function product_detail($id_product)
  {

    return view('guest.checkout.product_detail');
  }
}
