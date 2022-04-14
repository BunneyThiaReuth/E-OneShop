<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\dicount;
class discountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dicount = dicount::paginate(5);
        return view('admin.discount',compact('dicount'));
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
        $data = $request->input();
        $dicount = new dicount();
        if($data['txt_disperent']>=0)
        {
            $dicount->name=$data['txt_name'];
            $dicount->description=$data['txt_desc'];
            $dicount->discountPerent=$data['txt_disperent'];
            $dicount->startDate=$data['txt_stDate'];
            $dicount->endDate=$data['txt_endDate'];
            $dicount->status=$data['txt_status'];
            $dicount -> save();
            return Redirect('/discount')->with('success', 'This record inserted is successfully...');
        }
        else
        {
            return Redirect('/discount')->with('error', 'Invalid discount perent !');
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
        $dicountforedit = dicount::find($id);
        $dicount = dicount::paginate(5);
        return view('admin.Editdiscount',compact('dicount','dicountforedit'));
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
        $dicount = dicount::find($id);
        $data = $request->input();
        if($data['txt_disperent']>=0)
        {
            $dicount->name=$data['txt_name'];
            $dicount->description=$data['txt_desc'];
            $dicount->discountPerent=$data['txt_disperent'];
            $dicount->startDate=$data['txt_stDate'];
            $dicount->endDate=$data['txt_endDate'];
            $dicount->status=$data['txt_status'];
            $dicount -> save();
            return Redirect('/discount')->with('success', 'This record updated is successfully...');
        }
        else
        {
            return Redirect('/discount')->with('error', 'Invalid discount perent !');
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
        $dicounts = dicount::find($id);
        $dicounts->delete();
        return Redirect('/discount')->with('success', 'This record deleted is successfully...');
    }
    public function endisable($id)
    {
        $dicounts = dicount::find($id);
        if($dicounts['status'] == 1)
        {
            $dicounts['status'] = 0;
        }
        else{
            $dicounts['status'] = 1;
        }
        $dicounts -> save();
        return Redirect('/discount')->with('success', 'This record updated status is successfully...');
    }
}
