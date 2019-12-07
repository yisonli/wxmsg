<?php

namespace Yisonli\WXMsg\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class WXMsgController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Title')
            ->description('Description')
            ->body(view('wxmsg::index'));
    }
}