<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
              $validator = Validator::make($request->all(), [
               'comment_body' => 'required|string'
              ]);


              if($validator->fails())
              {
                return redirect()->back()->with('message','Comment area is mandatory');
              }
              $post = Post::where('slug', $request->post_slug)->where('status','0')->first();
              if( $post)
              {
                Comment::create([
                    'post_id' =>$post->id,
                    'user_id' =>Auth::user()->id,
                    'comment_body' =>$request->comment_body
                ]);
                return redirect()->back()->with('message','Commented Successfully!'); 
              }
              else
              {
                return redirect()->back()->with('message','No such post found');

              }
        }
        else
        {
            return redirect('login')->with('message','Login first to comment');
        }

    }

    public function destroy(Request $request)
    {
        if(Auth::check())
        {
             $comment = Comment::where('id',$request->comment_id)
             ->where('user_id', Auth::user()->id)
             ->first();
               
             if($comment)
             {
                $comment->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Comment deleted successfully!'
                ]);
             }
             else
             {
                return response()->json([
                    'status' => 500,
                    'message' => 'Comment Id not found!'
                ]);
             }

        }
        else
        {
            return response()->json([
                'status' => 401,
                'message' => 'Login to delete this comment'
            ]);
        }
    }

    public function edit($cm_id)
    {
        $cmn = Comment::find($cm_id);
        return view('frontend.edit-cm', compact('cmn'));
    }

    
    public function update(Request $request, $cm_id)
    {
        $cmn = Comment::find($cm_id);
        if($cmn )
        {
            $cmn ->comment_body = $request->comment_body;
            $cmn ->update();
            return redirect('frontend')->with('message', 'Updated Successfully');

        }
    
             return redirect('frontend')->with('message', 'No user Found');

}

}
