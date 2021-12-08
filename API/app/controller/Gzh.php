<?php


namespace app\controller;

use EasyWeChat\Factory;

class Gzh
{
    /**
     * 调用EasyWeChat方法
     * app_id：公众号appid
     * secret: 公众号密钥
     */
    public function gzh($url=''){
        $config = [
            'app_id' => '', //公众号appid
            'secret' => '', //公众号密钥
            'response_type' => 'array',
            'oauth' => [
                'scopes'   => ['snsapi_base'],  //公众号授权的方式，snsapi_userinfo为授权登陆
                'callback' => $url,     //微信回调的地址
            ],
        ];
        $app = Factory::officialAccount($config);
        return $app;
    }
}