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
                <li class="breadcrumb-item active" aria-current="page">新闻列表</li>
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
                                <th class="text-center">ID</th>
                                <th>标题</th>
                                <th class="text-center">浏览次数</th>
                                <th class="text-center">发布时间</th>
                                <th class="text-center" style="width:280px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td class="text-center">{{ $item->views }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        {{--<a class="btn btn-success btn-xs" href="{{ route('admin.news.baidusend',['news'=>$item->id]) }}" role="button">百度推送</a>--}}
                                        <a class="btn btn-success btn-xs" href="#" role="button">百度推送</a>
                                        <a class="btn btn-success btn-xs" href="{{ route('admin.news.edit',['news'=>$item->id]) }}" role="button">编辑</a>
                                        <a class="btn btn-danger btn-xs" href="{{route('admin.news.delete',['news'=>$item->id])}}" role="button">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="padding:10px 0;">
                            {{ $list->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection