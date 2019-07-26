<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolearray = Role::all();
        return view('role.index',compact('rolearray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
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
            'role'=>'required'
        ]);

        $roleq = New Role([
            'role'=>$request->get('role')
        ]);

        $roleq->save();
        // return response()->json([
        //     'success'=>'Inserted',
        //     'roleq'=> $roleq
        // ]);

        return redirect('/role')->with('success','Inserted');
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
        $rolearray = Role::where('role_id',$id)->first();
        return view('role.edit',compact('rolearray'));
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
            'role'=>'required'
        ]);

        $rolearray = Role::where('role_id',$id)->first();
        $rolearray->role = $request->get('role');
        $rolearray->save();

        return redirect('/role')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('role_id','=',$id)->delete();
        return redirect('/role')->with('success','Deleted');
    }
}
