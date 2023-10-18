<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\Categoria as ModelsCategoria;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            $view->with('categorias_all', ModelsCategoria::all());
        });
    }
}
