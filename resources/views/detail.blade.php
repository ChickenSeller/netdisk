@extends('mainFramework')
@section('css')
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Helvetica, Microsoft Yahei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;
            background:#e9eef2 url(/images/backdrop.png) repeat-x;
        }
        .frame0 {
            margin-top: -11px;
            border-style: none double none double;
            border-width: 2px;
            border-color: #2aabd2;
            padding:11px 0 0 0;
            border-radius:0px;
            -moz-border-radius:15px;
        }
        .frame1 {
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
    <nav class="navbar navbar-default navbar-fixed-top frame0" style="width: 70%;margin-left: auto;margin-right: auto;min-height: 60%">
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
        <div class="frame1" style=" width: 70%;margin-left: auto;margin-right: auto;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">资源详情</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <?php
                        if((!isset($file)) || $file==null){
                            echo "该资源不存在";
                        }else{
                            $string = sprintf("
                            <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <h2>%s</h2>
                                <hr />
                            </div>
                            <div class=\"col-lg-12\">
                                <div class=\"col-lg-3\">
                                    <strong>浏览次数</strong>:%d
                                </div>
                                <div class=\"col-lg-3\">
                                    <strong>上传者</strong>:%s
                                </div>
                            </div>
                            <div class=\"col-lg-12\">
                                <div class=\"col-lg-3\">
                                    <strong>下载次数</strong>:%d
                                </div>
                                <div class=\"col-lg-3\">
                                    <strong>上传时间</strong>:%s
                                </div>
                            </div>
                            <div class=\"col-lg-12\">
                                <hr />
                            </div>
                            <div class=\"col-lg-12\">
                                <div class=\"col-lg-3\">
                                    <a href=\"%s\"  class=\"btn btn-primary btn-lg btn-block\">下载地址</a>
                                </div>
                            </div>
                            <div class=\"col-lg-12\">
                                <hr />
                            </div>
                            <div class=\"col-lg-12\">
                                <p>
                                    %s
                                </p>
                            </div>
                        </div>",
                                  $file->filename,$file->view_times,$file->uploader,$file->download_times,$file->created_at,'download?file_id='.$file->id, $file->description);
                            echo $string;

                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop