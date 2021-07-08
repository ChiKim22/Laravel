<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   //모델은 하나의 레코드
    // protected $table = 'posts';
    //컨벤션(관례)을 따르지 않으면 따로 테이블 이름 지정해줘야됨.

    use HasFactory;

    public function imagePath() {
        // $path = '/storage/images'; // 환경변수
        $path = env('IMAGE_PATH', '/storage/images/'); // env로 사용
        $imageFile = $this->image ?? 'noImage.jpg';
        return $path.$imageFile;
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
