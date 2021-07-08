  <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Posts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head>
    </head>
    <body>
        
        <form action="{{ route('post.update', ['id'=>$post->id, 'page'=>$page]) }}"
            method="post"
            enctype="multipart/form-data">

                    @csrf
                    @method("put")

                    <div class="container mt-3">
                        <label for="title" >제목</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title" 
                        value="{{ old('title') ? old('title') : $post->title }} ">

                            @error('title')
                                <div>{{ $message }}</div>
                            @enderror

                      </div>
                      
                      <div class="container mt-3">
                        <label for="content" class="form-label">내용</label>
                        <textarea class="form-control" name="content" id="content" 
                        rows="15">{{ old('content') ? old('content') : $post->content }}</textarea>

                        @error('content')
                                <div>{{ $message }}</div>
                            @enderror
                      </div>

                      <div class="container mt-3">
                        <img src="{{ $post->imagePath() }}" width="20%" class="img-thumnail">
                      </div>

                      <div class="container mt-3">
                          <label for="file">File</label>
                          <input type="file" id="file" name="imageFile">
    
                          @error('imageFile')
                           <div>{{ $message }}</div>
                          @enderror

                      </div>
                      <div class="submitbtn">
                        <button type="submit" class="btn btn-outline-primary">등록하기</button>
                      </div>
                </form>
                </div>
                <script>
                  ClassicEditor
                          .create( document.querySelector( '#content' ) )
                          .then( editor => {
                                  console.log( editor );
                          } )
                          .catch( error => {
                                  console.error( error );
                          } );
          </script>        
    </body>
    </html>
