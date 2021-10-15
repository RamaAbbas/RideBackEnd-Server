<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function drivers()
    {
        $user = DB::select('select * from users where Type = "Driver"');
        return json_encode($user);
    }
    public function passengers()
    {
        $user = DB::select('select * from users where Type = "Passenger"');
        return json_encode($user);
    }
    public function ALL()
    {
        $user = DB::select('select * from users');
        return json_encode($user);
    }
    public function storePassenger(request $req)
    {
        $res = DB::insert('insert into users(User_id, FirstName, LastName, Address, Number, Type) values(?,?,?,?,?,?)', [$req->User_id, $req->FirstName, $req->LastName, $req->Address, $req->Number, $req->Type]);
        return "";
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->Address = $request->Address;
        $user->Number = $request->Number;
        $user->Type = $request->Type;
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function upload($Data,$mail)
    {
        error_log($Data);
        error_log($mail);
    }


    public function storeUser($FirstName, $LastName, $Address, $Number, $Type, $Password)
    {    
        
        if(DB::insert('insert into users(FirstName, LastName, Address, Number, Type, Password) values(?,?,?,?,?,?)', [$FirstName, $LastName, $Address, $Number, $Type, $Password])){
            return "Success";
        }
        return "Failed";
    }
    public function login($username, $password)
    {   $user = DB::select('select * from users where FirstName=?',[$username]);
        if (count($user)>0 && json_decode(json_encode($user[0]),true)['Password']==$password){
            return json_decode(json_encode($user[0]),true)['Type'];
        }
        
       
        return "error";
    }
    



}
   