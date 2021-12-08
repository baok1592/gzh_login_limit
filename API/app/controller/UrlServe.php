<?php


namespace app\controller;
use app\model\GzhHref as GzhHrefModel;

class UrlServe
{
    protected $url;
    /**
     *根据前端传过来的type值获取相对应的回调地址
     * 前端传过来的值是rhedu获取的是http://card.ruhuashop.com地址
     */
    public function __construct($type)
    {
        $this->url=GzhHrefModel::where('type',$type)->value('url');
    }
    public function getValue(){
        return $this->url;
    }
}