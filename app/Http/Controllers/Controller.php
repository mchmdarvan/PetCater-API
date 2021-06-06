<?php

namespace App\Http\Controllers;

use App\Library\Utils\ResponseUtil;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Send success response
     *
     * @param string $message
     * @param mixed $data
     * @param integer $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data, string $message = '', $code = 200)
    {
        $res = ResponseUtil::makeResponse($message, $data);

        return response()->json($res, $code);
    }

    /**
     * Send paginated response
     *
     * @param string $message
     * @param mixed $data
     * @param integer $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate($data, string $message = '', $code = 200)
    {
        $data = $data->toArray();
        $data['success'] = true;
        $data['message'] = $message;

        return response()->json($data, 200);
    }

    /**
     * Send error response
     *
     * @param string $message
     * @param integer $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message, $code = 400)
    {
        $res = ResponseUtil::makeError($message);

        return response()->json($res, $code);
    }
}
