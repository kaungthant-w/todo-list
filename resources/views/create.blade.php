@extends('master')
@section("content")

    <div class="container">
        <div class="row mt-5">
            <div class="mb-3 col-12 col-md-5">

                @if (session("insertSuccess"))

                    <div class="alert alert-success alert-dismissible fade show">
                    <strong> {{session("insertSuccess")}} </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    </div>
                @endif

                @if (session("updateSuccess"))

                    <div class="alert alert-success alert-dismissible fade show">
                    <strong> {{session("updateSuccess")}} </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    </div>
                @endif
                <form action="{{route('post#create')}}" method="POST" class="p-3" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                    <input type="text" name="postTitle" class="form-control @error('postTitle') is-invalid @enderror" placeholder="Enter Post Title..." value="{{old('postTitle')}}">
                        
                        @error('postTitle')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Description</label>
                        <textarea name="postDescription" class="form-control @error('postDescription') is-invalid @enderror" id="" cols="30" placeholder="Enter Post Description" rows="10">{{old('postDescription')}}</textarea>
                        @error('postDescription')
                            <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <input type="file" name="postImage" class="form-control @error('postImage') is-invalid @enderror">
                        @error('postImage')
                            <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="">Fee</label>
                        <input type="number" name="postFee" class="form-control" placeholder="Enter Post Fee..." value=" {{old('postFee')}} ">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" name="postAddress" class="form-control" placeholder="Enter Post Address..." value="{{old('postAddress')}}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Rating</label>
                        <input type="number" name="postRating" class="form-control" placeholder="Enter Post Rating..." value=" {{old('postRating')}} " min="0" max="5">
                    </div>
                    
                    
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary mb-3" value="Create">
                    </div>
                </form>
            </div>
            <div class="mb-3 col-12 col-md-7">
                <div class="row">
                    <h3 class="my-3">Total - {{ $posts->total() }}</h3>
                    <div class="col-5 offset-6">
                        <form action=" {{route('post#createPage')}} " method="get">
                            <div class="d-flex input-group ">
                                <input type="text" value=" {{ request('searchKey') }} " class="form-control" name="searchKey" placeholder="Enter Search Key...">
                                <button class="btn btn-outline-danger">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="data-container">
                    @if(count($posts) != 0)   
                    @foreach ($posts as $item )
                    <div class="post p-3 shadow-sm mb-4">
                        <div class="row">
                        <h5 class="col-8"> {{$item->title}} </h5>
                        <div class="col">{{ $item->created_at->format('j-F-Y | n:i:A') }}</div>
                        </div>
                        <p class="text-muted">{{ Str::words($item['description'],18,'...') }}</p>
                        <div class="d-flex justify-content-between ">
                            <div class="">
                                <span class="text-primary">
                                    <i class="fa-solid fa-money-bill-1"> 
                                    </i>
                                    {{$item -> price}} kyats
                                </span> | 
                                <span class="text-danger">
                                    <i class="fa-solid fa-location-dot"></i> {{$item -> address}}
                                </span> | 
                                <span class="text-warning">
                                    <i class="fa-solid fa-star"></i> {{$item -> rating}}
                                </span>
                            </div>
                            <div class="">
                                <a href="{{ route("post#delete", $item['id']) }}" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i> ????????????????????? </a>
                            <a href=" {{route('post#updatePage', $item['id'])}} ">
                                <button class="btn btn-sm btn-primary"> <i class="fa-solid fa-file-lines"></i> ???????????????????????????????????????????????????</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <h3 class="text-danger text-center mt-5">There is not data...</h3>
                    @endif
                </div>

                {{$posts->appends(request()->query())->links()}}
            </div>
        </div>
    </div>

@endsection