<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
	 * 投稿一覧画面表示
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::where('user_id', Auth::id())->get();

		//投稿有無で表示するビュー切替
		if ($posts->isEmpty()) {
			//投稿が0件の場合
			return view('posts.topNone');
		} else {
			//投稿が1件以上の場合
			return view('posts.top', ['posts' => $posts]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * 投稿新規作成画面表示
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * 投稿新規作成処理
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//入力チェック
		$validator = Validator::make($request->all(), [
			'image_path' => ['required'],
			'title' => ['required', 'string', 'max:50'],
			'body' => ['required', 'string', 'max:1000'],
		]);

		//投稿数制限チェック（30件までしか投稿させない）
		//現在の投稿数取得
		$postCount = Post::where('user_id', Auth::id())->count();
		if ($postCount >= 30) {
			//現在の投稿数が30件以上の場合、エラーメッセージを付与して編集画面に戻す
			$validator->errors()->add('post_limit_error', '30件までしか投稿出来ません。投稿するには現在投稿済みのものを削除してください。');
		}

		if ($validator->errors()->any()) {
			//エラーがあれば編集画面に戻す
			return redirect()->back()->withErrors($validator);
		}

		$id = Auth::id();
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

		//入力値を設定
		$posts['user_id'] = $id;
		$posts['image_path'] = 'storage/' . $dir . '/' . $file_name;
		$posts['title'] = $request->title;
		$posts['body'] = $request->body;
		//新規投稿なので排他制御のカラムに0をセット
		$posts['version'] = 0;

		//保存（追加）
		Post::create($posts);

		return redirect()->to('/posts');
	}

	/**
	 * Show the form for editing the specified resource.
	 * 投稿編集画面表示
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);

		return view('posts.edit',['post' => $post]);
	}

	/**
	 * Update the specified resource in storage.
	 * 投稿更新処理
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$id = $request->id;

		//レコードを検索
		$post = Post::findOrFail($id);

		//入力チェック
		$validator = Validator::make($request->all(), [
			'title' => ['required', 'string', 'max:50'],
			'body' => ['required', 'string', 'max:1000'],
		]);

		//楽観的排他制御（version）
		if (!($request->version == $post->version)) {
			//バージョン番号が一致しない場合、エラーメッセージを付与して編集画面に戻す
			$validator->errors()->add('exclusive_lock_error', '変更を保存できません。ページの再読込お願いします。');
		}

		if ($validator->errors()->any()) {
			//エラーがあれば編集画面に戻す
			return redirect()->back()->withErrors($validator);
		}

		//入力値を設定
		$post->title = $request->title;
		$post->body = $request->body;
		$post->version = $post->version + 1;

		//保存（更新）
		$post->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * 投稿削除処理
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
		$id = $request->id;

		//論理削除実行（deleted_atを更新）
		Post::findOrFail($id)->delete();
	}

	/**
	 * 
	 * 更新または削除の判定
	 *
	 * @return void
	 */
	public function updateOrDelete(Request $request)
	{
		if ($request->has('update')) {
			//更新処理
			$this->update($request);
		} else if ($request->has('delete')) {
			//削除処理
			$this->destroy($request);
		}

		return redirect()->to('posts');
	}

}
