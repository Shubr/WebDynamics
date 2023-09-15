<?php
namespace Shubham\Worldcup\Lib;
class Response {
    
    public static function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    public static function success($message = '', $data = [], $statusCode = 200) {
        $response = ['status' => 'success', 'message' => $message];

        if (!empty($data)) {
            $response['data'] = $data;
        }
        self::json($response, $statusCode);
    }

    public static function error($message = '', $data = [], $statusCode = 400) {
        $response = ['status' => 'error', 'message' => $message];

        if (!empty($data)) {
            $response['data'] = $data;
        }
        self::json($response, $statusCode);
    }
}
