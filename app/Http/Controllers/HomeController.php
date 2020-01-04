<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * ファイルアップロード処理
     */
    public function upload(Request $request)
    {

        \Debugbar::info('アップロード ！！！！');
 /*       $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
                // 最小縦横120px 最大縦横400px
                'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);*/

//        dd($request->all());
        $filename = $request->file('file')->getClientOriginalName();
        \Debugbar::info('ファイル名', $filename);
 
        $path = $request->file('file')->storeAs('public', $filename);
        \Debugbar::info('ファイルパス', $path);

//        return view('home');
 
//        return back()->with('filename' => $filename);

/*        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/avatar');

            // $user = User::find(auth()->id());
            // $user->avatar_filename = basename($filename);
            // $user->save();

            return redirect('/home')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }*/
    }
}
