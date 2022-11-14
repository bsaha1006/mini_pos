<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users']=User::all();
        return view('users.users',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups']   =Group::dropDownList();
        $this->data['mode']     ='create';
        $this->data['headline'] ='Add New User';
        return view('users.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $formData               = $request->all();
        $formData['admin_id']   =Auth::Id();
        if(User::create($formData)){
            Session::flash('msg','User Created Successfully');
        }
        return redirect()->to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user']= User::findOrFail($id);
        return view('users.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $this->data['groups']   =Group::dropDownList();
        $this->data['user']     =User::findOrFail($id);
        $this->data['mode']     ='edit';
        $this->data['headline'] ='Update  User Information';

        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $user->name     =$request->name;
        $user->phone    =$request->phone;
        $user->email    =$request->email;
        $user->group_id =$request->group_id;
        $user->address  =$request->address;
        if($user->save()){
            Session::flash('msg','User Updated Successfully');
        }
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::destroy($id)){
            Session::flash('msg','User Deleted Succesfully!');
        }
        return redirect()->to('users');
    }
}
