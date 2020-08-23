@extends('admin.default');
@section("title","后台主页")
@section("content")
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
              </span>
                后台主页
            </h3>
            {{--<nav aria-label="breadcrumb">--}}
            {{--<ul class="breadcrumb">--}}
            {{--<li class="breadcrumb-item active" aria-current="page">--}}
            {{--<span></span>Overview--}}
            {{--<i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</nav>--}}
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset(__ADMIN__)}}/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">文章数量
                            <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        {{--<h2 class="mb-5">{{$newscount}}</h2>--}}
                        <h2 class="mb-5">xxx3</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset(__ADMIN__)}}/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">产品数量
                            <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        {{--<h2 class="mb-5">{{$productcount}}</h2>--}}
                        <h2 class="mb-5">xxx4</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset(__ADMIN__)}}/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">案例数量
                            <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        {{--<h2 class="mb-5">{{$casescount}}</h2>--}}
                        <h2 class="mb-5">xxx5</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">蜘蛛来访</h4>
                        <hr>
                        <?php
                        $color = ['badge-primary','badge-danger','badge-info','badge-success'];
                        ?>
                        {{--@foreach($spider as $item)--}}
                            {{--<p>{{$item->spidername}}蜘蛛：<span class="float-right badge badge-pill {{$color[rand(0,3)]}}">来访时间：{{$item->updated_at}}</span></p>--}}
                        {{--@endforeach--}}
                        @foreach($color as $item)
                        <p>{{$item}}蜘蛛：<span class="float-right badge badge-pill {{$color[rand(0,3)]}}">来访时间：2020-08-21 10:40:22</span></p>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">易风课堂</h4>
                        <hr>
                        <p>官方网站：http://www.yfketang.cn</p>
                        <p>QQ客服：576617109</p>
                        <p>QQ①群：660510850</p>
                        <p>QQ②群：494826865</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection