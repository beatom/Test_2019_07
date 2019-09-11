<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'url', 'created_at', 'enable'
    ];

    /**
     * disable link
     * @return bool
     */
    public function disableLink(){
        $this->enable = 0;
        return $this->save();
    }

    /**
     * get unique string for url
     * @return string
     */
    public function setLink($str_length = 10){

        while(true){
            try{
                $this->url = self::random_string($str_length);

                $this->save();
                return $this->url;
            }
            catch(\Exception $e){
            }
        }
    }

    /**
     * get unique string for url
     * @param $params array
     * @return string
     */
    public static function editLink($params){
        $out = [
            'ok' => false
        ];
        if(!$params['action'] OR !$link = static::find($params['page'])){
            return $out;
        }

        switch($params['action']){
            case 'new-link':
                $out['link'] = route('game', $link->setLink());
                $out['ok'] = true;
                break;
            case 'disable-link':
                $out['ok'] = $link->disableLink();
                $out['link'] = route('home');
                break;
        }

        return $out;
    }

    
    /**
     * get unique string for url
     * @param $user_id integer
     * @return string
     */
    public static function getUserActiveLinks($user_id){
        return static::where(['user_id' => $user_id, 'enable' => 1])
            ->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-7 day')))
            ->get();
    }

    /**
     * create random string
     * @param integer $str_length
     * @return bool|string
     */
    private static function random_string ($str_length)
    {
        $str_characters = array ('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

        if (!is_int($str_length) || $str_length < 0)
        {
            return false;
        }

        $characters_length = count($str_characters) - 1;
        $string = '';

        for ($i = $str_length; $i > 0; $i--)
        {
            $string .= $str_characters[mt_rand(0, $characters_length)];
        }

        return $string;
    }
}
