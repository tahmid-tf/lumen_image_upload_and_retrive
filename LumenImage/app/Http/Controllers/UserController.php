<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function setPhoto(Request $request){
         if ($request->hasFile('image')) {
             $fileExtension = $request->file('image')->getClientOriginalName();
              $file = pathinfo($fileExtension, PATHINFO_FILENAME);
              $extension = $request->file('image')->getClientOriginalExtension();
              $fileStore = $file . '_' . time() . '.' . $extension;
              $path = $request->file('image')->storeAs('images', $fileStore);

              Post::create([
                 'image' => $fileStore
             ]);

             return response()->json([
                 'data' => 'Successful',
                 'response' => Response::HTTP_OK
             ]);
         }
    }

    public function getPhoto(){

        $post = Post::find(1);

        // return url("/storage/app/photos/a.jpg");

        return response()->json([
            'data' => $post->image,
            'response' => Response::HTTP_OK
        ]);
    }
}
