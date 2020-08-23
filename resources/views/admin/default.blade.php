<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>易风课堂后台管理-@yield("title")</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset(__ADMIN__) }}/images/favicon.png" />
    <style>
        .loading{
            width:160px;
            height:56px;
            position: absolute;
            top:50%;
            left:50%;
            line-height:56px;
            color:#fff;
            padding-left:60px;
            font-size:15px;
            /*background: rgba(0, 0, 0, 0.5) url(images/loading.gif) no-repeat 10px 50%;*/
            background: rgba(0, 0, 0, 0.5);
            opacity: 0.7;
            z-index:9999;
            -moz-border-radius:20px;
            -webkit-border-radius:20px;
            border-radius:20px;
            filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="/admin"><img src="{{ asset(__ADMIN__) }}/images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="/admin"><img src="{{ asset(__ADMIN__) }}/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="请输入关键字">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ asset(__ADMIN__) }}/images/faces/face1.jpg" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            {{--<p class="mb-1 text-black">{{auth()->user()->username}}</p>--}}
                            <p class="mb-1 text-black">xxx1</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-cached mr-2 text-success"></i>
                            修改密码
                        </a>
                        <div class="dropdown-divider"></div>
                        {{--<a class="dropdown-item" href="{{route('admin.login.logout')}}">--}}
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>
                            退出
                        </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item nav-logout d-none d-lg-block">
                    {{--<a class="nav-link" href="{{route('admin.login.logout')}}">--}}
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-format-line-spacing"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                @section("sidebar")
                    @include("admin.sidebar")
                @show
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div id="loading" style="display:none;">
                <div id="loading" class="loading">Loading</div>
            </div>
            <div class="content-wrapper" id="pjax-container">
                @yield("content")
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="http://www.yfketang.com" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="http://www.yfketang.com" target="_blank">易风课堂</a><i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset(__ADMIN__) }}/vendors/js/vendor.bundle.base.js"></script>
<script src="{{ asset(__ADMIN__) }}/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset(__ADMIN__) }}/js/off-canvas.js"></script>
<script src="{{ asset(__ADMIN__) }}/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset(__ADMIN__) }}/js/dashboard.js"></script>
<script src="{{ asset(__ADMIN__) }}/js/jquery.pjax.js"></script>
<!-- End custom js for this page-->
<script>
    $(document).pjax('a', '#pjax-container',{timeout:1500});
    changefile();
    checkedall();
    {{--setbannersort();--}}
    $(document).on('pjax:send',  function()  {
        $('#loading').show();
    });

    $(document).on('pjax:complete',  function()  {
        $('#loading').hide();
        changefile();
        checkedall();
        // setbannersort();
    });

    function  checkedall(){
        $("#ischecked").on('click',function(){
            if($(this).is(":checked")){
                $(".mychecked").prop("checked","checked");
                $(".mychecked").parent().addClass("checked");
            }else{
                $(".mychecked").prop("checked",false);
                $(".mychecked").parent().removeClass("checked");
            }
        });
    }
    function changefile(){
        $('.file-upload-browse').on('click', function() {
            var file = $(this).parent().parent().parent().find('.file-upload-default');
            file.trigger('click');
        });
        $('.file-upload-default').on('change', function() {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    }

    {{--function setbannersort() {--}}
        {{--$(".setsort").on('change',function(){--}}
            {{--var sort = $(this).val();--}}
            {{--var id =$(this).data("id");--}}
            {{--var _token = "{{ csrf_token() }}";--}}
            {{--$.post("{{route('admin.banneritem.setsort')}}",{id:id,sort:sort,_token:_token},function(res){--}}
            {{--$.post("#",{id:id,sort:sort,_token:_token},function(res){--}}
                {{--if(res.code==1){--}}
                    {{--location.reload();--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
    {{--}--}}
</script>
</body>

</html>
