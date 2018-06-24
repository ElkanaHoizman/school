<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Studeents;
use App\courses;
use DB;
use view;

class StudeentsController extends Controller
{
// /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
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
        $studeents = studeents::orderBy('created_at','desc')->paginate(10);
       return view('pages.school')->with('studeents',$studeents);
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studeents.create');
       
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
            'phone'=>'required',
            'email'=>'required',
            // 'Courses'=>'required',
           'studeents_image'=>'image|nullable|max:1999'
        ]);
        //Handle file Upload
        if($request->hasFile('studeents_image')){
           //Get filename wite the extension 
           $filenameWithExt = $request->file('studeents_image')->getClientOriginalName();
           //Get gust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_EXTENSION);// PATHINFO_FIENAME
            //Get gust ext
            $extension = $request->file('studeents_image')->getClientOriginalExtension();
            //Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('studeents_image')->storeAs('public/studeents_images',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }

        //create studeents
        $studeents = new studeents;
        $studeents->name= $request->input('name');
        $studeents->phone= $request->input('phone');
        $studeents->email= $request->input('email');
        // $studeents->Courses= $request->input('Courses');
        
        // $post->user_Id= auth()->user()->id;
        $studeents->studeents_image= $fileNameToStore;
        $studeents->save();
        $studeents->courses()->sync($request->courses,false);
       
    //   return redirect('/school')->action(
    //         'StudeentsController@show', ['id' => $studeents->id]
    //     )->with('success', 'Student Created');
       return redirect('/school')->with('success','studeents created');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $studeent = studeents::find($id);
       return view('studeents.show')->with('studeent',$studeent);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studeent = studeents::find($id);
        $studeentCourses = $studeent->courses;
        $edit = true;
        $studeentId = $id;

        $coursesedit = array();
        foreach ( $studeentCourses as  $studeentCours) {

           $coursesedit[] = $studeentCours->id;

        }
        
        return view('studeents.edit')->with('studeent',$studeent)->with( 'coursesedit' ,$coursesedit);
       
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
            'phone'=>'required',
            'email'=>'required',
            // 'Courses'=>'required',
            'studeents_image'=>'image|nullable|max:1999',
        ]);
         //Handle file Upload
        if($request->hasFile('studeents_image')){
           //Get filename wite the extension 
           $filenameWithExt = $request->file('studeents_image')->getClientOriginalName();
           //Get gust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_EXTENSION);// PATHINFO_FIENAME
            //Get gust ext
            $extension = $request->file('studeents_image')->getClientOriginalExtension();
            //Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('studeents_image')->storeAs('public/studeents_images',$fileNameToStore);
        }
        // else{
        //     $fileNameToStore='noimage.jpg';
        // }
        
        //create update
        $studeents = studeents::find($id);
        $studeents->name= $request->input('name');
        $studeents->phone= $request->input('phone');
        $studeents->email= $request->input('email');
       
       if($request->hasFile('studeents_image')){
             $studeents->studeents_image = $fileNameToStore;
        }
        $studeents->save();
       
         if (isset($request->courses)) {
            $studeents->courses()->sync($request->courses);
        } else {
            $studeents->courses()->sync(array());
        }
       
        return redirect('/school')->with('success','students update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $studeent = studeents::find($id);
         $studeent->courses()->detach();
         $studeent->delete();
          return redirect('/school')->with('success','studeents removed');
    }
}
