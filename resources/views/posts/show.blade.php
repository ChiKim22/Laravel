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
    <div class="mb-5">
        <a href="{{ route('posts.index', ['page'=>$page]) }}">Menu</a>
    </div>
        {{-- <form action=""></form> --}}
                <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" readonly class="form-control" value="{{ $post->title }}">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" readonly rows="5">{{ $post->content }}</textarea>
              </div>
              <div class="form-group">
                <label>Image</label>
                <label for="imageFile">Post Image</label>
                <div class="my-6 mx-3 w-25">
                  {{-- <img src="/storage/images/{{ $post->image ?? 'noImage.jpg' }}"/> --}}
                  <img src="{{ $post->imagePath() }}" class="img-thumbnail"/>
                </div>
                </div>
              <div class="form-group">
                <label>Written Date</label>
                <input type="text" readonly class="form-control" value="{{ $post->created_at->diffForHumans() }}">
              </div>

              <div class="form-group">
                <label>User</label>
                <input type="text" readonly class="form-control" value="{{ $post->user_id }}">
              </div>
        </form>
        </div>
    
</body>
</html>
</x-app-layout>