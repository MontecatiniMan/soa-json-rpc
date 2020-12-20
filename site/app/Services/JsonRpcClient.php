<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

/**
 * Class JsonRpcClient
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class JsonRpcClient
{
    const JSON_RPC_VERSION = '2.0';
    const METHOD_URI = '/api/data';

    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'base_uri' => config('services.data.base_uri'),
        ]);
    }

    /**
     * @param string $method
     * @param array  $params
     *
     * @return array
     * @throws GuzzleException
     */
    public function send(string $method, array $params): array
    {
        $response = $this->client
            ->post(static::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => static::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();

        return json_decode($response, true);
    }
}
