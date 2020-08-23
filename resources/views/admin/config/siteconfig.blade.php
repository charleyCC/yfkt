@extends('admin.default')
@section('title','系统配置')
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            系统配置
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">系统配置</a></li>
                <li class="breadcrumb-item active" aria-current="page">网站配置</li>
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
                    @if(session()->has("data"))
                        <div class="alert alert-{{session("data")['class']}}">
                            {{ session('data')['msg'] }}
                        </div>
                    @endif

                    <form class="forms-sample" action="{{route('admin.config.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="siteconfig">
                        <input type="hidden" name="title" value="网站配置">
                        <div class="form-group">
                            <label for="sitetitle">网站名称</label>
                            <input type="text" value="{{isset($config['sitetitle'])?$config['sitetitle']:''}}" name="sitetitle" class="form-control" id="sitetitle" placeholder="请输入网站名称">
                        </div>
                        <div class="form-group">
                            <label for="domain">网站域名</label>
                            <input type="text" name="domain" value="{{isset($config['domain'])?$config['domain']:''}}" class="form-control" id="domain" placeholder="请输入网站域名">
                        </div>
                        <div class="form-group">
                            <label for="keyword">网站关键字</label>
                            <input type="text" name="keyword" value="{{isset($config['keyword'])?$config['keyword']:''}}" class="form-control" id="keyword" placeholder="请输入网站关键字">
                        </div>
                        <div class="form-group">
                            <label for="desc">网站描述</label>
                            <textarea class="form-control" name="desc" id="desc" rows="4" placeholder="请输入网站描述">{{isset($config['desc'])?$config['desc']:''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">网站状态</label>
                            <div class="row">
                                <div class="col-sm-4 col-md-2 col-lg-1">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            @if(isset($config['status']))
                                                <input type="radio" class="form-check-input" name="status" id="status" value="1" {{($config['status']==1)?'checked':''}}>
                                            @else
                                                <input type="radio" class="form-check-input" name="status" id="status" value="1" checked>
                                            @endif
                                            运行
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-2 col-lg-1">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            @if(isset($config['status']))
                                                <input type="radio" class="form-check-input" name="status" id="status" value="0" {{($config['status']==0)?'checked':''}}>
                                            @else
                                                <input type="radio" class="form-check-input" name="status" id="status" value="0">
                                            @endif
                                            停止
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="closeinfo">关站提示</label>
                            <textarea class="form-control" name="closeinfo" id="desc" rows="4" praceholder="请输入关站提示信息">{{isset($config['closeinfo'])?$config['closeinfo']:''}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection