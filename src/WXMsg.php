<?php

namespace Yisonli\WXMsg;

use Encore\Admin\Extension;

class WXMsg extends Extension
{
    public $name = 'wxmsg';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Wxmsg',
        'path'  => 'wxmsg',
        'icon'  => 'fa-gears',
    ];
}