<?php
/**
 * User: Sean
 * Date: 2020/10/29
 * Time: 13:49
 */

namespace App\Bases;


use Illuminate\Http\JsonResponse;

trait BaseResponse
{
    /**
     * @param array $data
     * @param string $message
     * @param int $code
     * @param array $headers
     * @return JsonResponse
     */
    protected function success($data = [], $message = '', int $code = 200, array $headers = [])
    {
        $result = [
            'meta'      => [
                'code'    => $code,
                'message' => $message,
            ],
            'data'      => $data,
            'timestamp' => time(),
        ];

        return response()->json($result, 200)->withHeaders($headers);
    }

    /**
     * @param string $message
     * @param int $code
     * @param array $headers
     * @return JsonResponse
     */
    protected function fail($message = '', int $code = 500, array $headers = [])
    {
        $result = [
            'meta'      => [
                'code'    => $code,
                'message' => $message,
            ],
            'data'      => [],
            'timestamp' => time(),
        ];
        return response()->json($result, $code)->withHeaders($headers);
    }
}
