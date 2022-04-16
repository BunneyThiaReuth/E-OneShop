<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\infor;
class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infor = infor::paginate(5);
        return view('admin.infor',compact('infor'));
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
        $infor = new infor();
        $infor -> email = $data['txt_mail'];
        $infor -> infortext = $data['txt_text'];
        $infor -> moblienumber = $data['txt_pnumber'];
        $infor -> incity = $data['txt_city'];
        $infor -> inaddress = $data['txt_address'];
        $infor -> linkmap = $data['txt_map'];
        $infor -> instatus = 0;
        $infor -> save();
        return Redirect('/infor')->with('success', 'This record inserted is successfully...');
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
        $inforedit = infor::find($id);
        $infor = infor::paginate(5);
        return view('admin.Editinfor',compact('inforedit','infor'));
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
        $infor = infor::find($id);
        $data = $request->input();
        $infor -> email = $data['txt_mail'];
        $infor -> infortext = $data['txt_text'];
        $infor -> moblienumber = $data['txt_pnumber'];
        $infor -> incity = $data['txt_city'];
        $infor -> inaddress = $data['txt_address'];
        $infor -> linkmap = $data['txt_map'];
        $infor -> save();
        return Redirect('/infor')->with('success', 'This record updated is successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infor = infor::find($id);
        $infor->delete();
        return Redirect('/infor')->with('success', 'This record deleted is successfully...');
    }
    public function endisable($id)
    {
        $infor = infor::find($id);
        if($infor['instatus'] == 1)
        {
            $infor['instatus'] = 0;
        }
        else{
            $infor['instatus'] = 1;
        }
        $infor -> save();
        return Redirect('/infor')->with('success', 'This record updated status is successfully...');
    }
}
