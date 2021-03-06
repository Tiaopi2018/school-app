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

Route::any('/wechat', 'Wx\IndexController@index');

Route::get('admin/comment/{id}', 'Admin\CommentController@comment');
Route::post('admin/comment/show', 'Admin\CommentController@editShow');

Route::get('minganci', function(){
    \App\Model\Articel::minganci('使用假、币 再加上我的自定义词汇');
});

Route::get('loginTest', function(){
//    \App\Model\Dom\Login::login();
//    dd($_SERVER);
    $Login = new \App\Model\Dom\Login('201637025002', 'liuxuemin123');
    $str = $Login->getPage('/xsd/kscj/cjcx_query');

    echo $str;
});

/*Route::get('chengji', function(){
    $chengji = new \App\Model\Dom\Chengji('201637025002', 'liuxuemin1234');
    $list = $chengji->getChengji();

    dd($list);
});*/
Route::any('api/test', function(){
    echo file_get_contents('php://input');
    echo '<pre>';
    echo '<hr>';

    foreach ($_SERVER as $name => $value)
    {
        if (substr($name, 0, 5) == 'HTTP_')
        {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    print_r($headers);
    dd($_POST);
});

Route::get('chengji', 'Wx\UserController@chengji');
Route::get('chengji_all', 'Wx\UserController@all');

Route::get('kecheng', 'Wx\UserController@kecheng');
Route::get('kaochang', 'Wx\UserController@kaochang');

Route::get('get/wx/user', function(){
    $wx_user = session('wx_user', []);
    return response()->json($wx_user);
});
Route::get('get/user', function(Request $request){
    $local_user = \App\Model\User::find(\App\Model\User::getId($request->input('user')));
    unset($local_user->account);
    unset($local_user->password);
    unset($local_user->open_id);
    $local_user->tiezi = \App\Model\Articel::where('user', $request->input('user'))->count();
    return response()->json($local_user);
});