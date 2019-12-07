<?php

namespace Yisonli\WXMsg;

use Encore\Admin\Form\Field;

class WXMsgFormField extends Field
{
    protected $view = 'wxmsg::index';
    protected $diy = false;
    protected $relate = 'msgtype';
    protected $relate_appid = '';
    protected $media_input_type = 'text';
    protected $media_request_url = '';

    protected static $css = [
//        'vendor/laravel-admin-ext/wxmsg/css/style.min.css'
    ];
    protected static $js = [
//        'vendor/laravel-admin-ext/wxmsg/js/index.min.js'
    ];

    public function render()
    {
        $this->addVariables([
            'diy' => $this->diy,
            'relate' => $this->relate,
            'relate_appid' => $this->relate_appid,
            'media_input_type' => $this->media_input_type,
            'media_request_url' => $this->media_request_url,
        ]);

        if(empty($this->value)) {
            $this->value = [
                "button" => [],
            ];
        }
        if (is_array($this->value)) {
            $this->value = json_encode($this->value, JSON_UNESCAPED_UNICODE);
        }

        return parent::render();
    }


    public function relateTo($key, $key_appid='')
    {
        $this->diy = true;
        $this->relate = $key;
        $this->relate_appid = $key_appid;

        return $this;
    }

    public function selectMedia($request_url)
    {
        $this->media_input_type = 'select';
        $this->media_request_url = $request_url;

        return $this;
    }
}