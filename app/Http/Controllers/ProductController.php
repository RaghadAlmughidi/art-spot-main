<?php

namespace App\Http\Controllers;
use App\Models\image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Session; 
use Illuminate\Support\Facades\Session;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $create = $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_width' => 'required',
            'product_hight' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
            'artist_name' => 'required',
            'artist_image' => 'required',
        ]);


        if ($request->hasFile('product_image', 'artist_image')) {
            $nameproduct = $request->product_image->hashName();
            $request->product_image->move(public_path('product_img'), $nameproduct);
            $nameartist = $request->artist_image->hashName();
            $request->artist_image->move(public_path('artist_img'), $nameartist);
        }


        $products = new Product();
        $products->product_name = $request->product_name;
        $products->product_desc = $request->product_desc;
        $products->product_width = $request->product_width;
        $products->product_hight = $request->product_hight;
        $products->product_price = $request->product_price;
        $products->product_image = $nameproduct;
        $products->artist_name = $request->artist_name;
        $products->artist_image = $nameartist;
        $products->save();


        if ($request->hasFile('product_image', 'artist_image')) {
            $img = new Image();
            $img->product_id = $products->id;
            $img->product_img = $nameproduct;
            $img->artist_img = $nameartist;
            $img->save();
        }


        // Product::create($create);


        return redirect('/gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $products)
    {
        //if the user logged in show the number of product in the cart icon
       if (Auth::id()) {
        $products = Product::all();
        $user = auth()->user();
        $count=Cart::where('user_id',$user->id)->count();
        return view('gallery', ['products' => $products],compact('count'));
       }else{
        //if the user doesnot logged in show the  number of product in the cart icon he added
        //by using the session id 
        $products = Product::all();
        //session id if the user doesnot logged in 
        $session_id = Session::get('session_id');
        $count=Cart::where('session_id',$session_id)->count();
        return view('gallery', ['products' => $products],compact('count'));

       }
           
    }

    public function addToCart(Request $request, $id){
        $product = Product::find($id);

        //generate a session id to add items in the cart without the user logged in 
        $session_id = Session::get('session_id');
        if (empty($session_id)){
            $session_id = Session::getId();
            Session::put('session_id',$session_id);
        }
        //if the user loogged in 
        if (Auth::id()) {
            //check if the product is aleardy in the cart
            $inCart = Cart::where('user_id',Auth::id())->where('product_id', $product->id)->first();
            if($inCart){
                //if yes increase the quantity
                $inCart->increment('quantity',1);
                return redirect()->back()->with('message','Product is already in the cart'); 

            }else{
                //if not add a new product 
                $user=auth()->user();
                //saving the products in the cart tabel with user logged in 
                $cart = new Cart;
                $cart->user_id= $user->id;
                $cart->user_name= $user->name;
                $cart->product_id= $product['id'];
                $cart->product_name= $product['product_name'];
                $cart->product_desc= $product['product_desc'];
                $cart->product_price= $product['product_price'];
                $cart->product_image= $product['product_image'];
                $cart->artist_name= $product['artist_name'];
                $cart->quantity= 1 ;
                $cart->save();
                return redirect()->back()->with('message','Product addedd successfully'); 
            }

        }else{
            $inCart = Cart::where('session_id',$session_id)->where('product_id', $product->id)->first();
            //check if the product is aleardy in the cart
            if($inCart){
                //if yes increase the quantity
                $inCart->increment('quantity',1);
                return redirect()->back()->with('message','Product is already in the cart'); 

            }else{
                //saving the products in the cart tabel without logged in 
                $cart = new Cart;
                $cart->session_id= $session_id;
                $cart->product_id= $product['id'];
                $cart->product_name= $product['product_name'];
                $cart->product_desc= $product['product_desc'];
                $cart->product_price= $product['product_price'];
                $cart->product_image= $product['product_image'];
                $cart->artist_name= $product['artist_name'];
                $cart->quantity= 1 ;
                $cart->save();  
                return redirect()->back()->with('message','Product addedd successfully');
            
            }
        }

    }

    public function artDetail(product $product)
    {
        $products = Product::find($product)->first();
        return view('art', ['products' => $products]);
    }

    public function cart()
    {
        if (Auth::id()) {
            //if the user loggen in get the product info from the cart tabel
            $user = auth()->user();
            $cart=Cart::where('user_id',$user->id)->get();
            $count=Cart::where('user_id',$user->id)->count();
            return view('cart' , compact('cart','count'));
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $prodect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $prodect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $prodect)
    {
        //
    }
}
