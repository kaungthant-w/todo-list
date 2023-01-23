<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //customer create page
    public function create() {
        $posts = Post::orderBy("created_at",'desc')->paginate(2);

        // $posts = Post::where("id", "<", "6")->where('address','pyay')->get()->toArray();
        // $posts = Post::where('address','pyay')->get()->toArray();
        // $posts = Post::get();
        // $posts = Post::first()->toArray();
        // $posts = Post::get()->last();
        // $posts = Post::all()->toArray();
        // $posts = Post::first()->toArray();
        // $posts = Post::pluck('description');
        // $posts = Post::select("title")->get()->toArray();
        // $posts = Post::select("*")->get()->toArray();
        // $posts = Post::get()->toArray();
        // $posts = Post::select("title")->get();
        // $posts = Post::pluck("title","id");
        // $posts = Post::pluck("title","description");
        // $posts = Post::pluck("title","address");
        // $posts = Post::where("id",'<', '6')->pluck("title");
        // $posts = Post::pluck('title');
        // $posts = Post::get()->pluck('title');
        // $posts = Post::get()->random();
        // $posts = Post::all()->random();
        // $posts = Post::where("id", "<",11)->get()->random();
        // $posts = Post::where("address", 'yangon')->get()->random();
        // $posts = Post::where('id','<',20)->where("address", 'pyay')->get()->random();
        // $posts = Post::where('id','<',90)->where("address", 'pyay')->get();

        // where &&
        // orWhere ||
        // $posts = Post::where("id","<", 5) -> where("address", 'pyay')->get();
        // $posts = Post::orWhere("id","<",10) -> orWhere("address", 'pyay')->get();
        // $posts = Post::orderBy("id", "asc")->get();
        // $posts = Post::orderBy("id", "desc")->get();
        // $posts = Post::orderBy("price",'desc')->get();
        // $posts = Post::orderBy("price",'asc')->get();
        // $posts = Post::whereBetween("price", [3000, 5000])->get();
        // $posts = Post::whereBetween("price", [3000, 9000])->get();
        // $posts = Post::whereBetween("price", [3000,9000])->orderBy('price','asc')->get();
        // $posts = Post::select('id','address',"price")->whereBetween("price", [3000,9000])->orderBy('price','asc')->get();
        // $posts = Post::select("id",'address','price')
        //         ->where('address','bago')
        //         ->whereBetween("price",[3000, 9000])
        //         ->orderBy("price",'asc')
                // ->get();
        
        // $posts = Post::select("id",'address','price')
        //         ->where('address','bago')
        //         ->whereBetween("price",[3000, 9000])
        //         ->orderBy("price",'asc')
        //         ->dd();        

        // $posts = Post::dd();
        // $posts = Post::where("address",'pyay')->dd();
        // $posts = DB::table('users')->where("address", 'pyay')->orderBy('price','asc')->dd();
        // $posts = Post::where("address", 'pyay')->orderBy('price','asc')->dd();

        // $posts = DB::table("users")->where("address", "pyay");
        // $posts = Post::where('address', "pyay")->orderBy("price", 'asc')->value("title");
        // $posts = Post::where('address', "pyay")->orderBy("price", 'asc')->value("description");
        // $posts = Post::where('address', "pyay")->orderBy("price", 'asc')->value("price");
        // $posts = Post::where('address', "pyay")->orderBy("price", 'asc')->value("rating");
        // $posts = Post::where('address', "pyay")->where("id",'<',20)->orderBy("price", 'asc')->get(['title','price',"description"])->toArray();
        // $posts = Post::where("address",'pyay')->orderBy('price','asc')->get()->toArray();
        // $posts = Post::select("title",'price')
        //         ->where("address","pyay")
        //         ->orderBy("price","asc")
        //         ->get()
        //         ->toArray();
        // $posts = DB::table("users")->find(3);
        // $posts= Post::find(3)->toArray();
        // $posts = Post::where("id", 3)->get()->toArray();
        // $posts = Post::where("id", 3)->first();
        // $posts = DB::table("posts")->pluck("title");
        // $posts = DB::table("posts")->pluck("price");
        // foreach($posts as $title) {
        //     dd($title);
        // }

        // $posts = Post::count();
        // $posts = Post::max('price');
        // $posts = Post::min('price');
        // $posts = Post::avg('price');
        // $posts = Post::where("address", 'pyay')->exists();
        // $posts = Post::where("address", 'mandalay')->exists();
        // $posts = Post::where("address", 'singapore')->exists();
        // $posts = Post::where("address", 'malaysia')->doesntExist();
        // $posts = Post::select("id","title","price")->get()->toArray();
        // $posts = Post::select("id","title as post_title","title","price")->get()->toArray();
        // $posts = Post::select("id","title as a_title","title as b_title","price")
        // ->get()
        // ->toArray();
        // $posts = Post::select(DB::raw("count(address) as address_count"))
        // ->get()
        // ->toArray();
        // $posts = Post::select(DB::raw("count(price) as price_count"))
        // ->get()
        // ->toArray();
        // 
        // $posts = Post::select('address',DB::raw("count(address) as count"), DB::raw("MAX(price) as total_price"))
        // ->groupBy('address')
        // ->get()
        // ->toArray();

        // $posts = Post::select('address',DB::raw("count(address) as count"), DB::raw("MIN(price) as total_price"))
        // ->groupBy('address')
        // ->get()
        // ->toArray();

        // $posts = Post::select('address',DB::raw("count(address) as count"), DB::raw("SUM(price) as total_price"))
        // ->groupBy('address')
        // ->get()
        // ->toArray();

        // $posts = Post::select('address',DB::raw("count(address) as count"), DB::raw("AVG(price) as total_price"))
        // ->groupBy('address')
        // ->get()
        // ->toArray();
        // dd($posts);

        // $posts = Post::select('address',DB::raw("count(address) as count"), DB::raw("AVG(price) as total_price"))
        // ->groupBy('address')
        // ->get()
        // ->toArray();
        // dd($posts);

        // $posts = Post::select('rating',DB::raw("count(address) as count"), DB::raw("AVG(price) as total_price"))
        // ->groupBy('rating')
        // ->get()
        // ->toArray();
        // dd($posts);

        // $posts = Post::select('rating',DB::raw("count(rating) as rating_count"), DB::raw("AVG(price) as total_price"))
        // ->groupBy('rating')
        // ->get()
        // ->toArray();
        // dd($posts);

        // $posts = Post::select('rating',DB::raw("count(rating) as rating_count"), DB::raw("SUM(price) as total_price"))
        // ->groupBy('rating')
        // ->get()
        // ->toArray();
        // dd($posts);
        
        // $posts = Post::select('address',DB::raw("count(address) as address_count"), DB::raw("SUM(price) as total_price"))
        // ->groupBy('address')
        // ->get()
        // ->toArray();
        // dd($posts);

        // dd($posts);

        // dd($posts->toArray());

        //map each through
        // $posts = Post::get()->map(function($post) {
        //     $post -> title = strtoupper($post->title);
        //     $post -> description = strtoupper($post -> description);
        //     return $post;
        // });
        // $posts = Post::get()->each(function($post) {
        //     $post -> title = strtoupper($post->title);
        //     $post -> description = strtoupper($post -> description);
        //     $post -> price = $post -> price * 2;
        //     return $post;
        // });

        // $posts = Post::paginate(5)->each(function($post) {
        //     $post -> title = strtoupper($post->title);
        //     $post -> description = strtoupper($post -> description);
        //     $post -> price = $post -> price * 2;
        //     return $post;
        // });

        // $posts = Post::paginate(5)->through(function($post) {
        //     $post -> title = strtoupper($post->title);
        //     $post -> description = strtoupper($post->description);
        //     $post -> price = $post -> pirce * 2;
        //     return $post;
        // });

        // $posts = Post::paginate(5)->map(function($post) {
        //     $post -> title = strtoupper($post->title);
        //     $post -> description = strtoupper($post->description);
        //     $post -> price = $post -> pirce * 2;
        //     return $post;
        // });

        // dd($posts -> toarray());

        // dd($_REQUEST['key']);
        // $post = Post::where("title", $searchKey) -> get() -> toArray();
        // dd($post);
        // dd($searchKey);
        // $post = Post::where("title", 'like', '%'. $searchKey.'%')->get()->toArray();
        // $post = Post::when(request("key"), function($p){
        //     $searchKey = $_REQUEST["key"];
        //     $p -> where("title",'like',"%".$searchKey.'%');
        // })->paginate(2);
        // dd($post -> toArray());

        $posts = Post::when(request('searchKey'), function($query){
                    $key = request("searchKey");
                    $query -> orWhere("title", "like", "%".$key."%")->orWhere("description", 'like','%'.$key.'%');
                })
                ->orderBy("created_at","desc")
                ->paginate(3);
                // ->get();

        // dd(count($posts));

        return view('create', compact('posts'));
    }
    

    //post creat
    public function postCreate(Request $request) {
        // dd($request->all());
        // $data = [
        //     'title' => $request -> postTitle,
        //     'description' => $request -> postDescription
        // ];
        // dd($data);

        

        // $validator = Validator::make($request -> all(), [
        //     'postTitle' => 'required',
        //     'postDescription' => 'required',
        // ]);

        // if($validator -> fails()) {
        //     return back()
        //             -> withErrors($validator)
        //             -> withInput();
        // }

 
        $this -> postValidationCheck($request);
        $data = $this -> getPostData($request);
        // dd($data);
        Post::create($data);
        // return view('create');
        // return back();
        // return redirect("testing");//url
        // return redirect()->route("test");//name
        return redirect()->route("post#createPage")->with(['insertSuccess'=>'Post ဖန်တီးခြင်းအောင်မြင်ပါသည်']);        
    }

    // post delete
    public function postDelete($id) {
        // dd($id);

        // first way 
        // Post::where("id", $id)->delete();

        // second way 
        $post = Post::find($id)->delete();
        return back();
        // return redirect()->route("post#createPage");
    }

    //direct update page
    public function updatePage($id) {
        // dd($id);
        // $post = Post::where('id', $id)->get()->toArray();
        $post = Post::where('id', $id)->first();
        // $post = Post::get()->toArray();
        // $post = Post::first()->toArray();
        // dd($post);
        return view("update", compact("post"));
    }

    // edit page
    public function editPage($id) {
        $post = Post::where('id',$id)->first()->toArray();
        return view('edit', compact('post'));
    }

    //update post
    // public function update(Request $request, $id) {
    public function update(Request $request) {
        
        // dd($request->postId);
        // dd($request->all());
        // dd($id);
        // $updateData = $this -> getUpdateData($request);
        $this -> postValidationCheck($request);
        $updateData = $this -> getPostData($request);
        // dd($updateData);

        $id = $request -> postId;
        // dd($id);
        Post::where("id", $id)->update($updateData);
        return redirect()->route('post#createPage')->with(['updateSuccess'=>'Update လုပ်ခြင်းအောင်မြင်ပါသည်']);
    }

    // // get update data
    // private function getUpdateData($request) {
    //     return [
    //         'title' => $request -> updateName,
    //         'description' => $request -> updateDescription
    //     ];
    // }

    // get post data
    private function getPostData($request) {
        // dd("this is private function call test");

        // $response = [
        //     'title' => $request->postTitle,
        //     'description' => $request->postDescription
        // ];

        // return $response;

        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription
        ];
    }

    //post validation check
    private function postValidationCheck($request) {
        // dd($status);
        $validationRules =  [
            'postTitle' => 'required|min:5|max:50|unique:posts,title,'.$request -> postId,
            'postDescription' => 'required|min:5',
            'postFee' => 'required',
            'postAddress' => 'required',
            'postRating' => 'required',
            'postImage' => 'required',
        ];

        $validationMessage = [
            'postTitle.required' => 'Post Title ဖြည့်ရန် လိုအပ်ပါသည်။',
            'postDescription.required' => 'Post Description  ဖြည့်ရန် လိုအပ်ပါသည်။',
            'postTitle.min' => 'အနည်းဆုံး ၅ လုံးအထက်ရှိရပါမည်။',
            'postTitle.unique' => 'Post Title ခေါင်းစဉ်တူနေပါသည်။ ထပ်မံ ရိုက်ကြည့်ပါ။',
            'postFee.required' => 'Post Fee ဖြည့်ရန် လိုအပ်ပါသည်။',
            'postAddress.required' => 'Post Address ဖြည့်ရန် လိုအပ်ပါသည်။',
            'postRating.required' => 'Post Rating ဖြည့်ရန် လိုအပ်ပါသည်။',
            'postImage.required' => 'Post Image ဖြည့်ရန် လိုအပ်ပါသည်။',
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();

    }
    
}
