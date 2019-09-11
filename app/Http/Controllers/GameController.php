<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Link;
use App\Models\LogGame;

class GameController extends Controller
{
    /**
     * Show the application dashboard.
     * @param $url string
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($url)
    {
        
        if(!$link = Link::where(['url' => $url, 'enable' => 1])
            ->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-7 day')))
            ->first()){
            abort(404);
        }

        return view('game.game', ['link' => $link]);
    }


    /**
     * ajax. User edit links
     * @param $request PageRequest
     * @return array
     */
    public function edit(PageRequest $request){
        $params = $request->all();
        return Link::editLink($params);
    }


    /**
     * game random number
     * @return string
     * @param $request PageRequest
     * @throws \Throwable
     */
    public function make(PageRequest $request){
        $params = $request->all();
        if(!$config = LogGame::getNum($params['page'], auth()->user()->id)) {
            return false;
        };
        return view('game.result_game', ['config' => $config]);
    }

    /**
     * get history games
     * @return array
     * @throws \Throwable
     */
    public function history(){

        $params = request()->all();

        $games = LogGame::where(['link_id' => $params['page']])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('game.result_history', ['games' => $games]);
    }
}
