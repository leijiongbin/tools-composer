# 操作
~~~ 
composer require leijiongbin/tools 
~~~

# 功能类

- 1.0.0版本：
    - class Error 错误信息管理
     ~~~ 
     use tools\Error; 
     function get_error_codes()
     function get_error_code()
     function get_error_messages($code)
     function get_error_message($code)
     function get_error_data($code)
     function add($code, $message, $data)
     function add_data($data, $code)
     function remove($code)
     ~~~ 
    - class JsonSend 返回json数据
     ~~~ 
     use tools\JsonSend; 
     static function returnMsg($code=200, $msg='', $data=[], $header=[])
     static function returnSuccess($data=[], $header=[])
     static function returnError($message='error', $data=[], $header=[])
     ~~~ 
    - class Validate 验证信息是否正确
     ~~~
     use tools\Validate; 
     function check()
     function required($ukey, $val, $msg='字段未填入')
     function same($ukey, $first, $second, $msg='两次输入不一致')
     ~~~
     
