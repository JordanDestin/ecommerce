<?php

namespace App\Http\Controllers\Back;

use App\DataTables\ProductDataTable;
use App\Models\Product;
use App\Models\Category;
use App\Models\Category_Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
       // return view('back.products.showProduct');
       return $dataTable->render('back.products.showProduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('back.products.forms',array(
            'categories' => $categories
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image = $request->file('image');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());
        $img->widen(800)->encode()->save(public_path('/images/') . $name);
        $img->widen(400)->encode()->save(public_path('/images/thumbs/') . $name);

       $product =  Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantite' => $request->quantite,
            'image' => $name
        ]);

        foreach($request->category as $value)
        {
            Category_Product::create([
                'product_id' => $product->id,
                'category_id' => $value
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $categories = Category::all();
        return view('back.products.forms', [
            'product' => $product,
            'categories' => $categories
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageProduct = Product::where('id',$id)->first();

        if($request->has('image')) {
            File::delete([
                public_path('/images/') . $imageProduct['image'], 
                public_path('/images/thumbs/') . $imageProduct['image'],
            ]);;       
        }

        $image = $request->file('image');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());
        $img->widen(800)->encode()->save(public_path('/images/') . $name);
        $img->widen(400)->encode()->save(public_path('/images/thumbs/') . $name);

       $product =  Product::where('id',$id)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantite' => $request->quantite,
                'image' => $name
             ]);

             if(!empty($request->category))
             {
                $categoriesProduct = Category_Product::where('product_id',$id)->delete();
                foreach($request->category as $value)
                {
                    Category_Product::create([
                        'product_id' => $id,
                        'category_id' => $value
                        ]);
                  }
             }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
