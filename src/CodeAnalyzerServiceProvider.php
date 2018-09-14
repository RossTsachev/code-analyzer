<?php

namespace RTsachev\CodeAnalyzer;

use Illuminate\Support\ServiceProvider;
use RTsachev\CodeAnalyzer\CodeAnalyzer;

class CodeAnalyzerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/code_analyzer.php' => config_path('code_analyzer.php'),
        ]);
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CodeAnalyzer::class,
            ]);
        }
    }
}
