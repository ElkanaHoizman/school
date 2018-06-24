<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use view;

class UsersController extends Controller
{
   // /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
       
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $Users =User::all();
        return view('pages.Administration')->with('Users',$Users);
              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
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
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
            'Users_image'=>'image|nullable|max:1999'
            
        ]);
         //Handle file Upload
        if($request->hasFile('Users_image')){
           //Get filename wite the extension 
           $filenameWithExt = $request->file('Users_image')->getClientOriginalName();
           //Get gust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_EXTENSION);// PATHINFO_FIENAME
            //Get gust ext
            $extension = $request->file('Users_image')->getClientOriginalExtension();
            //Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('Users_image')->storeAs('public/Users_images',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }
         
        //create Users
        $user = new User;
        $user->name= $request->input('name');
        $user->phone= $request->input('phone');
        $user->email= $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->Users_image= $fileNameToStore;
        $user->save();
        return redirect('/Administration')->with('success','Users created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $Users = User::find($id);
       return view('Users.show')->with('Users',$Users);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Users = User::find($id);
        return view('Users.edit')->with('Users',$Users);
       
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
            'email'=>'required',
             'phone'=>'required',
             'role' => 'required',
            'Users_image'=>'image|nullable|max:1999',
        ]);
         //Handle file Upload
        if($request->hasFile('Users_image')){
           //Get filename wite the extension 
           $filenameWithExt = $request->file('Users_image')->getClientOriginalName();
           //Get gust filename
            $filename = pathinfo($filenameWithExt, PATHINFO_EXTENSION);// PATHINFO_FIENAME
            //Get gust ext
            $extension = $request->file('Users_image')->getClientOriginalExtension();
            //Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('Users_image')->storeAs('public/Users_images',$fileNameToStore);
        }
               
        //create update
        $Users =  User::find($id);
        $Users->name= $request->input('name');
        $Users->email= $request->input('email');
        $Users->phone= $request->input('phone');
        $Users->role= $request->input('role'); 
       
         if($request->hasFile('Users_image')){
             $Users->Users_image = $fileNameToStore;
        }
        $Users->save();
        
        return redirect('/Administration')->with('success','Users  update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $User = User::find($id);
  
         $User->delete();
          return redirect('/Administration')->with('success','Users removed');
    }
}
