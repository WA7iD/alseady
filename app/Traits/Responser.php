<?php

namespace App\Traits;

trait Responser
{


    public function returnError($errNum, $msg)
    {
        if (empty($errNum)) {
            $errNum = '403';
        }
        return response()->json([
            'status' => false,
            'msg' => $msg
        ], $errNum);
    }
    public function returnSuccessMassage($msg = "", $status = true, $code = "200")
    {
        return response()->json([
            'status' => $status,
            'msg' => $msg
        ], $code);
    }

    public function returnData($key = '', $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            $key => $value
        ], 200);
    }

    public function returnValidationError($code = "401", $validator)
    {
        return $this->returnError($code, $validator->errors()->first());
    }
}
