<?php

namespace App\Http\Controllers;

// use Storage;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class PostController extends Controller
{
    //customer create page
    public function create() {
        $posts = Post::orderBy("created_at",'desc')->paginate(2);
        $posts = Post::when(request('searchKey'), function($query){
                    $key = request("searchKey");
                    $query -> orWhere("title", "like", "%".$key."%")->orWhere("description", 'like','%'.$key.'%');
                })
                ->orderBy("created_at","desc")
                ->paginate(3);

        return view('create', compact('posts'));
    }

    //post creat
    public function postCreate(Request $request) {        
        $this -> postValidationCheck($request);
        $data = $this -> getPostData($request);
        
        if($request->hasFile("postImage")) {
            $fileName = uniqid().'_'.$request->file("postImage")->getClientOriginalName();
            $request->file("postImage")->storeAs("public", $fileName);
            $data['image'] = $fileName;
        }

        Post::create($data);
        return redirect()->route("post#createPage")->with(['insertSuccess'=>'Post ဖန်တီးခြင်းအောင်မြင်ပါသည်']);        
    }

    // post delete
    public function postDelete($id) {
        // second way 
        $post = Post::find($id)->delete();
        return back();
    }

    //direct update page
    public function updatePage($id) {
        $post = Post::where('id', $id)->first();
        return view("update", compact("post"));
    }

    // edit page
    public function editPage($id) {
        $post = Post::where('id',$id)->first()->toArray();
        return view('edit', compact('post'));
    }

    //update post
    public function update(Request $request) {
        $this -> postValidationCheck($request);
        $updateData = $this -> getPostData($request);
        $id = $request -> postId;
        if($request->hasFile("postImage")) {

            // delete 
            $oldImagName = Post::select('image')->where("id", $request->postId)->first()->toArray(); 
            $oldImagName = $oldImagName["image"];
            if($oldImagName != null) {
                Storage::delete('public/'.$oldImagName);
            }            

            $fileName = uniqid().'_'.$request->file("postImage")->getClientOriginalName();
            $request->file("postImage")->storeAs("public", $fileName);
            $updateData['image'] = $fileName;
            
        }
        
        Post::where("id", $id)->update($updateData);
        return redirect()->route('post#createPage')->with(['updateSuccess'=>'Update လုပ်ခြင်းအောင်မြင်ပါသည်']);
    }


    // get post data
    private function getPostData($request) {

        $data = [
            'title' => $request->postTitle,
            'description'=>$request->postDescription,
        ];

        $data['price'] = $request->postFee == null ? 2000 : $request->postFee;
        $data["address"] = $request->postAddress == null ? "Pyay" : $request->postAddress;
        $data["rating"] = $request->postRating == null ? 5 : $request-> postRating;

        return $data;
        
    }

    //post validation check
    private function postValidationCheck($request) {
        $validationRules =  [
            'postTitle' => 'required|min:5|max:50|unique:posts,title,'.$request -> postId,
            'postDescription' => 'required|min:5',
            'postImage' => 'mimes:jpg,jpeg,png|file',
        ];

        $validationMessage = [
            'postTitle.required' => 'Post Title ဖြည့်ရန် လိုအပ်ပါသည်။',
            'postTitle.unique' => 'Post Title ခေါင်းစဉ်တူနေပါသည်။ ထပ်မံ ရိုက်ကြည့်ပါ။',
            'postTitle.min' => 'Post Title အနည်းဆုံး ၅ လုံးအထက်ရှိရပါမည်။',
            'postDescription.required' => 'Post Description  ဖြည့်ရန် လိုအပ်ပါသည်။',
            'postDescription.min' => 'Post Description အနည်းဆုံး ၅ လုံးအထက်ရှိရပါမည်။',
            'postImage.mimes' => 'Image သည် PNG JPEG JPG type သာဖြစ်ရပါမည်။'
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();

    }
    
}
