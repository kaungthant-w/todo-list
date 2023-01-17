<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //customer create page
    public function create() {
        $posts = Post::orderBy("created_at",'desc')->paginate(3);
        // dd($posts['total']);
        // dd($posts[0]["title"]);
        // dd($posts->total());
        return view('create', compact('posts'));
    }

    //post create
    public function postCreate(Request $request) {
        // dd($request->all());
        // $data = [
        //     'title' => $request -> postTitle,
        //     'description' => $request -> postDescription
        // ];

        // dd($data);

        $validationRules =  [
            'postTitle' => 'required',
            'postDescription' => 'required'
        ];

        Validator::make($request->all(),$validationRules)->validate();

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
        $post = Post::where('id', $id)->first()->toArray();
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
        // dd($request->all());

        // dd($id);
        // $updateData = $this -> getUpdateData($request);
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
    
}
