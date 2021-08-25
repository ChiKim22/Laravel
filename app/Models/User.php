<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // protected $table = "users"; 
    //컨벤션(관례)을 따르지 않으면 따로 테이블 이름 지정해줘야됨.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password', // 이곳에 명시된 이름들은 컬럼값으로 사용가능하다.
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
       return $this->hasMany(Post::class);
    }

    public function viewed_posts() {
        return $this->belongsToMany(Post::class); // 네이밍 컨벤션을 따르지 않으면, 컬럼명을 정의해줘야됨.
        // return $this->belongsToMany(Post::class, 'post_user', 'user_id', 'post_id', 'id', 'id', 'post');
    }

    public function comments() {
        return $this->hasMAny(Comment::class);
    }
}
