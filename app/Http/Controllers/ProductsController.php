<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Department;
use Auth;
use Image;

class ProductsController extends Controller
{
    //
    public function list() {

      $products = DB::table('products')->paginate(9);

      $user = Auth::user();

      $VAC = compact("products", "user");

      return view("productos", $VAC);
    }
    //
    public function productsByDepartment($departmentName) {
      $department = Department::where("name", $departmentName)->first();

      $department = $department->id_departments;

      // dd($department); //devuelve el valor ej: informatica=1

      $products = DB::table('products')->where("product_department", $department)->paginate(9);

      $user = Auth::user();

      $VAC = compact("products", "user");

      return view("productos", $VAC);
    }
    //
    public function search(Request $request) {
      $search = $request["buscador"];

      $products = Product::where("product_name", "like", "%$search%")->paginate(9);

      $user = Auth::user();

      $VAC = compact("products", "user");

      return view("/productos", $VAC);
    }
    //
    public function deleteProduct($id) {
      $product = Product::find($id);

      $product->delete();

      return redirect("/productos");
    }
    //
    public function addProduct() {
      if (Auth::check() == false) {
        return redirect("/productos");
      }

      $product = Product::all();
      $department = Department::all();
      
      $VAC = compact("product", "department");

      return view("/agregarProducto", $VAC);
    }
    //
    public function detailsProduct($id) {
      $product = Product::find($id);

      $cart = session("carrito");

      if ($cart && in_array($id, $cart)) {
        $inCart = true;
      } else {
        $inCart = false;
      }

      $VAC = compact("product", "inCart");

      return view("/detalleProducto",$VAC);
    }
    //
    public function saveProduct(Request $request) {

      $rules = [
          "product_name"        => "required|string|unique:products",
          "product_description" => "required|string",
          "product_image"       => "required",
          "product_department"  => "required|string",
          "product_price"       => "required|integer",
          "product_stock"       => "required|integer",
      ];

      $messages = [
        "required"  => "El campo :attribute es requerido",
        "integer"   => "El campo :attribute tiene que ser un numero entero"
      ];

      $this->validate($request, $rules, $messages);

      $product = new Product();

      $product->product_name = $request["product_name"];
      $product->product_description = $request["product_description"];
      $product->product_department = $request["product_department"];
      $product->product_price =$request["product_price"];
      $product->product_stock = $request["product_stock"];

      if ($request->hasFile('product_image')) {
          $prodIMG = $request->file('product_image');
          $prodIMGName = preg_replace('/\s+/', '-', $request["product_name"]) . '.' . $prodIMG->getClientOriginalExtension();
          $prodIMGName = strtolower($prodIMGName);
          Image::make($prodIMG)->resize(160, 160)->save( public_path('/image/products/' . $prodIMGName) );
          $product->product_image = $prodIMGName;
      } else {
          $prodIMGName = "default.png";
          $product->product_image = $prodIMGName;
      }

      $product->save();

      return redirect("/productos");
    }
    //
    public function editProduct($id){
      $product = Product::find($id);

      $department = Department::all();

      $VAC = compact("product", "department");

      return view("editarProducto", $VAC);

    }
    //
    public function updateProduct(Request $request){
      $rules = [
          "product_name"        => "required|string",
          "product_description" => "required|string",
          "product_department"  => "required|string",
          "product_price"       => "required|numeric",
          "product_stock"       => "required|numeric",
      ];

      $messages = [
        "required"  => "El campo :attribute es requerido",
        "numeric"   => "El campo :attribute tiene que ser un numero entero"
      ];

      $this->validate($request, $rules, $messages);

      $product = Product::find($request["id"]);

      $product->product_name          = $request["product_name"];
      $product->product_description   = $request["product_description"];
      $product->product_department    = $request["product_department"];
      $product->product_price         = $request["product_price"];
      $product->product_stock         = $request["product_stock"];

      if ($request->hasFile('product_image')) {
        $prodIMG = $request->file('product_image');
        $prodIMGName = preg_replace('/\s+/', '-', $request["product_name"]) . '.' . $prodIMG->getClientOriginalExtension();
        $prodIMGName = strtolower($prodIMGName);
        Image::make($prodIMG)->resize(160, 160)->save( public_path('/image/products/' . $prodIMGName) );
        $product->product_image = $prodIMGName;
        
      } else {
          $prodIMGName = "default.png";
          $product->product_image = $prodIMGName;
        }

      $product->save();

      return redirect("/producto/" . $request["id"]);
    }
}
