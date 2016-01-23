@extends('mainFramework')
@section('css')
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Helvetica, Microsoft Yahei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;
            background:#e9eef2 url(/images/backdrop.png) repeat-x;
        }
        .frame0 {
            min-width:491.75px;
            width: 75%;
            margin-left: auto;
            margin-right: auto;
            margin-top: -11px;
            border-style: none double none double;
            border-width: 2px;
            border-color: #2aabd2;
            padding:11px 0 0 0;
            border-radius:0px;
            -moz-border-radius:15px;
        }
        .frame1 {
            min-width:491.75px;
            width: 75%;
            margin-left: auto;
            margin-right: auto;
            border-width:2px;
            border-color: #2aabd2;
            border-style: none double double double;
            padding:10px 30px;
            background:#ffffff;
            border-radius:15px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            -moz-border-radius:11px; /* 老的 Firefox */
        }
        .frame2 {
            margin-left: 5px;
            margin-right: 0px;
        }
    </style>
@stop
@section('content')
        <nav class="navbar navbar-default navbar-fixed-top frame0">
            <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Kaguya的资源站</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-8">
                    <ul class="nav navbar-nav">
                        <li><a target="_blank" href="https://blog.yanlei.me">博客</a></li>
                        <li><a target="_blank" href="https://github.com/SuperHentai">Github</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    <div style="margin-top: 50px;">
        <div class="frame1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">资源列表</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <?php
                            if(!isset($file_list)){
                                echo "<p>暂无文件</p>";
                            }else{
                                $string = "";
                                foreach($file_list as $file){
                                    $temp = sprintf("<a href=\"%s\" class=\"list-group-item\"><strong>%s</strong>&nbsp;&nbsp;|&nbsp;&nbsp;<span class=\"label label-default frame2\">浏览次数:%d</span><span class=\"label label-default frame2\">下载次数:%d</span><span class=\"label label-default frame2\">上传者:%s</span><span class=\"label label-default frame2\">上传时间:%s</span></a>",
                                            'view?file_id='.$file->id,$file->filename,$file->view_times,$file->download_times,$file->uploader,$file->created_at
                                    );
                                    $string = $string."\n".$temp;
                                    unset($temp);
                                }
                                echo $string;
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop