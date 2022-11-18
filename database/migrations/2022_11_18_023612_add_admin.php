<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Admin::create([
            'name'=>'Bidyut',
            'email'=>'bsaha1006@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('vdbd@2022!'),
            'address'=>'Dhaka',
            'phone'=>'01712844258',
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
