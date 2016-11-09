<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/posts', function(){

    $medicineCategoryIds =  DB::table('modules')
        ->where('key_content', 'categories')
        ->where('key_type', 'is_medicine')
        ->pluck('key_value')
        ->all();

    $diseaseCategoryIds =  DB::table('modules')
        ->where('key_content', 'categories')
        ->where('key_type', 'is_disease')
        ->pluck('key_value')
        ->all();

    $posts = \App\Post::whereIn('category_id', array_merge($medicineCategoryIds, $diseaseCategoryIds))
        ->get();

    foreach ($posts as $post) {
        $post->type = in_array($post->category_id, $medicineCategoryIds) ? 'medicine' : 'disease';
    }

    return $posts;
});
