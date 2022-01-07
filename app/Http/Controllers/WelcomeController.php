<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Model\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class WelcomeController extends Controller
{

    public function index()
    {
        return Inertia::render('Welcome/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION
        ]);
    }
}