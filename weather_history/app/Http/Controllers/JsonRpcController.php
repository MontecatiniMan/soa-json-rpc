<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Response\JsonRpcResponse;
use App\Models\WeatherHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

/**
 * Class Controller
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class JsonRpcController extends Controller
{
    /**
     * @param array $params
     *
     * @return array
     */
    public function getByDate(array $params): array
    {
        $validator = Validator::make($params, [
            'date_at' => 'date',
            'id'      => 'integer',
        ]);

        if ($validator->fails()) {
            return JsonRpcResponse::error($validator->errors()->first());
        }

        return WeatherHistory::where($params)->first()->toArray();
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function getHistory(array $params): array
    {
        $today = Carbon::now();

        return WeatherHistory::whereDate('date_at', '>=', $today->subDays(30)->format('Y-m-d'))->get()->toArray();
    }
}
