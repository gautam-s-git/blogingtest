<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function list(){
        $posts=Post::with('author')->where('is_valid','yes')->get();
        return view('blogging.posts.list',compact('posts'));
    }

    public function create(){
        return view('blogging.posts.create');
    }

    public function store(Request $request){
        Validator::make($request->all(),[
           'title'=>'required|min:6|unique:posts,title',
           'content'=>'required|min:100'
        ])->validate();
        try {
            $input=$request->all();
            $input['user_id']=Auth::user()->id;
            $input['slug']=strtolower(str_ireplace(' ','-',$request->title));
            $post=Post::create($input);
            return redirect()->route('post.list')->with('success','Post added successfully');
        } catch (Exception $ex) {
           return redirect()->back()->with('error',$ex->getMessage());
        }
    }

      public function view($slug){
           if($slug){
            $post=Post::with('author','comments.post','comments.user')->where('slug',$slug)->first();
            return view('blogging.posts.view',compact('post'));
           }
      }

    public function edit($slug){
        $post=Post::where('slug',$slug)->where('is_valid','yes')->first();
        return view('blogging.posts.edit',compact('post'));
    }

    public function update(Request $request, $slug){
        try {
            $post=Post::where('slug',$slug)->first();
            $input=$request->all();
            $input['slug']=strtolower(str_ireplace(' ','-',$request->title));
            $post->update($input);
            return redirect()->route('post.list')->with('success','Post updated successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function delete($slug){
        try {
          Post::where('slug',$slug)->delete();
            return redirect()->route('post.list')->with('success','Post updated successfully');
        } catch (Exception $ex) {
          dd($ex->getMessage());
        }
       
    }

    public function addComment(Request $request, $slug){
        try {
            $post=Post::where('slug',$slug)->first();
            $parent_id=0;
            if(!$post){
                throw new Exception('Post does not exist');
            }
            if($request->comment_id){
                $parent_id=$request->comment_id;
            }
            $comment=new Comment();
            $comment->content=$request->content;
            $comment->post_id=$post->id;
            $comment->parent_id=$parent_id;
            $comment->user_id=Auth::user()->id;
            $comment->save();
            return redirect()->back();
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }
}
