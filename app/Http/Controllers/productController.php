<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('products.index',[
            'posts' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.add',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required',
        ],[
            'name.required' => 'The name must be filled !',
            'stock.required' => 'The stock must be filled !',
            'stock.numeric' => ' Fill this field with number !',
            'price.required' => 'The price must be filled !',
            'price.numeric' => 'Fill this field with number !',
            'description.required' => 'The description must be filled !',
            'category.required' => 'Select an category',
        ]);

        product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category,
        ]);
        toast('New stock added successfully','success')->autoClose(5000);
        return redirect('/stockProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encryptId = Crypt::decrypt($id); //encrypt the id
        $data = Product::find($encryptId);
        return view('products.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::where('id',$request->id)
        ->update([
           'name' => $request->name,
           'description' => $request->description,
           'stock' => $request->stock,
           'price' => $request->price,
         ]);
        toast('Data berhasil di update','success')->autoClose(5000);
        return redirect('/stockProduct');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        toast('Product deleted successfully'.$data->name,'success');
        return redirect('/stockProduct');
    }

    public function search(Request $request){

        $search = Product::where('name','like','%'.$request->search.'%')
                            ->get();

       if($search->isEmpty()){
        return view('products.index',[
            'posts' => $search
        ]);
       }
       else{
             return view('products.index',[
                    'posts' => $search
                    ]);
       }
    }
}
