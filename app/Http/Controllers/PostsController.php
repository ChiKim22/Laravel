<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'content' => 'required',
            'imageile' => 'image|max:5000'
        ]);

        //DB 에 저장
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;
        $post->save();
        // dd($request);

        //File 처리
        //내가 원하는 파일시스템 상의 위치에 원하는 이름으로 
        //파일을 저장하고   
        if($request->file('imageFile')){
            $post->image = $this->uploadPostImage($request);
        }

        $post->save();
        //$post->image = $fileName;

        // $post->save();

        //결과 뷰를 반환
        return redirect('/posts/index');
        // $posts = Post::paginate(5);
        // return view('posts.index', ['posts'=>$posts]); 
    }

    protected function uploadPostImage($request) {
        $name = $request->file('imageFile')->getClientOriginalName();
        //확장자 제외
        //ex) 1.jpg -> 1
        $extension  = $request->file('imageFile')->extension();

        $nameWithoutExtension = Str::of($name)->basename('.'.$extension);
        $fileName = $nameWithoutExtension .'_' . time() . '.' . $extension;

        // dd($fileName);
        // $fileName = $name;
        
        $request->file('imageFile')->storeAs('public/images', $fileName);
        //$request->imageFile
        //그 파일 이름을 컬럼에 설정
        return $fileName;
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
        $this->middleware(['auth'])->except(['index', 'show']);
    }
    
    public function edit(Request $request, Post $post) { // 내부적으로 찾을때 findOrFail 사용.
        // $post = Post::where('id', $id)->first();
        // $post = Post::find($id);
        // dd($post);

        // 수정 폼 생성
        return view('posts.edit', ['post'=>$post, 'page'=>$request->page]);
    }
    public function update(Request $request, $id) {
        // vaildation
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'imageFile' => 'image|max:5000'
        ]);

        $post = Post::find($id);

        // Authorization 즉 수정 권환이 있는지 검사
        // 로그인한 사용자와 게시글의 작성자가 같은지 체크
        if ($request->user()->cannot('update', $post)) { // policy 생성 후
            abort(403);
        }

        // 이미지 파일 수정도 같이됨 (파일시스템)
        if($request->file('imageFile')){
            $imagePath = 'public/images/'.$post->image;
            Storage::delete($imagePath);
            $post->image = $this->uploadPostImage($request);
        }

        // 게시글을 디비에서 수정
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();


        return redirect()->route('posts.show', ['id'=>$id, 'page'=>$request->page]);
    }
    public function destroy(Request $request, $id) {
     // 삭제전 파일 시스템에서 이미지 파일 삭제
     // 게시글을 디비에서 삭제
      $post = Post::findOrFail($id);

     // Authorization 즉 수정 권환이 있는지 검사
     // 로그인한 사용자와 게시글의 작성자가 같은지 체크
     //  if(auth()->user()->id != $post->user_id) {
     //     abort(403);
     //  }
     if ($request->user()->cannot('update', $post)) {
         abort(403);
     }
    

      $page = $request->page;
      //이미지가 있는지 없는지 체크
      if ($post->image){
          $imagePath = 'public/images'.$post->image;
          Storage::delete($imagePath);
      }
      $post->delete();
      
      return redirect()->route('posts.index', ['page'=>$page]);
    }

    public function myPost() {
        // dd('ok');
        // $posts = auth()->user()->posts()->latest()->paginate(5);

        // return view('posts.index', ['posts'=>$posts]);

        $posts = auth()->user()->posts()->latest()->paginate(5);
        // 정렬기준 (order by('title', '여러개 가능') ==> 제목 순)
        return view('posts.index', compact('posts'));
    }
    
}
