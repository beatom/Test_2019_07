<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class User extends Authenticatable
{
    use Notifiable;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->password = Hash::make(time());
        });

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone_number', 'password','is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * checking user admin role
     * @return boolean
     */
    public function isAdmin(){
        return $this->is_admin;
    }

    public static function set($data, $user_id = false) {
        $user = static::updateOrCreate(
            ['id' => $user_id],
            [
                'name'         => $data['name'],
                'phone_number' => $data['phone'],
            ]);

        $link = new Link([
            'user_id' => $user->id,
        ]);
        $link->setLink();

    }
}
