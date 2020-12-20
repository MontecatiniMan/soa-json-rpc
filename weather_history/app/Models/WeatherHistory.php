<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * WeatherHistory model.
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class WeatherHistory extends Model
{
    use HasFactory;

    const TABLE_NAME = 'history';

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getTable(): string
    {
        return static::TABLE_NAME;
    }
}
