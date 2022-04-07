<?php

namespace App\Http\Controllers;
use App\categorys;
use Illuminate\Http\Request;
use DB;
use Session;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categorys::paginate(5);
        return view('admin.category',compact('categories'));
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
        $category = new Categorys();
        $category -> name = $data['txtcateName'];
        $category -> description = $data['txtdesc'];
        $category -> status = $data['txtstatus'];

        $category -> save();
        return Redirect('/category')->with('success', 'This record inserted is successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catforedit = Categorys::find($id);
        $categories = Categorys::paginate(5);
        return view('admin.category',compact('categories', 'catforedit'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categorys::find($id);
        $category->delete();
        return Redirect('/category')->with('success', 'This record deleted is successfully...');
    }
    
    public function endisable($id)
    {
        $category = Categorys::find($id);
        if($category['status'] == 1)
        {
            $category['status'] = 0;
        }
        else{
            $category['status'] = 1;
        }
        $category -> save();
        return Redirect('/category')->with('success', 'This record updated status is successfully...');
    }
}
