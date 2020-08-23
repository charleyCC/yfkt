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
                <li class="breadcrumb-item active" aria-current="page">百度配置</li>
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
                        <input type="hidden" name="name" value="baiduconfig">
                        <input type="hidden" name="title" value="百度推送配置">
                        <div class="form-group">
                            <label for="baidu_key">百度秘钥</label>
                            <input type="text" value="{{isset($config['baidu_key'])?$config['baidu_key']:''}}" name="baidu_key" class="form-control" id="baidu_key" placeholder="请输入百度秘钥">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection