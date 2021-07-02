<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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

        $request->validate([ // 빈칸일때 서브밋 안함.
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        //DB 에 저장
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;
        $post->save();
        // dd($request);

        //결과 뷰를 반환
        return redirect('/posts/index');
        // $posts = Post::paginate(5);
        // return view('posts.index', ['posts'=>$posts]); 
    }
    public function index() {
        // $post = Post::all();
        // $post = Post::orderBy('created_at', 'desc')->get();
        // $post= Post::latest()->get();
        $posts = Post::latest()->paginate(5); // 페이지별로 몇개
        // dd($posts[0]->created_at);
        // dd($posts);

        return view('posts.index', ['posts'=>$posts]);
        }

    public function show(Request $request, $id) {
        $post = Post::find($id);
        $page = $request->page;
        return view('posts.show', compact('post', 'page'));
    }

    public function __construct()
    {
        $this->middleware(['auth'])/*->except('index', 'show')*/;
    }
}
