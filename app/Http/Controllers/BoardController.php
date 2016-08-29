<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Menu;
use App\Board;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
	//只在登入後才可看見的功能
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $boards = Board::all();
        

        $message = '';
        if ($request->session()->has('success')) {
            $message = session('success');
        }
        if ($request->session()->has('error')) {
            $message = session('error');
        }

        #message value & store value for $data
        $data = ['message' => $message, 'boards' => $boards];

        return view('board.index', $data);
    }



    public function create()
    {
    	$stores = Store::all();
        $data = ['stores' =>$stores];
        return view('board.create', $data);
    }

    public function createProcess(Request $request)
    {
        $name = $request->board_name;
        $store_id = $request->store_id;
        $end_time = $request->end_time;

        $board = new Board;

        $board->name = $name;
        $board->store_id = $store_id;
        $board->endtime = $end_time;

        //$board->save();
        if($board->save()){
            $request->session()->flash('success', 'create Successful');
        }else{
            $request->session()->flash('error', 'create Error');
        }
        return redirect('/');
    }
}
