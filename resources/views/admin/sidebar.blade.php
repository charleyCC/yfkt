<li class="nav-item nav-profile">
    <a href="#" class="nav-link">
        <div class="nav-profile-image">
            <img src="{{ asset(__ADMIN__) }}/images/faces/face1.jpg" alt="profile">
            <span class="login-status online"></span> <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
            {{--<span class="font-weight-bold mb-2">{{auth()->user()->username}}</span>--}}
            <span class="font-weight-bold mb-2">xxxx2</span>
            <span class="text-secondary text-small">管理员</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('admin.home')}}">
        <span class="menu-title">后台首页</span>
        <i class="mdi mdi-home menu-icon"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">系统配置</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-settings menu-icon"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.config.siteconfig')}}">网站配置</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.config.informationconfig')}}">基本信息</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.config.baiduconfig')}}">百度推送</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-article" aria-expanded="false" aria-controls="ui-article">
        <span class="menu-title">新闻管理</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-newspaper menu-icon"></i>
    </a>
    <div class="collapse" id="ui-article">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.news.index')}}">新闻列表</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.news.create')}}">添加新闻</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
        <span class="menu-title">产品管理</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi mdi-recycle menu-icon"></i>
    </a>
    <div class="collapse" id="ui-product">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.index')}}">产品列表</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.category.list')}}">产品分类</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    {{--<a href="{{route('admin.cases.index')}}" class="nav-link">--}}
    <a href="#" class="nav-link">
        <span class="menu-title">案例管理</span>
        <i class="mdi mdi-cube-send menu-icon"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-page" aria-expanded="false" aria-controls="ui-page">
        <span class="menu-title">单页管理</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-book-open-page-variant menu-icon"></i>
    </a>
    <div class="collapse" id="ui-page">
        <ul class="nav flex-column sub-menu">
            {{--<li class="nav-item"> <a class="nav-link" href="{{route('admin.page.create')}}">公司简介</a></li>--}}
            {{--<li class="nav-item"> <a class="nav-link" href="{{route('admin.page.index')}}">招贤纳士</a></li>--}}
            {{--<li class="nav-item"> <a class="nav-link" href="{{route('admin.page.licheng')}}">发展历程</a></li>--}}
            <li class="nav-item"> <a class="nav-link" href="#">公司简介</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">招贤纳士</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">发展历程</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-banner" aria-expanded="false" aria-controls="ui-banner">
        <span class="menu-title">轮播图管理</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-book-open-page-variant menu-icon"></i>
    </a>
    <div class="collapse" id="ui-banner">
        <ul class="nav flex-column sub-menu">
            {{--<li class="nav-item"> <a class="nav-link" href="{{route('admin.banneritem.index')}}">轮播图列表</a></li>--}}
            {{--<li class="nav-item"> <a class="nav-link" href="{{route('admin.banner.index')}}">轮播图分类</a></li>--}}
            <li class="nav-item"> <a class="nav-link" href="#">轮播图列表</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">轮播图分类</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    {{--<a href="{{route('admin.friend.index')}}" class="nav-link">--}}
    <a href="#" class="nav-link">
        <span class="menu-title">友情连接管理</span>
        <i class="mdi mdi-cube-send menu-icon"></i>
    </a>
</li>
<li class="nav-item sidebar-actions">
                    <span class="nav-link">
                      <div class="border-bottom">
                        <h6 class="font-weight-normal mb-3">易风课堂</h6>
                      </div>
                      <div class="mt-4">
                        <ul class="gradient-bullet-list mt-4">
                          <li>QQ：576617109</li>
                          <li>①群：660510850</li>
                          <li>②群：494826865</li>
                          <li>版本号：v1.0.0</li>
                        </ul>
                      </div>
                    </span>
</li>