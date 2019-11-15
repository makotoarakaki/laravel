<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HelloContoroller extends Controller
{
    //
    public function index() {
        return 'こんにちは　世界！';
    }

    public function view() {
        $data = [
            'msg' => 'こんにちは　世界！!'
        ];

        return view('hello.view', $data);
    }

    public function list() {
      $data = [
        'record' => Book::all()
      ];

      return view('hello.list', $data);
    }
}
