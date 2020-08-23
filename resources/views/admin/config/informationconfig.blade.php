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
                <li class="breadcrumb-item active" aria-current="page">基本信息配置</li>
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
                        <input type="hidden" name="name" value="informationconfig">
                        <input type="hidden" name="title" value="基本信息配置">
                        <div class="form-group">
                            <label for="company">公司名称</label>
                            <input type="text" value="{{isset($config['company'])?$config['company']:''}}" name="company" class="form-control" id="company" placeholder="请输入公司名称">
                        </div>
                        <div class="form-group">
                            <label for="address">公司地址</label>
                            <input type="text" value="{{isset($config['address'])?$config['address']:''}}" name="address"  class="form-control" id="address" placeholder="请输入公司地址">
                        </div>
                        <div class="form-group">
                            <label for="phone">客服热线</label>
                            <input type="text" value="{{isset($config['phone'])?$config['phone']:''}}" name="phone"  class="form-control" id="phone" placeholder="请输入客服热线">
                        </div>
                        <div class="form-group">
                            <label for="copyright">备案号</label>
                            <input type="text" value="{{isset($config['copyright'])?$config['copyright']:''}}" name="copyright"  class="form-control" id="copyright" placeholder="请输入备案号">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection