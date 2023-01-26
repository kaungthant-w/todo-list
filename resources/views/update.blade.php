@extends("master")
@section("content")
    <div class="container">
        <div class="row mt-5">
            <div class="col-10 col-lg-6 offset-2 offset-lg-3">
                <a class="text-decoration-none text-black" href="{{route('post#home')}}"><i class="fa-solid fa-arrow-left"></i> back</a>

                <h3 class="my-3">{{$post['title']}}</h3>
                <div class="d-flex">
                    <div class="btn btn-sm bg-dark text-white my-2 me-2"><i class="fa-solid fa-money-bill-1 text-primary"> 
                                    </i> {{$post->price}} Kyats</div>
                    <div class="btn btn-sm bg-dark text-white my-2 me-2"><i class="fa-solid fa-location-dot text-danger"></i> {{$post->address}} </div>
                    <div class="btn btn-sm bg-dark text-white my-2 me-2"><i class="fa-solid fa-star text-warning"></i> {{$post->rating}} </div>
                    <div class="btn btn-sm bg-dark text-white my-2 me-2"><i class="fa-solid fa-calendar-days"> 
                    </i> {{ $post['created_at']->format("j-F-Y") }}</div>
                    <div class="btn btn-sm bg-dark text-white my-2 me-2"><i class="fa-solid fa-clock"> 
                    </i> {{ $post['created_at']->format("n:i A") }}</div>
                </div>
                
                <div class="">
                    <img src="{{asset($post['image'] ? 'storage/'.$post['image'] : 'storage/404_image.jpg')}}" alt="" class="img-thumbnail my-4 shadow-sm">

                </div>
                
                <p class="text-muted">
                    {{$post['description']}}
                </p>
                
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