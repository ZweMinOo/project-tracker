<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function create($data = [], $message = 'Created Successfully'){
        return response()->json(
            [
                'data' => $data,
                'message' => $message,
                'status' => 200
            ],
        );
    }

    public static function update($data = [], $message = 'Updated Successfully'){
        return response()->json(
            [
                'data' => $data,
                'message' => $message,
                'status' => 200
            ],
        );
    }

    public static function delete($message = 'Deleted Successfully'){
        return response()->json(
            [
                'message' => $message,
                'status' => 200
            ],
        );
    }

    public static function error($message = null, $code){
        return response()->json([
            'status' => $code,
            'message' => $message,
        ], $code);;
    }
}
