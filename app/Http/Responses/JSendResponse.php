<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class JSendResponse extends JsonResponse
{
    /**
     * Create a JSend success response.
     *
     * @param mixed  $data
     * @param int  $status
     * @param array  $headers
     * @param int  $options
     *
     * @return self
     */
    public static function success(mixed $data = null, int $status = 200, array $headers = [], int $options = 0): self
    {
        return new self(['status' => 'success', 'data' => $data], $status, $headers, $options);
    }

    /**
     * Create a JSend fail response.
     *
     * @param mixed  $data
     * @param int  $status
     * @param array  $headers
     * @param int  $options
     *
     * @return self
     */
    public static function fail(mixed $data = null, int $status = 400, array $headers = [], int $options = 0): self
    {
        return new self(['status' => 'fail', 'data' => $data], $status, $headers, $options);
    }

    /**
     * Create a JSend error response.
     *
     * @param string  $message
     * @param mixed  $data
     * @param int|null  $code
     * @param int  $status
     * @param array  $headers
     * @param int  $options
     *
     * @return self
     */
    public static function error(
        string $message,
        mixed $data = null,
        ?int $code = null,
        int $status = 500,
        array $headers = [],
        int $options = 0,
    ): self {
        $error = ['status' => 'error', 'message' => $message];
        if ($code !== null) {
            $error['code'] = $code;
        }
        if ($data !== null) {
            $error['data'] = $data;
        }

        return new self($error, $status, $headers, $options);
    }
}
