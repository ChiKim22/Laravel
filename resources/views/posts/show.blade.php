<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head>
</head>
<body>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>
        {{-- <form action=""></form> --}}
                <div class="container mb-3">
                <label for="title">Title</label>
                <input type="text" readonly class="form-control" value="{{ $post->title }}">
              </div>
              <div class="container mb-5">
                <label for="content" class="form-label">Content</label>
                <div name="content" readonly id="content">{!! $post->content !!}</textarea>
              </div>
              <div class="container mb-3">
                <label>Image</label>
                <label for="imageFile">Post Image</label>
                <div class="my-6 mx-3 w-25">
                  {{-- <img src="/storage/images/{{ $post->image ?? 'noImage.jpg' }}"/> --}}
                  <img src="{{ $post->imagePath() }}" class="img-thumbnail"/>
                </div>
                </div>
              <div class="container mb-3">
                <label>Written Date</label>
                <input type="text" readonly class="form-control" value="{{ $post->created_at->diffForHumans() }}">
              </div>
              <div class="container mb-3">
                <label>Last Worked</label>
                <input type="text" readonly class="form-control" value="{{ $post->updated_at }}">
              </div>
              <div class="container mb-3">
                <label>User</label>
                <input type="text" readonly class="form-control" value="{{ $post->user->name }}">
                {{-- <input type="text" readonly class="form-control" value="{{ $post->user()->select('name', 'email')->get() }}"> --}}
                {{-- email 정보도 표시함 단, name 뒤에 괄호를 빼면 모든 정보가 나옴 --}}
              </div>
              
              @auth
              @if (auth()->user()->id == $post->user_id)
              {{-- @can('update, $post') --}}
              <div class="flex">
                <a class="btn btn-primary" href="{{ route('posts.index', ['page'=>$page]) }}">Menu</a>
                
                <a class="btn btn-warning" href = "{{ route('post.edit', ['post'=>$post->id, 'page'=>$page]) }}">Edit</a>

                <form action="{{ route('post.delete', ['id'=>$post->id, 'page'=>$page]) }}" method="post">
                  @csrf
                  @method("delete")
                  <button class="btn btn-danger">Delete</button>
                </form>
              </div>           
              @endif
              {{-- @endcan --}}
              @endauth
        </form>
        </div>
</body>
</html>
</x-app-layout>
