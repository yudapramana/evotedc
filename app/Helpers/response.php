<?php
if (! function_exists('sendApiResponse')) {
    /**
     * @param bool $status
     * @param string $message
     * @param null $data
     * @param int $code
     * @param null $error
     * @return \Illuminate\Http\JsonResponse
     */
    function sendApiResponse($status = true, $message = '', $data = null, $code = 200)
    {
        $data = [
            'error' => !$status,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($data, $code);
    }
}
