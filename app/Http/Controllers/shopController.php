<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addproducts;
class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = addproducts::join('tbl_image','tbl_products.imgID','=','tbl_image.imgID')
                                ->join('tbl_category','tbl_products.cateID','=','tbl_category.cateID')
                                ->join('tbl_discount','tbl_products.discountID','=','tbl_discount.discountID')
                                ->select('tbl_products.*','tbl_products.liker as liker','tbl_image.imgname as imgname', 'tbl_category.name as catename', 'tbl_discount.discountPerent as disc')
                                ->paginate(12);
        return view('shop',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    public function like($id)
    {
        $addlike = addproducts::find($id);
        $add =  $addlike['liker']+1;
        DB::table('tbl_products')
        ->where('proID', $id)
        ->update(['liker' => $add]);
        $addlike->save();
        return Redirect('/shop');
    }
}