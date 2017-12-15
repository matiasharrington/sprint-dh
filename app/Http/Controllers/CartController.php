<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class CartController extends Controller
{
    //
    public function add(Request $request) {
      $id = $request["id"];

      $cart = session("carrito");

      if (!$cart) {
        $cart = [];
      }

      $cart[] = $id;

      session(["carrito" => $cart]);

      return back();
    }
    //
    public function remove(Request $request) {
      $cart = session("carrito");

      foreach ($cart as $key => $item) {
        if ($item == $request["id"]) {
          unset($cart[$key]);
        }
      }

      session(["carrito" => $cart]);

      return back();
    }
    //
    public function list() {
      $cartIds = session("carrito");

      if (!$cartIds) {
        $cartIds = [];
      }

      $cart = Product::find($cartIds);

      return view("/carrito", compact("cart"));
    }
}
