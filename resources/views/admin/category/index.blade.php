@extends('admin.default')
@section('title','产品管理')
@section("content")
    <div class="page-header">
        <h3 class="page-title">
            <a href="{{route('admin.category.create')}}" class="btn btn-success btn-xs">添加分类</a>
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">产品管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">分类列表</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if(session()->has("data"))
                        <div class="alert alert-{{session("data")['class']}}">
                            {{ session('data')['msg'] }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 60px;">ID</th>
                                <th style="width: 280px;">名称</th>
                                <th class="text-center" style="width: 60px;">排序</th>
                                <th class="text-center" style="width:180px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>{{($item->level==0)?"":"|"}}{{str_repeat("------",$item->level)}}{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->sort }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-success btn-xs" href="{{ route('admin.category.edit',['cate'=>$item->id]) }}" role="button">编辑</a>
                                        <a class="btn btn-danger btn-xs" href="{{route('admin.category.delete',['cate'=>$item->id])}}" role="button">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection