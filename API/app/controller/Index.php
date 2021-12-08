<?php
namespace app\controller;

use app\BaseController;
use app\controller\UrlServe as UrlServe;
use app\controller\Gzh as app;
use app\model\User as UserModel;
use think\facade\Log;
class Index extends BaseController
{
    /**
     * 用户端携带参数进行公众号登陆
     */
    public function getCode($type=""){
        $href=null;
        $href='rhgzhs/'.$type;     //这个是公众号授权的域名，在这个授权域名的回调地址
       
        //调用EasyWechat的公众号登陆，snsapi_base为静默登陆，授权登陆为snsapi_userinfo
        $response = (new app())->gzh($href)->oauth->scopes(['snsapi_base'])->redirect();
        return $response->send();
    }

    /**公众号登陆回调地址
     * @param $type
     * @return string
     * 根据$type的值回调相应的的地址，返回一个相对应的地址并携带微信回调的code和state数据
     */
    public function gzhLog($type){
        $data=input('get.');
        $url=(new UrlServe($type))->getValue();
        $api_url=$url."/h5/#/?code=".$data['code']."&state=".$data['state'];
        //返回一个js代码让页面跳转到用户端的首页
        return "<script>
        window.location.href='$api_url';
        </script>" ;
    }


    /**
     *  用户端携带参数进行公众号授权信息
     */
    public function gzhGrant($type=""){
        $href=null;
         $href='rhgzhs_info/'.$type;    //这个是公众号授权的域名，在这个授权域名的回调地址
        //调用EasyWechat的公众号登陆，snsapi_base为静默登陆，授权登陆为snsapi_userinfo
        $response = (new app())->gzh($href)->oauth->scopes(['snsapi_userinfo'])->redirect();
        return $response->send();
    }
    /**公众号授权信息回调
     * @param $type
     * @return string
     * 根据$type的值回调相应的的地址，返回一个相对应的域名和API地址并携带微信回调的code和state数据
     */
    public function gzhInfo($type){
        $data=input('get.');
        $url=(new UrlServe($type))->getValue();
        $api_url=$url."/weixin/gzh_upinfos?code=".$data['code']."&state=".$data['state'];
        //返回一个js代码让页面跳转到点击授权的页面
        return "<script>
        window.location.href='$api_url';
        </script>" ;
    }

    /**使用EasyWechat获取用户的信息
     * 这里的公众号id和密钥，必须与公众号授权的域名使用的是同一个
     * 虽然域名没有被公众号授权，但是使用相同的公众号id和密钥，依然可以获取用户信息
     * 静默登陆只能获取openid
     */
    public function getgzhToken(){
        //调用EasyWechat获取用户授权的信息
        $user=(new app())->gzh()->oauth->user();
        $openid=$user->getId();
        $dt=UserModel::where('openid_gzh',$openid)->find();
        if(!$dt){   //查看是否已存在该用户
            $data=[
                'openid_gzh'=>$openid,
            ];
            $dt=UserModel::create($data);   //不存在则创建用户
        }
        $res['token']="请求数据成功是返回的token令牌";
        return  json($res);
    }

    /**使用EasyWechat更新用户的信息，并回调到点击授权的页面
     *这里的公众号id和密钥，必须与公众号授权的域名使用的是同一个
     */
    public function gzhUpinfo(){
        $user=(new app())->gzh()->oauth->user();    //使用EasyWechat获取授权了的用户信息
        Log::error($user->getNickname());
        //更新用户信息
        $res =UserModel::where('openid_gzh',$user->getId())->update([
            'name'=> $user->getNickname(),
            'headpic'=> $user->getAvatar()
        ]);
        $api_url='http://card.ruhuashop.com/h5/#/pages/user/user';  //这里写的是用户端点击授权页面的地址路径
        //返回一个js代码让页面跳转到点击授权的页面
        return "<script>
        window.location.href='$api_url';
        </script>" ;
    }



}
