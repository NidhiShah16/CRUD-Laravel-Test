<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myuser;
use App\Role;

class MyuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myuserarray = Myuser::join('roles','myusers.role_id','=','roles.role_id')
                        ->select('myusers.*','roles.role')
                        ->get();
        return view('myuser.index',compact('myuserarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolearray = Role::all();
        return view('myuser.create',compact('rolearray'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'myuser_fname'=>'required',
            'myuser_lname'=>'required',
            'myuser_username'=>'required|email',
            'myuser_password'=>'required',
        ]);

        $myuserq = New Myuser([
            'myuser_fname'=>$request->get('myuser_fname'),
            'myuser_lname'=>$request->get('myuser_lname'),
            'myuser_username'=>$request->get('myuser_username'),
            'myuser_password'=>$request->get('myuser_password')
        ]);

        $myuserq->save();

        return redirect('/myuser')->with('success','Inserted');
        
        // $myuser_id = $myuser->$myuser_id;

        // $userrole = new UserRole([
        //     'myuser_id'=>$myuser_id,
        //     'role_id'=>$request->get('role_id')
        // ]);

        // $userrole->save();

        // return response()->json([
        //     'message'=>'User Inserted' . $myuser_id,
        //     'userrole'=>$userrole
        // ]);
        
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
        $rolearray = Role::all();
        $myuserarray = Myuser::where('myuser_id',$id)->first();
        return view('myuser.edit',compact('myuserarray','rolearray'));
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
        $request->validate([
            'myuser_fname'=>'required',
            'myuser_lname'=>'required',
            'myuser_username'=>'required',
            'myuser_password'=>'required',
            'role_id'=>'required'
        ]);

        $myuserarray = Myuser::where('myuser_id',$id)->first();
        $myuserarray->myuser_fname = $request->get('myuser_fname');
        $myuserarray->myuser_lname = $request->get('myuser_lname');
        $myuserarray->myuser_username = $request->get('myuser_username');
        $myuserarray->myuser_password = $request->get('myuser_password');
        $myuserarray->role_id = $request->get('role_id');

        $myuserarray->save();
        return redirect('/myuser')->with('success','User Profile has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Myuser::where('myuser_id','=',$id)->delete();
        return redirect('/myuser')->with('success','User Profile has been Deleted');
    }
}
