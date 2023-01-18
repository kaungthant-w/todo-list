@extends("master")
@section("content")
    <div class="container">
        <div class="row mt-5">
            <div class="col-10 col-lg-6 offset-2 offset-lg-3">
                <a class="text-decoration-none text-black" href="{{route('post#home')}}"><i class="fa-solid fa-arrow-left"></i> back</a>
                {{-- <h3 class="my-3">{{$post[0]['title']}}</h3> --}}
                <h3 class="my-3">{{$post['title']}}</h3>
                <p class="text-muted">
                    {{-- {{$post[0]['description']}} --}}
                    {{$post['description']}}
                </p>
                {{ $post['created_at']->format("j-F-Y | n:i A") }}
            </div>
            <div class="row my-3">
                <div class="col-3 offset-10 offset-md-8">
                    <a href=" {{route("post#editPage",$post['id'])}} ">
                        <button class="btn btn-dark">Edit</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection