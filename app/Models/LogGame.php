<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogGame extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'link_id', 'num', 'summ', 'created_at', 'win'
    ];


    /**
     * array settings
     * $key = random number in game
     * $value = percent
     */
    const SETTING = [
        900 => 70,
        600 => 50,
        300 => 30,
        0 => 10,
    ];

    /**
     * new game and log
     * @param integer $link_id
     * @return array|bool
     */
    public static function getNum($link_id, $user_id){
        $config = [];
        $num = rand(1, 1000);
        $summ = 0;
        $win = ($num %2 === 0 ) ? 1 : 0;

        if( $win ){
            foreach (LogGame::SETTING as $key=>$percent){
                if($key < $num ){
                    $summ = intval( $num * ( $percent / 100 ) );
                    break;
                }
            }
        }

        $config['num'] = $num;
        $config['summ'] = $summ;
        $config['win'] = $win;
        $config['user_id'] = $user_id;
        $config['link_id'] = $link_id;


        $log = new LogGame($config);


        return ($log->save()) ? $config : false;
    }
}
