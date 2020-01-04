<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
    proteted $fillableを入れないと以下のエラーが出た
    Add [productName] to fillable property to allow mass assignment on [App\Product].
    [製品名]を入力可能なプロパティに追加して、[アプリ\製品]に一括割り当てできるようにします。
    */
    protected $fillable = [
        'productName',
    ];

}

