<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\make;
use App\image;
use Image as Imageivn;
use App\Http\Controllers\create;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = image::paginate(5);
        return view('admin.image',compact('image'));
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
        $image = new image();
        $image -> desc = $data['txt_desc'];
        if($request->hasFile('txt_image'))
        {
            $mytime = time();
            $imagename = $mytime.$request->file('txt_image')->getClientOriginalName();
            
            $path = public_path('img/images/');
            $request->file('txt_image')->move($path,$imagename);
            $image -> imgname = $imagename;

            $thumbnail_path = public_path('img/images/thumbnail/');
			$thumbnail_name = $mytime.$request->file('txt_image')->getClientOriginalName();
            $original_img = $path. $imagename;
            $thumbnail_img = Imageivn::make($original_img)->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnail_img->save($thumbnail_path.$thumbnail_name);
        }
        else{
            $image -> imgname = "no_image";
        }
        $image -> save();
        return Redirect('/image')->with('success', 'This record inserted is successfully...');
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
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = image::find($id);
        if(!is_null($image['imgname']))
        {
            $img = $image['imgname'];
            $path = public_path('img/images/'.$img);
            $thpath = public_path('img/images/thumbnail/'.$img);
            unlink($path);
            unlink($thpath);
            $image->delete();
            return Redirect('/image')->with('success', 'This record deleted is successfully...');
        }
        else
        {
            $image->delete();
            return Redirect('/image')->with('success', 'This record deleted is successfully...');
        }
        
    }
}
