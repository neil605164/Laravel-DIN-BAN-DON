<?php

namespace App\Http\Controllers;

use App\Store;
use App\Menu;
use App\Board;
use Illuminate\Http\Request;
use App\Http\Requests;

class StoreController extends Controller
{
    //只在登入後才可看見的功能
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {	
    	$stores = Store::all();

    	$message = '';
    	if ($request->session()->has('success')) {
    		$message = session('success');
		}
		if ($request->session()->has('error')) {
    		$message = session('error');
		}

		$class = ['w3-pale-blue w3-border-blue', 'w3-pale-green w3-border-green','w3-pale-red w3-border-red', 'w3-pale-yellow w3-border-yellow'];

		#message value & store value for $data
		$data = ['message' => $message, 'stores' => $stores, "class" =>$class];

    	return view('store.index',$data);

    }

    public function add()
    {
    	return view('store.add');
    }

    public function addProcess(Request $request)
    {
    	$name = $request->name;
    	$tel = $request->tel;
    	$addr = $request->addr;
    	$type = $request->type;

    	$store = new Store;

    	$store->name = $name;
    	$store->tel = $tel;
    	$store->addr = $addr;
    	$store->type = $type;

    	if($store->save()){
    		$request->session()->flash('success', 'addStore Successful');
    	}else{
    		$request->session()->flash('error', 'addStore Error');
    	}
    	return redirect('/store');
    }

    public function edit($id)
    {
    	$store = Store::find($id);
		$data = ['store' => $store];
		
		return view('store.edit', $data);
    }

    public function editProcess(Request $request)
    {
    	$id = $request->id;
    	$name = $request->name;
    	$tel = $request->tel;
    	$addr = $request->addr;
        $type = $request->type;

    	$store = Store::find($id);

    	$store->name = $name;
    	$store->tel = $tel;
    	$store->addr = $addr;
    	$store->type = $type;

    	if($store->save()){
    		$request->session()->flash('success', 'editStore Successful');
    	}else{
    		$request->session()->flash('error', 'editStore Error');
    	}
    	return redirect('/store');
    }

    public function deleteProcess(Request $request)
    {
    	$id = $request->id;

    	$store = Store::find($id);

        foreach ($store->menus as $menu) {
            $menu->delete();
        }

        foreach($store->boards as $board){
            $board->delete();
        }

    	if($store->delete()){
            $request->session()->flash('success', 'editStore Successful');
    	}else{
    		$request->session()->flash('error', 'editStore Error');
    	}
    	return redirect('/store');
    }
}

