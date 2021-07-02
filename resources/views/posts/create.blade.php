<x-app_layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head>
</head>
<body>
    
    {{-- <h1>Create</h1> --}}
    <form action="/posts/store" method="post">
        {{-- <input name="Title" id="title" cols="30" rows="3" placeholder="Title"><br>
       <textarea name="input" id="input" cols="30" rows="10" placeholder="Text"></textarea><br>
        <button type="submit">submit</button> --}}

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create') }}
            </h2>
        </x-slot>
            <form action="/posts/store" method="post">
                @csrf
                <legend style="text-align: center">글쓰기</legend>
                <div class="mb-3">
                    <label for="title" class="form-label">제목</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="mb-3">
                    <label for="content" class="form-label">내용</label>
                    <textarea class="form-control" name="content" id="content" rows="15">{{ old('content') }}</textarea>
                    @error('content')
                            <div>{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="submitbtn">
                    <button type="submit" class="btn btn-outline-primary">등록하기</button>
                  </div>
            </form>
            </div>        
</body>
</html>
</x-app_layout>