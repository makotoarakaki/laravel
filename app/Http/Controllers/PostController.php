<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //dd($request);
        $categorie = Category::query()->get();
        $posts = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category')
            ->select('posts.*', 'categories.categoryName')->paginate(5);
 
        return view('posts.index', compact('posts', 'categorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Category::query()->get();
        return view('posts.create')->with(compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        //ファイル名を取得
        $filename = $request->file('image')->getClientOriginalName();
        // 配列のimageの値を書き換える
        $storedata =  array_replace($request->all(), array('image' => $filename));
        $post->fill($storedata)->save();        
        // ファイルの保存
        $request->file('image')->storeAs('public/'.$post->id.'/', $filename);
 
        return redirect(route('posts.show', $post->id))->with('message', '新しい記事を登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $post = Post::findOrFail($id);

        $posts = DB::table('posts')
        ->select('posts.*', 'categories.categoryName')
        ->join('categories', 'categories.id', '=', 'posts.category')
        ->where('posts.id', $id)
        ->get();
 //dd($posts);       

        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categorie = Category::query()->get();
        return view('posts.edit')->with(compact('post','categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        // 画像の制御処理
        $filename = '';
        if (is_null( $request->file('image') )) {
            $filename = $request->input('hiddenimage');
        } else {
            //ファイル名を取得
            $filename = $request->file('image')->getClientOriginalName();
            // ファイルの保存
            $request->file('image')->storeAs('public/'.$post->id.'/', $filename);
        }
        // 配列のimageの値を書き換える
        $storedata =  array_replace($request->all(), array('image' => $filename));
        $post->fill($storedata)->save();

        return redirect(route('posts.show', $post->id))->with('message', '新しい記事を登録しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function rules()
    {
        return [
            'photo' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
