<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Index method for get list users
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.user.list');
    }
}
