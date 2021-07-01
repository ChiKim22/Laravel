<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Suport\Facades\Auth;

class PostsController extends Controller
{

    // PostsController
    // create => view('posts.create');
    // store
    // edit => view('posts.edit');
    // update
    // destroy
    // show => view('posts.show');
    // index => view('posts.index');

    public function create() {
        // dd('OK'); // diedump => 덤프하고 죽음.
        return view('posts.create');
    }

    public function store(Request $request) {
        // $request -> input['title'];
        // $request -> input['content'];

        //GET 방식은 정보조회만
        //POST 방식은 자원에 대한 변경 => 해킹으로 악용될 우려로 제약이 걸려있음.

        $title = $request->title;
        $content = $request->content;

        //DB 에 저장
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;
        $post->save();

        //결과 뷰를 반환
        return redirect('/posts/index');
        // dd($request);
    }
    public function index() {
        $posts = Post::all();
        return $posts;
    }
}
