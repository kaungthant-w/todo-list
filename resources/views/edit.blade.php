@extends("master")
@section("content")
    <div class="container">
        <div class="row mt-5">
            <div class="col-10 col-lg-6 offset-2 offset-md-3">
                <a class="text-decoration-none text-black" href="{{route('post#updatePage', $post['id'])}}"><i class="fa-solid fa-arrow-left"></i> back</a>

                {{-- <form action="{{route('post#update', $post['id'])}}" method="post"> --}}
                    <form action="{{route('post#update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="postId" value="{{$post['id']}}">
                    <div class="form-group my-3">
                        <label for="">Post Title</label>
                        <input type="text" name="postTitle" id="" class="form-control @error("postTitle")
                            is-invalid 
                        @enderror" value=" {{old('postTitle',$post['title'])}} " placeholder="Enter post title...">
                        @error('postTitle')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class=" my-4">
                        {{-- @if ($post['image'] == null)
                            <img src="{{asset('storage/404_image.jpg')}}" class="img-thumbnail my-4 shadown-sm" alt="">
                        @else
                            <img src="{{asset('storage/'.$post['image'])}}" class="img-thumbnail my-4 shadown-sm" alt="">
                        @endif --}}

                        <label for="">Image</label>
                        <img src="{{asset('storage/'.( $post['image'] ? $post['image'] : '404_image.jpg'))}}" class="img-thumbnail shadown-sm" alt="">

                        <div class="form-group my-3">
                            {{-- <input type="file" name="postImage" class="form-control"> --}}
                            <input type="file" name="postImage" class="form-control @error('postImage') is-invalid @enderror" value="{{old('postImage', $post['image'])}}">
                            @error('postImage')
                                <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea name="postDescription" id="" cols="30" rows="10" class="form-control @error('postDescription')
                            is-invalid
                        @enderror" placeholder="Enter post description..."> {{old('postDescription',$post['description'])}} </textarea>
                        @error("postDescription")
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="">Post Fee</label>
                        <input type="text" name="postFee" class="form-control" placeholder="Enter Post Fee..." value="{{old('postFee', $post['price'])}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Post Address</label>
                        <input type="text" name="postAddress" class="form-control" placeholder="Enter Post Address..." value="{{old('postAddress', $post['address'])}}">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Post Rating</label>
                        <input type="text" name="postRating" class="form-control" placeholder="Enter Post Rating..." value="{{old('postRating', $post['rating'])}}">
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