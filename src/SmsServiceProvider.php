<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Larva\Sms;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use Overtrue\EasySms\EasySms;

/**
 * SMS服务提供者
 */
class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath($raw = __DIR__ . '/../config/sms.php') ?: $raw;

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $source => config_path('sms.php'),
            ], 'sms-config');
        }

        $this->mergeConfigFrom($source, 'sms');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EasySms::class, function ($app) {
            return new EasySms($app['config']['sms']);
        });
        Notification::extend('phone', function ()  {
            return new NotificationChannel();
        });
    }
}
