@extends('admin.default');
@section("title","案例管理")
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            案例管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">案例管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">添加案例</li>
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
                    <form class="forms-sample" action="{{route('admin.cases.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">案例标题</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="请输入标题">
                        </div>

                        <div class="form-group">
                            <label for="remark">摘要</label>
                            <textarea class="form-control" name="remark" id="remark" rows="4" placeholder="请输入摘要"></textarea>
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
                            <label for="sort">排序</label>
                            <input type="text" name="sort" value="100" class="form-control" id="sort">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection