<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Menu;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
	//只在登入後才可看見的功能
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id)
    {
        $store = Store::find($id);
        

        $message = '';
        if ($request->session()->has('success')) {
            $message = session('success');
        }
        if ($request->session()->has('error')) {
            $message = session('error');
        }

        $class = ['w3-pale-blue w3-border-blue', 'w3-pale-green w3-border-green','w3-pale-red w3-border-red', 'w3-pale-yellow w3-border-yellow'];

        #message value & store value for $data
        $data = ['message' => $message, 'store' => $store, "class" =>$class];

        return view('menu.index', $data);
    }

    public function create($id)
    {
    	return view('board.create', ['store_id' => $id]);
    }
}
