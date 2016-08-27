<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests;

class MenuController extends Controller
{
     public function add($id)
    {
    	return view('menu.add',['store_id' => $id]);
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
}
