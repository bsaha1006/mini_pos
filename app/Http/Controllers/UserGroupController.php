<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupController extends Controller
{
    public function index(){
        $this->data['groups']=Group::all();
        return view('groups.groups',$this->data);
    }

    public function create(){
        return view('groups.form',$this->data);
    }

    public function store(Request $request){
            $formData=$request->all();
            if(Group::create($formData)){
                Session::flash('msg','Group Created Successfully');
            }
            return redirect()->to('groups');
    }
   
    public function destroy($id){
         if(Group::destroy($id)){
            Session::flash('msg','Group Deleted Successfully');
         }
         return redirect()->to('groups');
    }
}
