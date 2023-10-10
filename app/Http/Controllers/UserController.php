<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\ExportUser;
use App\Imports\ImportUser;
use Excel;
class UserController extends Controller
{
   public function index()
   {
    $users = User::orderBy("id","desc")->paginate(10);
    return view('index',compact('users'));
   }

   public function create()
   {
    
    return view('create');
   }

   public function store(Request $request)
   {

    $this->validate($request,[
        'name'=>'required|string|min:3',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string|min:6|max:8',
        'password_confirmation'=>'required|same:password',
        'profile'=>'required|image',
    ]);
    
    $user  = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    //image upload
    if($request->has('profile'))
    {
        $image = $request->file('profile');
        $img_name = strtolower(str_replace(" ","_" ,$request->name)).time();
        $ext = $image->getClientOriginalExtension();
        $profile = $img_name.".".$ext;
        $path  = 'public/uploads/profile';
        $image->move($path,$profile);
        $user->profile = $path.'/'.$profile;
    }
    
    if($user->save())
    {
        return redirect("/")->with("success","User Saved Successfully!!");
    }
    return redirect("/")->with("fail","Fail!! to Save User");

   }

   public function edit($id)
   {
    $u = User::findOrFail($id);
    return view('edit',compact('u'));
   }
   public function update(Request $request , $id)
   {
    
    $this->validate($request,[
        'name'=>'required|string|min:3',
        'email'=>'required|email|unique:users,email,'.$request->id,       
        'profile'=>'image',
    ]);
    
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;

    //image upload
    if($request->has('profile'))
    {
        $image = $request->file('profile');
        $img_name = strtolower(str_replace(" ","_" ,$request->name)).time();
        $ext = $image->getClientOriginalExtension();
        $profile = $img_name.".".$ext;
        $path  = 'public/uploads/profile';
        $image->move($path,$profile);
        $user->profile = $path.'/'.$profile;
    }
    
    if($user->save())
    {
        return redirect("/")->with("success","User Updated Successfully!!");
    }
    return redirect("/")->with("fail","Fail!! to Update User");
   }

   public function view($id)
   {
    $user = User::findOrFail($id);
    return response()->json(['user'=>$user],200);    
   }

   public function delete($id)
   {
    $user = User::findOrFail($id);
    $result = $user->delete();
    if($result)
    {
        return response()->json(['msg'=>'User Deleted Successfully!!'],200); 
    }
    return response()->json(['msg'=>'Fail!! to delete user'],200);    
   }

   public function export()
   {
    return Excel::download(new ExportUser,'users.xlsx');
   }

   public function importView()
   {
       return view('import');
   }

   public function import(Request $request)
   {
     Excel::import(new ImportUser,$request->file('file'));
    return redirect()->route('index')->withSuccess('Excel Import Successfully!!');
   }
}
