<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Requests\ReceiptRequest;
use App\Models\Payment;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserEventsController extends Controller
{
    public function sales($id){
        $this->data['tab_menu']='sales';
        $this->data['user']=User::findOrFail($id);
        return view('users.show.events.sales',$this->data);
    }

    public function purchase($id){
        $this->data['tab_menu']='purchase';
        $this->data['user']=User::findOrFail($id);
        return view('users.show.events.purchase',$this->data);
    }

    public function payment($id){
        $this->data['tab_menu']='payment';
        $this->data['user']=User::findOrFail($id);
        return view('users.show.events.payment',$this->data);
    }

    public function storePayment(PaymentRequest $request,$id){
        $formData = $request->all();
        $formData['user_id'] = $id;
        $formData['admin_id'] = Auth::ID();
        
        if(Payment::create($formData)){
            Session::flash('msg','Payment Added Successfully');
        }
        return redirect()->route('users.payment',$id);
    }

    public function destroyPayment($user_id,$payment_id){
         if(Payment::destroy($payment_id)){
            Session::flash('msg','Payment Deleted Successfully');
         }
         return redirect()->route('users.payment',$user_id);
    }
  
    public function receipts($id){
        $this->data['tab_menu']='receipts';
        $this->data['user']=User::findOrFail($id);
        return view('users.show.events.receipts',$this->data);
    }

    public function saveReceipts(ReceiptRequest $request,$id){
        $formData = $request->all();
        $formData['user_id'] = $id;
        $formData['admin_id'] = Auth::ID();
        if(Receipt::create($formData)){
            Session::flash('msg','Receipt Added Successfully!');
        }
        return redirect()->route('users.receipts',$id);
    }

    public function destroyReceipts($user_id,$receipt_id){
        if(Receipt::destroy($receipt_id)){
            Session::flash('msg','Payment Deleted Successfully');
        }
        return redirect()->route('users.receipts',$user_id);
    }
   
}
