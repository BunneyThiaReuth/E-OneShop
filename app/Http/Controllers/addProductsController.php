<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addproducts;
class addProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addproducts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $addpro = new addproducts();
        if($data['txt_qty']>0 && $data['txt_price']>0)
        {
            $addpro -> imgID = $data['txt_image'];
            $addpro -> name = $data['txt_pname'];
            $addpro -> cateID = $data['txt_category'];
            $addpro -> qty = $data['txt_qty'];
            $addpro -> price = $data['txt_price'];
            $addpro -> discountID = $data['txt_discount'];
            $addpro -> desc = $data['txt_desc'];
            $addpro -> save();
            return Redirect('/addproducts')->with('success', 'This record inserted is successfully...');
        }
        else
        {
            return Redirect('/addproducts')->with('error', 'This record inserted is not successfully...');
        }
        
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
        //
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
        $addpro = addproducts::find($id);
        $data = $request->input();
        if($data['txt_qty']>0 && $data['txt_price']>0)
        {
            $addpro -> imgID = $data['txt_image'];
            $addpro -> name = $data['txt_pname'];
            $addpro -> cateID = $data['txt_category'];
            $addpro -> qty = $data['txt_qty'];
            $addpro -> price = $data['txt_price'];
            $addpro -> discountID = $data['txt_discount'];
            $addpro -> desc = $data['txt_desc'];
            $addpro -> save();
            return Redirect('/listproducts')->with('success', 'This record updated is successfully...');
        }
        else
        {
            return Redirect('/listproducts')->with('error', 'This record updated is not successfully...');
        }
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
