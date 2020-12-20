<?php

declare(strict_types=1);

namespace App\Http\Response;

/**
 * Class JsonRpcResponse
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class JsonRpcResponse
{
    const JSON_RPC_VERSION = '2.0';

    /**
     * @param array    $result
     * @param int|null $id
     *
     * @return array
     */
    public static function success(array $result, int $id = null): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'result'  => $result,
            'id'      => $id,
        ];
    }

    /**
     * @param $error
     *
     * @return array
     */
    public static function error(string $error): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'error'  => $error,
            'id'      => null,
        ];
    }
}
