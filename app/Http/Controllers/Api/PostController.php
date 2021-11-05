<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts(Request $request)
    {
        $data = $request->all();

        $allPosts = [];
        $filteredBySearch = [];
        $filteredByCategory = [];

        if ($data) {
            if ($request->has('searchPhrase')) {
                $this->validate($request, [
                    'searchPhrase' => 'filled'
                ]);

                $filteredBySearch = Post::where('title', 'LIKE', "%{$data['searchPhrase']}%")
                    ->orWhere('content', 'LIKE', "%{$data['searchPhrase']}%")
                    ->get()->toArray();
            }

            if ($request->has('categoryId')) {
                $this->validate($request, [
                    'categoryId' => 'filled'
                ]);

                $filteredByCategory = Post::where('category_id', $data['categoryId'])->get()->toArray();
            }
        } else {
            $allPosts = Post::all()->toArray();
        }

        $filteredPosts = array_merge($filteredBySearch, $filteredByCategory, $allPosts);

        return responseJson(1, 'success', $filteredPosts);
    }

    public function singlePost($postId)
    {
        $post = Post::find($postId);
        return responseJson(1, 'success', $post);
    }

    public function favouritePosts(Request $request)
    {
        $posts = $request->user()->posts()->get();
        return responseJson(1, 'success', $posts);
    }

    public function addToFavourites(Request $request, $postId)
    {
        $post = $request->user()->posts()->toggle($postId);
        return responseJson(1, 'success', $post);
    }
}
