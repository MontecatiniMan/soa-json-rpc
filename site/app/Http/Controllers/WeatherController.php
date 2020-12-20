<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\JsonRpcClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class WeatherController
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class WeatherController extends Controller
{
    protected JsonRpcClient $client;

    /**
     * WeatherController constructor.
     *
     * @param JsonRpcClient $client
     */
    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getByDate(Request $request): JsonResponse
    {
        $data = $this->client->send('getByDate', [
            'date_at' => $request->get('date_at'),
            'id'   => $request->get('id'),
        ]);

        return new JsonResponse($data);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getHistory(Request $request): JsonResponse
    {
        $data = $this->client->send('getHistory', [
            'lastDays' => $request->get('lastDays'),
            'id'       => $request->get('id'),
        ]);

        return new JsonResponse($data);
    }
}
