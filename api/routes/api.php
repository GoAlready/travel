<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',"indexController@login")->name("login");
Route::post('register',"indexController@register")->name("register");
Route::get('getArticle',"indexController@getArticle")->name("getArticle");
Route::get('getArticleId',"indexController@getArticleId")->name("getArticleId");
Route::get('getGuide',"indexController@getGuide")->name("getGuide");
Route::get('getGuideAll',"indexController@getGuideAll")->name("getGuideAll");
Route::middleware(['jwt'])->group(function(){
    Route::post('articleLike',"indexController@articleLike")->name("articleLike");
    Route::post('articleDisLike',"indexController@articleDisLike")->name("articleDisLike");
    Route::post('hasLike',"indexController@hasLike")->name("hasLike");
    Route::post('orders',"indexController@orders")->name("orders");
    Route::post('getOrders',"indexController@getOrders")->name("getOrders");
    Route::post('delOrder_wei',"indexController@delOrder_wei")->name("delOrder_wei");
    Route::post('upOrder',"indexController@upOrder")->name("upOrder");
    Route::post('getBegin',"indexController@getBegin")->name("getBegin");
    Route::post('getWei',"indexController@getWei")->name("getWei");
    Route::post('getEnd',"indexController@getEnd")->name("getEnd");
    Route::post('getNoComment',"indexController@getNoComment")->name("getNoComment");
    Route::post('comment',"indexController@comment")->name("comment");
    Route::post('delOrder',"indexController@delOrder")->name("delOrder");
});