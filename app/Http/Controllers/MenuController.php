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
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $store_id = $request->store_id;

        if($store_id){

            $menus = Menu::find($id);

            if (!$menus) {
               return redirect('/store');
            }

            $i=0;
            foreach($menus as $menu){
                $menu->name = $name[$i];
                $menu->price = $price[$i];

                $menu->save();

                $i++;
            }
        }

       
        $request->session()->flash('success', 'edit Menu Successful');

        return redirect('/menu/'. $store_id);
    }

    public function deleteProcess(Request $request)
    {
        $id = $request->id;

        $store = Store::find($id);

        foreach ($store->menus as $menu) {
            $menu->delete();
        }

        $request->session()->flash('success', 'delete Menu Successful');

        return redirect('/store');

    }
}
