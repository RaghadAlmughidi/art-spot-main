<?php

namespace App\Http\Controllers;
use App\Models\image;
use App\Models\Product;
use Illuminate\Http\Request;

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


        return redirect('/gallery')->with('message', 'product is addedd successfully! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $products)
    {
        $products = Product::all();
        return view('gallery', ['products' => $products]);
    }

    public function artDetail(product $product)
    {
        $products = Product::find($product)->first();
        return view('art', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodect $prodect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodect $prodect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodect $prodect)
    {
        //
    }
}