<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\StudeentsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\courses;
use App\Studeents;
use DB;
use view;

class coursesController extends Controller
{
   
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              
        $courses = courses::orderBy('created_at','desc')->paginate(10);
        return view('pages.school')->with('courses',$courses);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coursas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'coursas_image'=>'image|nullable|max:1999',
        ]);
         //Handle file Upload
        if($request->hasFile('coursas_image')){
           //Get filename wite the extension 
           $filenameWithExt = $request->file('coursas_image')->getClientOriginalName();
           //Get gust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_EXTENSION);// PATHINFO_FIENAME
            //Get gust ext
            $extension = $request->file('coursas_image')->getClientOriginalExtension();
            //Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('coursas_image')->storeAs('public/coursas_images',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }

       
        //create courses
        $courses = new courses;
        $courses->name= $request->input('name');
        $courses->description= $request->input('description');
        $courses->coursas_image= $fileNameToStore;
        $courses->save();
        $courses->studeents()->sync($request->studeents,false);
        return redirect('/school')->with('success','courses created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $cours = courses::find($id);
       return view('coursas.show')->with('cours',$cours);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cours = courses::find($id);
        return view('coursas.edit')->with('cours',$cours);
        return redirect('/school')->with('error','Unauthorized page');
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
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'coursas_image'=>'image|nullable|max:1999',
        ]);
         //Handle file Upload
        if($request->hasFile('coursas_image')){
           //Get filename wite the extension 
           $filenameWithExt = $request->file('coursas_image')->getClientOriginalName();
           //Get gust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_EXTENSION);// PATHINFO_FIENAME
            //Get gust ext
            $extension = $request->file('coursas_image')->getClientOriginalExtension();
            //Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('coursas_image')->storeAs('public/coursas_images',$fileNameToStore);
        }
       //create update
        $courses =  courses::find($id);
        $courses->name= $request->input('name');
        $courses->description= $request->input('description');
        if($request->hasFile('coursas_image')){
            $courses->coursas_image = $fileNameToStore;
        }
       
        $courses->save();
        return redirect('/school')->with('success','courses update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cours = courses::find($id);
        $cours->studeents()->detach();
        
         $cours->delete();
          return redirect('/school')->with('success',' Courses removed');
    }
}
