<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('', function () {
    return '如花公众号多域名免授权登陆';
});

Route::get('rhgzhs/:type','Index/gzhLog');              //多域名免授权登陆
Route::get('rhgzhs_info/:type','Index/gzhInfo');        //多域名免授权更新用户信息
Route::group('weixin',function () {
    Route::get('gzh_code','Index/getCode');             //公众号获取code
    Route::get('gzh_upinfo','Index/gzhGrant');    //公众授权头像昵称

    //下面两个是公众号没有授权的域名走的接口
    Route::get('get_gzh_token','Index/getgzhToken');    //公众登录获取token
    Route::get('gzh_upinfos','Index/gzhUpinfo');    //更新用户头像昵称
});



