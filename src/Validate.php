<?php

namespace tools;

/**
 * Class Validate
 * @method check()
 * @method nonce($form_nonce, $check_nonce, $msg) 
 * @method required($ukey, $val, $msg)
 * @method email_exists($ukey, $val, $msg)
 * @method same($ukey, $first, $second, $msg)
 * @method user_exists($ukey, $val, $msg)
 * @example $errors = (new Validate())
 *           ->required('article_urls', $article_urls, '未填入文章列表')
 *           ->required('article_setsourcetxt', $article_setsourcetxt, '未填入文章来源')
 *           ->check();
 */

use tools\Error;

class Validate {

    protected $errors;

    public function __construct(){
        $this->errors = new Error();
    }

    /**
     * 检查
     * @return array  
     * has_errors:true 验证有错误信息| false 验证无错误信息)
     * errors:string 响应信息
     */
    public function check(){
        $has_errors = false;
        if($this->errors->get_error_code()){
            $has_errors = true;
        }
        return array(
            'has_errors' => $has_errors,
            'errors' => $this->errors->get_error_message()
        );
    }

    /**
     * 必须填入检查
     * @param string $ukey 字段key(唯一)
     * @param string $val 验证字段值
     * @param string $msg 响应信息
     * @return Validate 
     */
    public function required($ukey, $val, $msg='字段未填入'){
        if(!$val){
            $this->errors->add($ukey.'_required', $msg);
        }
        return $this;
    }


    /**
     * 两次值是否一致检查
     * @param string $ukey 字段key(唯一)
     * @param string $first 第一次字段值
     * @param string $second 第二次字段值
     * @param string $msg 响应信息
     * @return Validate 
     */
    public function same($ukey, $first, $second, $msg='两次输入不一致'){
        if($first!=$second){
            $this->errors->add( $ukey.'_no_same', $msg);
        }
        return $this;
    }

}