<?php 

namespace tools;

/**
 * Class JsonSend
 * @method static returnMsg($code, $msg, $data, $header)
 * @method static returnSuccess($data, $header) 
 * @method static returnError($message, $data, $header)
 */

class JsonSend {
    
    /**
     * 返回json信息
     * @param string $code 响应状态码
     * @param string $message 响应信息
     * @param array $data 数据
     * @param array $header 头信息
     * @return json
     */
    public static function returnMsg($code=200, $msg='', $data=[], $header=[]){
        foreach ($header as $name => $val) {
            if (is_null($val)) {
                header($name);
            } else {
                header($name . ':' . $val);
            }
        }

        return json_encode(array(
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ),JSON_UNESCAPED_UNICODE);
    }

    /**
     * 返回成功json信息
     * @param array $data 数据
     * @param array $header 头信息
     * @return json
     */
    public static function returnSuccess($data=[], $header=[]){
        return self::returnMsg(200, 'success', $data, $header);
    }

    /**
     * 返回错误json信息
     * @param string $message 相应信息
     * @param array $data 数据
     * @param array $header 头信息
     * @return json
     */
    public static function returnError($message='error', $data=[], $header=[]){
        return self::returnMsg(400, $message, $data, $header);
    }
}
