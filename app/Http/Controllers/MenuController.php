<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Store;
use App\Http\Requests;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $store = Store::find($id);
        return view('menu.index', ['store' => $store]);
    }

     public function add($id)
    {
    	return view('menu.add', ['store_id' => $id]);
    }

    public function addProcess(Request $request)
    {
    	$name = $request->name;
    	$price = $request->price;
    	$store_id = $request->id;

    	$menu = new Menu;

    	$menu->name = $name;
    	$menu->price = $price;
    	$menu->store_id = $store_id;

    	if($menu->save()){
    		$request->session()->flash('success', 'addMenu Successful');
    	}else{
    		$request->session()->flash('error', 'addMenu Error');
    	}
    	return redirect('/store');
    }

    public function edit($id)
    {
        $store = Store::find($id);
        $data = ['store' => $store];
        
        return view('menu.edit', $data);
    }

    public function editProcess(Request $request)
    {
        $store_id = $request->store_id;
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        

        $menu = Menu::find($id);
        if (!$menu) {
           return redirect('/store');
        }

        $menu->name = $name;
        $menu->price = $price;


        if($menu->save()){
            $request->session()->flash('success', 'editStore Successful');
        }else{
            $request->session()->flash('error', 'editStore Error');
        }
        return redirect('/menu/'. $store_id);
    }
}
