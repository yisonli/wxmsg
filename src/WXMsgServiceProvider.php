<?php

namespace Yisonli\WXMsg;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class WXMsgServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(WXMsg $extension)
    {
        if (! WXMsg::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'wxmsg');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/yisonli/wxmsg')],
                'wxmsg'
            );
        }

        Admin::booting(function () {
            Form::extend('wxmsg', WXMsgFormField::class);
        });

        $this->app->booted(function () {
            WXMsg::routes(__DIR__.'/../routes/web.php');
        });
    }
}