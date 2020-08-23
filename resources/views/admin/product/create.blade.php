@extends('admin.default');
@section("title","新闻管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            <a href="{{route('admin.product.index')}}" class="btn btn-success btn-xs">返回产品列表</a>
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">产品管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">添加产品</li>
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
                    <form class="forms-sample" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pid">所属分类</label>
                            <select class="form-control" name="cid" id="pid">
                                @foreach($cates as $item)
                                    <option value="{{$item->id}}">{{($item->level==0)?"":"|"}}{{str_repeat("------",$item->level)}}{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">产品名称</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="请输入标题">
                        </div>

                        <div class="form-group">
                            <label for="keyword">关键字</label>
                            <input type="text" name="keyword" class="form-control" id="keyword" placeholder="请输入关键字">
                        </div>
                        <div class="form-group">
                            <label for="desc">描述</label>
                            <textarea class="form-control" name="desc" id="desc" rows="4" placeholder="请输入描述"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="remark">摘要</label>
                            <textarea class="form-control" name="remark" id="remark" rows="4" placeholder="请输入摘要"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alt">alt</label>
                            <textarea class="form-control" name="alt" id="alt" rows="4" placeholder="请输入alt内容"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="views">浏览次数</label>
                            <input type="text" name="views" value="0" class="form-control" id="views" placeholder="请输入浏览次数">
                        </div>
                        <div class="form-group">
                            <label>图片上传</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="图片上传">
                                <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check" style="width: 100px;">
                                <label class="form-check-label">
                                    <input type="checkbox" name="tuijian" value="1" class="form-check-input">
                                    推荐
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contents">新闻内容</label>
                            {{--<textarea class="form-control" name="contents" id="contents" rows="4" praceholder="请输入新闻内容"></textarea>--}}
                            <script id="contents" name="contents" type="text/plain"></script>
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