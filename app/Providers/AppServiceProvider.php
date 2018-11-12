<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/* use Illuminate\Support\Facades\Schema;　を追加
 * これを追加しないで、boot()内で Schemaクラスを使うと、
 *  Class 'App\Providers\Schema' not found　エラーになる（App\ProvidersにSchemaクラスないよ　エラー）
*/
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 191*4 = 764byte　なので、サイズ未指定時の最大を191に変更する
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
