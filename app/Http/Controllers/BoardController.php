<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Store;
use App\Menu;
use App\Board;
use App\Member;
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

    public function addOrder($id)
    {
        $board = Board::find($id);
        $data = ['board' => $board];
        return view('board.addOrder', $data);
    }

    public function addOrderProcess(Request $request)
    {
        $name = $request->username;
        $board_id = $request->board_id;
        $store_id = $request->store_id;
        $menus_id = $request->menus;

        foreach ($menus_id as $menu) {
            $member = new Member;
                
            $member->name = $name;
            $member->board_id = $board_id;
            $member->store_id = $store_id;
            $member->menu_id = $menu;

            $member->save();
        }
        //$request->session()->flash('success', 'create Successful');
        return redirect('/');
    }

    public function deleteOrder($id)
    {
        $board = Board::find($id);
        $datas = [];
        $i=0;

        //用board資料表的id,去對應到member資料表的board_id
        //下if指令,判斷member資料表的name與user資料表的name是否相等,若相等....
        //取得判斷後,篩選的整筆member資料
        foreach($board->members as $member)
        {
            if($member->name == Auth::user()->name)
            {
                $datas[$i] = $member;
                $i++;
            }
            
        }
        $data = ['members' => $datas];
        return view('board.deleteOrder', $data);
    }

    public function deleteOrderProcess(Request $request)
    {
        $members_id = $request->members;

        $members = Member::find($members_id);

        $id=0;
        foreach($members as $member)
        {   
            $id = $member->board_id;
            $member->delete();
        }
        return redirect('/deleteOrder/' . $id);
    }

    public function deleteIndex($id)
    {
        $board = Board::find($id);

        foreach ($board->members as $member) {
            $member->delete();
        }
        $board->delete();
        return redirect('/');
    }
}
