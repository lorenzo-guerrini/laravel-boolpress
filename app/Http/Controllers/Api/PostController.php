<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null)
    {
        // return response()->json([
        //     "name" => "test"
        // ]);

        // $posts_filtered = Post::where("category_id", 2)->get();
        // $posts_filtered = Post::where("category_id", "!=", null)->get();
        // return response()->json($posts_filtered);

        if ($category) {
            $posts = Post::where("category_id")->get();
        } else {
            $posts = Post::all();
        }

        return response()->json($posts);
    }

    /**
     * Display a filtered listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($id, $category)
    {
        $posts = Post::where("id", $id)->where("category_id", $category)->get();

        return response()->json($posts);
    }
}
