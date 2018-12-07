<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Show User Articles.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $blogs = $user->blogs()->simplePaginate(5);
        return view('welcome',compact('blogs'));
    }
}
