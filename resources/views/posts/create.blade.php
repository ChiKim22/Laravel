<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Create</h1>
    <form action="/posts/store" method="post">
        {{-- <input name="Title" id="title" cols="30" rows="3" placeholder="Title"><br>
       <textarea name="input" id="input" cols="30" rows="10" placeholder="Text"></textarea><br>
        <button type="submit">submit</button> --}}
            <div class="posts">
                @csrf
              <input type="title" class="post" name="title" placeholder="title" value="{{ old('title') }}"><br>
                @error('title')
                    <div>{{ $message }}</div>
                @enderror
              <textarea type="password" class="post" id="content" name="content" placeholder="content">{{ old('content') }}</textarea>
                @error('content')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="submit">Submit</button>
        </div>
    </form>
    
</body>
</html>