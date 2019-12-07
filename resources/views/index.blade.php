<div id="{{$id}}">
    <div class="row">
        <div class="col-sm-2 "><h4 class="pull-right">{{ $label }}</h4></div>
        <div class="col-sm-8"></div>
    </div>
    <hr style="margin-top: 0px;">
    @if(!$diy)
    <div class="form-group  ">
        <label for="msgtype" class="col-sm-2 control-label">消息类型</label>
        <div class="col-sm-8">
            <select class="form-control msgtype" name="msgtype">
                <option value="text">文本</option>
                <option value="image">图片</option>
                <option value="news">图文</option>
                <option value="link">图文链接</option>
                <option value="miniprogrampage">小程序卡片</option>
            </select>
        </div>
    </div>
    @endif

    <div id="{{$id}}_container">

    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-8">
            <div class="btn btn-primary btn-sm wxmsg_confirm">确认消息内容</div>
        </div>
    </div>
    <div style="display: none;">
        <input type="hidden" id="{{$id}}_input" name="{{$name}}" value="{{$value}}" />
        <!-- text -->
        <div class="wxmsg_text">
            <div class="form-group">
                <label class="col-sm-2  control-label">消息内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" class="form-control" wxmsg_name="content" ></textarea>
                </div>
            </div>
        </div>

        <!-- image -->
        <div class="wxmsg_image">
            <div class="form-group">
                <label class="col-sm-2 control-label">图片的MediaID</label>
                <div class="col-sm-8">
                    @if($media_input_type=='text')
                        <input type="text" class="form-control" media_type="image" wxmsg_name="media_id" />
                    @elseif($media_input_type=='select')
                        <select class="form-control" media_type="image" wxmsg_name="media_id" ></select>
                    @endif
                </div>
            </div>
        </div>

        <!-- link -->
        <div class="wxmsg_link">
            <div class="form-group">
                <label class="col-sm-2 control-label">消息标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="title" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">消息内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" class="form-control" wxmsg_name="description" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">跳转的URL链接</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="url" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图片的URL链接</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="thumb_url" />
                </div>
            </div>
        </div>

        <!-- miniprogrampage -->
        <div class="wxmsg_miniprogrampage">
            <div class="form-group">
                <label class="col-sm-2 control-label">消息标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="title" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">小程序APPID</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="appid" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">小程序页面PATH</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="pagepath" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图片的MediaID</label>
                <div class="col-sm-8">
                    @if($media_input_type=='text')
                        <input type="text" class="form-control" media_type="image" wxmsg_name="thumb_media_id" />
                    @elseif($media_input_type=='select')
                        <select class="form-control" media_type="image" wxmsg_name="thumb_media_id" ></select>
                    @endif
                </div>
            </div>
        </div>

        <!-- news -->
        <div class="wxmsg_news">
            <div class="form-group">
                <label class="col-sm-2 control-label">消息标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="articles.0.title" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">消息内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" class="form-control" wxmsg_name="articles.0.description" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">跳转的URL链接</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="articles.0.url" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图片的URL链接</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" wxmsg_name="articles.0.picurl" />
                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        // 更换消息类型
        $("select[name='{{$relate}}']").on("change",function(){
            var value = this.value;
            var container_html = "";
            switch (value) {
                case "text":
                case "image":
                case "link":
                case "miniprogrampage":
                case "news":
                    container_html = $(".wxmsg_"+value).html();
                    break;
                case "voice":
                    // TODO: 暂不支持, 待补充
                    break;
                case "video":
                    // TODO: 暂不支持, 待补充
                    break;
                case "music":
                    // TODO: 暂不支持, 待补充
                    break;
                case "msgmenu":
                    // TODO: 暂不支持, 待补充
                    break;
                default:
                    break;
            }
            $("#{{$id}}_container").html(container_html);
            @if($media_input_type=='select')
                $("#{{$id}}_container").find("select[wxmsg_name='thumb_media_id']").select2(select_media_config);
                $("#{{$id}}_container").find("select[wxmsg_name='media_id']").select2(select_media_config);
            @endif
        });

        // 确认配置
        $(".wxmsg_confirm").on("click", function () {
            var msg_data = {};
            var name, value;
            $('#{{$id}}_container').find('.form-control').each(function (index, item) {
                var number_reg = /^\d+$/;
                name = $(item).attr("wxmsg_name");
                if ($(item).attr("data-type") == "int") {
                    value = parseInt($(item).val());
                } else {
                    value = $(item).val();
                }
                if (name.indexOf(".") >= 0) {
                    var arr = name.split('.');
                    switch (arr.length) {
                        case 1:
                            msg_data[arr[0]] = value;
                            break;
                        case 2:
                            if (!msg_data.hasOwnProperty(arr[0])) { //没有第一层，先创建
                                if (number_reg.test(arr[1]) == true) {
                                    msg_data[arr[0]] = [];
                                } else {
                                    msg_data[arr[0]] = {};
                                }
                            }
                            msg_data[arr[0]][arr[1]] = value;
                            break;
                        case 3:
                            if (!msg_data.hasOwnProperty(arr[0])) { //没有第一层，先创建
                                if (number_reg.test(arr[1]) == true) {
                                    msg_data[arr[0]] = [];
                                } else {
                                    msg_data[arr[0]] = {};
                                }
                            }
                            if (!msg_data[arr[0]].hasOwnProperty(arr[1])) { //没有第二层，先创建
                                if (number_reg.test(arr[2]) == true) {
                                    msg_data[arr[0]][arr[1]] = [];
                                } else {
                                    msg_data[arr[0]][arr[1]] = {};
                                }
                            }
                            msg_data[arr[0]][arr[1]][arr[2]] = value;
                            break;
                        default:
                            // 仅支持三级以内
                            break;
                    }
                } else {
                    msg_data[name] = value;
                }
            });
            $("#{{$id}}_input").val(JSON.stringify(msg_data));
            alert('确认消息内容：'+JSON.stringify(msg_data));
        });

        // 初始化参数...
        function wxmsgInit() {
            $('head').append('<meta name="referrer" content="never">');
            var initJson = {!! $value !!};

            $("select[name='{{$relate}}']").trigger("change");
            var msgtype = $("select[name='{{$relate}}']").val();
            switch (msgtype) {
                case "text":
                case "image":
                case "link":
                case "miniprogrampage":
                    $.each(initJson, function(k,v) {
                        @if($media_input_type=='select')
                            if(k.indexOf("media_id") >= 0) {
                                var html = '<option value="'+v+'" >'+v+'<\/option>';
                                $("#{{$id}}_container").find('[wxmsg_name="' + k + '"]').html(html);
                            }
                        @endif
                        $("#{{$id}}_container").find('[wxmsg_name="'+k+'"]').val(v);
                    });
                    break;
                case "news":
                    $.each(initJson['articles'][0], function(k,v) {
                        $("#{{$id}}_container").find('[wxmsg_name="articles.0.'+k+'"]').val(v);
                    });
                    break;
                case "voice":
                    // TODO: 暂不支持, 待补充
                    break;
                case "video":
                    // TODO: 暂不支持, 待补充
                    break;
                case "music":
                    // TODO: 暂不支持, 待补充
                    break;
                case "msgmenu":
                    // TODO: 暂不支持, 待补充
                    break;
                default:
                    break;
            }
        }

        var select_media_config = {
            ajax: {
                url: "{{ $media_request_url }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        t: this.attr('media_type'),
                        @if(!empty($relate_appid))
                        a: $("select[name='{{ $relate_appid }}']").val(),
                        @endif
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: $.map(data.data, function (d) {
                            d.id = d.id;
                            d.text = d.text;
                            return d;
                        }),
                        pagination: {
                            more: data.next_page_url
                        }
                    };
                },
                cache: true
            },
            "allowClear":true,"placeholder":"素材名称","minimumInputLength":1,
            escapeMarkup: function (markup) {
                return markup;
            }
        };

        wxmsgInit();
    });
</script>