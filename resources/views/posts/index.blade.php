<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index.php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head>
<body>
    <div class="container mt-5 mb-5">
        {{-- <a href="{{ route('dashboard') }}">Dashboard</a>
        <h1>게시글 리스트</h1> --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('리스트') }}
            </h2>
        </x-slot>

        @auth
        <a href="/posts/create" class="btn btn-primary ml-3">게시글 작성</a>
        @endauth

    <ul class="container mt-3">
        @foreach ($posts as $post)
        <li class="list-group-item">
        <span>
            <a href="{{ route('posts.show', ['id'=>$post->id, 'page'=>$posts->currentPage()]) }}">
             Title : {{ $post->title }}
            </a>
        </span>
        {{-- <div>
            content: {{ $post->content }}
        </div> --}}
        <br>
        <span>@written on {{ $post->created_at }}</span>  {{-- 상세한 시간 --}}
        <br>
        <span>{{ $post->created_at->diffForHumans() }}</span> {{-- n일전 --}}
        <hr>
        {{ $post->viewers->count() }} 
        {{ $post->viewers->count() > 0 ? Str::plural('view', $post->viewers->count()) : 'view' }} 
        {{-- 복수이면 views, 기본이면 view --}}
    </li>
        @endforeach
    </ul>
</div>
    <div class="mr-20 mb-20">
        {{$posts->links()}}
    </div>
</body>
</html>
</x-app-layout>