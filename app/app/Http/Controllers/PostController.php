<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 * 投稿一覧画面
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = DB::table('posts')->where('user_id', Auth::id())->get();

		return view('posts.top', ['posts' => $posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * 投稿新規作成画面
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//入力チェック
		$request->validate([
			'image_path' => ['required'],
			'title' => ['required', 'string'],
			'body' => ['required', 'string'],
		]);

		$id = Auth::id();
		$post = new Post();
		$file = $request->file('image_path');

		//画像の拡張子取得
		$file_extension = $file->getClientOriginalExtension();
		//画像の保存先ディレクトリ名設定（ディレクトリ名は「ID + ユーザーID + _」を使用）
		//例 : ID1 （ユーザーIDが1のユーザー）
		$dir = 'ID' . $id;
		//画像ファイル名設定（ユーザーID + _ + 日付 + . + 拡張子）
		//例 : 1_20221231125959.png （ユーザーIDが1のユーザーで2022年12月31日12時59分59秒でpng）
		$file_name = $id . '_' . now()->format('ymdhis') . '.' . $file_extension;

		//画像保存
		$file->storeAs($dir, $file_name, 'public');

		$post->user_id = $id;
		$post->image_path = 'storage/' . $dir . '/' . $file_name;
		$post->title = $request->title;
		$post->body = $request->body;
		//新規投稿なので排他制御のカラムに0をセット
		$post->version = 0;

		$post->save();

		return redirect()->to('/posts');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		Log::info('edit----------------------------------');
		$post = \App\Models\Post::findOrFail($id);

		return view('posts.edit',['post' => $post]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Post $post)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post)
	{
		//
	}

}
