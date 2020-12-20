<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class SiteController
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class SiteController extends Controller
{
    /**
     * Index page
     *
     * @param Request $request
     *
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        return view('index');
    }
}
