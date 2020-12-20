<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Controllers\JsonRpcController;
use App\Http\Response\JsonRpcResponse;
use Illuminate\Http\Request;

/**
 * Class JsonRpcServer
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class JsonRpcServer
{
    /**
     * @param Request           $request
     * @param JsonRpcController $controller
     *
     * @return array
     */
    public function handle(Request $request, JsonRpcController $controller): array
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                return JsonRpcResponse::error('Parse error');
            }

            $result = $controller->{$content['method']}(...[$content['params']]);

            return JsonRpcResponse::success($result, $content['id']);
        } catch (\Exception $e) {
            return JsonRpcResponse::error($e->getMessage());
        }
    }
}
