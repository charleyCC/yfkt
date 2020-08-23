@extends('admin.default')
@section('title','新闻管理')
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            新闻管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">新闻管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">编辑新闻</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <form class="forms-sample" action="{{route('admin.news.update',['news'=>$news->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">新闻标题</label>
                            <input type="text" name="title" value="{{$news->title}}" class="form-control" id="title" placeholder="请输入标题">
                        </div>

                        <div class="form-group">
                            <label for="keyword">关键字</label>
                            <input type="text" name="keyword" value="{{$news->keyword}}" class="form-control" id="keyword" placeholder="请输入关键字">
                        </div>
                        <div class="form-group">
                            <label for="desc">描述</label>
                            <textarea class="form-control" name="desc" id="desc" rows="4" placeholder="请输入描述">{{$news->desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="remark">摘要</label>
                            <textarea class="form-control" name="remark" id="remark" rows="4" placeholder="请输入摘要">{{$news->remark}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="views">浏览次数</label>
                            <input type="text" name="views" value="{{$news->views}}" class="form-control" id="views" placeholder="请输入浏览次数">
                        </div>
                        <div class="form-group">
                            <label>图片上传</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" name="pic" value="{{$news->pic}}" class="form-control file-upload-info" disabled="" placeholder="图片上传">
                                <span class="input-group-append"><button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button></span>
                            </div>
                            <div class="input-group col-xs-12">
                                <img src="/storage/uploads/{{$news->pic}}" alt="" width="100px"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contents">新闻内容</label>
                            {{--<textarea class="form-control" name="contents" id="contents" rows="4" praceholder="请输入新闻内容"></textarea>--}}
                            <script id="contents" name="contents" type="text/plain">{!! $news->content !!}</script>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" id="ne1" charset="utf-8" src="{{ asset(__ADMIN__) }}/neditor/neditor.config.js?v={{time()}}"></script>
    <script type="text/javascript" id="ne2"  charset="utf-8" src="{{ asset(__ADMIN__) }}/neditor/neditor.all.min.js?v={{time()}}"> </script>
    <script type="text/javascript" id="ne3" charset="utf-8" src="{{ asset(__ADMIN__) }}/neditor/neditor.service.js?v={{time()}}"></script>
    <script>
        setTimeout(function(){
            var ue = UE.getEditor('contents', {
                autoHeight: false,
                initialFrameHeight:300
            });
        },1000)
    </script>
@endsection