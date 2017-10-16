<?php

namespace Home\Controller;

use Common\Common\Controller\BaseController;

class IndexController extends BaseController {
    public function __construct(){

    }

    public function index(){
        var_dump('sd');exit;
        //获得参数 signature nonce token timestamp echostr
        $nonce     = $_GET['nonce'];
        $token     = 'weixin';
        $timestamp = $_GET['timestamp'];
        $echostr   = $_GET['echostr'];
        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = [];
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密  ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        if( $str  == $signature && $echostr ){
            //第一次接入weixin api接口的时候
            echo  $echostr;
            exit;
        }else{
            $this->reponseMsg();
        }
    }

}