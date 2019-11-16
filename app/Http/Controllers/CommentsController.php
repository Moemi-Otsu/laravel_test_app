<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function store(Request $request)
	{
		$params = $request->validate([
			'post_id' => 'required|exists:posts,id',
			// ここ追加した
			'user_id' => 'required|exists:users,id',
			'body' => 'required|max:2000',
		]);

		$post = Post::findOrFail($params['post_id']);
		$post->comments()->create($params);

		return redirect()->route('posts.show', ['post' => $post]);
	}
}
