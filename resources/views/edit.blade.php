@extends("master")
@section("content")
    <div class="container">
        <div class="row mt-5">
            <div class="col-10 col-lg-6 offset-2 offset-md-3">
                <a class="text-decoration-none text-black" href="{{route('post#updatePage', $post['id'])}}"><i class="fa-solid fa-arrow-left"></i> back</a>

                {{-- <form action="{{route('post#update', $post['id'])}}" method="post"> --}}
                    <form action="{{route('post#update')}}" method="post">
                    @csrf
                    <input type="hidden" name="postId" value="{{$post['id']}}">
                    <div class="form-group my-3">
                        <label for="">Post Title</label>
                        <input type="text" name="postTitle" id="" class="form-control" value=" {{$post['title']}} " placeholder="Enter post title..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea name="postDescription" id="" cols="30" rows="10" class="form-control" placeholder="Enter post description..." required> {{$post['description']}} </textarea>
                    </div>
                    <div class="row my-3">
                        <div class="col-3 offset-9 offset-md-8">
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
@endsection