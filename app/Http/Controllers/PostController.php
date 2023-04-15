<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Database\Seeders\Categories;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorepostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('posts',compact('posts'));
    }
    public function create() {
        $categories = Category::orderBy('category_name')->get();
        $post = Post::with('category')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('createpost',compact('post','categories'));
    }
    public function store(Request $request) {
        $validate = Validator::make($request->all(),[
            'categories_id' => 'required|numeric',
            'post' => 'required'
        ]);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        } else {
            $user_id = Auth::user()->id;
            $categories_id = $request->input('categories_id');
            $post = $request->input('post');
            $arr = array('user_id'=>$user_id,'categories_id'=>$categories_id,'post'=>$post);
            Post::create($arr);
            return redirect()->route('posts')->with('createpostsuccess', 'Post is added successfully');
        }
    }
    public function edit($id) {
        $categories = Category::orderBy('category_name')->get();
        $post = Post::where('id',$id)->first();
        return view('editpost',compact('post','categories','id'));
    }
    public function update(Request $request) {
        $validate = Validator::make($request->all(),[
            'categories_id' => 'required|numeric',
            'post' => 'required',
            'id' => 'required|numeric'
        ]);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        } else {
            $categories_id = $request->input('categories_id');
            $post = $request->input('post');
            $id = $request->input('id');
            $arr = array('categories_id'=>$categories_id,'post'=>$post);
            Post::where('id',$id)->update($arr);
            return redirect()->route('posts')->with('updatepostsuccess', 'Post is updated successfully');
        }
    }
    public function destroy(Request $request) {
        $id = $request->input('id');
        try{
            $data = Post::findOrFail($id);
            Post::where('id',$data->id)->delete();
            return redirect()->back()->with('delete_success','Post deleted successfully');
        } catch(\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with('delet_error',$error);
        }
    }
}

