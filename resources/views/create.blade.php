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
{{-- 
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                
                <form action="{{route('post#create')}}" method="POST" class="p-3">
                    @csrf
                    <div class="form-group mb-3">
                    <input type="text" name="postTitle" class="form-control @error('postTitle') is-invalid @enderror" placeholder="Enter Post Title..." value=" {{old('postTitle')}} ">
                        
                        @error('postTitle')
                        <div class="invalid-feedback">
                            {{-- <small class="text-danger">Post ခေါင်းစဉ်ဖြည့်ရန် လိုအပ်ပါသည်</small> --}}
                            {{$message}}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group mb-3">
                        <textarea name="postDescription" class="form-control @error('postDescription') is-invalid @enderror" id="" cols="30" placeholder="Enter Post Description" rows="10"> {{old('postDescription')}} </textarea>
                        @error('postDescription')
                            <div class="invalid-feedback">
                            {{-- <small class="text-danger">Post Description ဖြည့်ရန် လိုအပ်ပါသည်</small> --}}
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary mb-3" value="Create">
                    </div>
                </form>
            </div>
            <div class="mb-3 col-12 col-md-7">
                <h3 class="my-3">Total - {{ $posts->total() }}</h3>
                <div class="data-container">
                    @foreach ($posts as $item )
                    <div class="post p-3 shadow-sm mb-4">
                        <div class="row">
                        <h5 class="col-8"> {{$item['title']}} </h5>
                        {{-- <div class="col">{{ $item['created_at'] }}</div> --}}
                        </div>
                        {{-- <p class="text-muted"> {{$item['description']}} </p> --}}
                        {{-- <p class="text-muted"> {{substr($item['description'],0,100)}} </p> --}}

                        <p class="text-muted">{{ Str::words($item['description'],18,'...') }}</p>
                        <div class="text-end">
                            <a href="{{ route("post#delete", $item['id']) }}" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i> ဖျက်ရန် </a>

                            {{-- <form action="{{route('post#delete',$item['id'])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i> ဖျက်ရန် </button>
                            </form> --}}
                            
                            <a href=" {{route('post#updatePage', $item['id'])}} ">
                                <button class="btn btn-sm btn-primary"> <i class="fa-solid fa-file-lines"></i> အပြည့်အစုံအဖတ်ရန်</button>
                            </a>
                        </div>
                    </div>
                    @endforeach                       

                    {{-- @for ($i=0;$i<count($posts);$i++)
                    <div class="post p-3 shadow-sm mb-4">
                        <h5> {{$posts[$i]['title']}} </h5>
                        <p class="text-muted"> {{$posts[$i]['description']}} </p>
                        <div class="text-end">
                            <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i> </button>
                            <button class="btn btn-sm btn-primary"> <i class="fa-solid fa-file-lines"></i> </button>
                        </div>
                    </div>
                    @endfor --}}
                </div>

                {{$posts->links()}}
            </div>
        </div>
    </div>

@endsection