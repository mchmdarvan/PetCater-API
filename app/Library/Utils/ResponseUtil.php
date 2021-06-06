<?php

namespace App\Library\Utils;

class ResponseUtil
{
    /**
     * Make success response
     *
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];
    }

    /**
     * Make error response
     *
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makeError($message, $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }
}
