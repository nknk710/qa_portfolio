<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Question;
use App\Models\Answer;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'user_name', 'introduction', 'profile_image', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function followers()
    {
        return $this->belongsToMany(self::class, 'relations', 'followed_id', 'following_id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'relations', 'following_id', 'followed_id');
    }
    
    public function questions()
    {
      return $this->hasMany('App\Models\Question');

    }
    
    public function bookmarks()
    {
      return $this->hasMany('App\Models\Bookmark');

    }
    
    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
    }
    
    protected $guarded = array('id');

    public static $rules = array(
        'user_name' => 'required','max50'
    );
    

}
