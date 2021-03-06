<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('admin/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>John Doe</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br>

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section active">
          <h3>General</h3>
          <ul class="nav side-menu" style="">
            <li class="active"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>

            <li class=""><a><i class="fa fa-edit"></i> Category <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none;">
                <li><a href="{{route('admin.categories.list')}}">List</a></li>
                <li><a href="{{route('admin.categories.add')}}">Add New</a></li>
              </ul>
            </li>

            <li class=""><a><i class="fa fa-edit"></i>Sub Category <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none;">
                <li><a href="{{route('admin.subcategories.list')}}">List</a></li>
                <li><a href="{{route('admin.subcategories.add')}}">Add New</a></li>
              </ul>
            </li>

            <li class=""><a><i class="fa fa-edit"></i>Product<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none;">
                <li><a href="{{route('admin.product.list')}}">Product List</a></li>
                <li><a href="{{route('admin.product.list.add')}}">Add Product</a></li>
              </ul>
            </li>

            <li class=""><a><i class="fa fa-edit"></i>User Manager<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none;">
                <li><a href="{{route('admin.user.list')}}">User List</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a data-toggle="tooltip" data-placement="top" title="" href="{{route('logout')}}"onclick="event.preventDefault();this.closest('form').submit();" data-original-title="Logout">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
        </form>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>