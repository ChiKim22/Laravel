<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   //모델은 하나의 레코드
    // protected $table = 'posts';
    use HasFactory;

    public function imagePath() {
        // $path = '/storage/images'; // 환경변수
        $path = env('IMAGE_PATH', '/storage/images/'); // env로 사용
        $imageFile = $this->image ?? 'noImage.jpg';
        return $path.$imageFile;
    }
}
