<div id="header">
    <div class="container">
    <div id="welcomeLine" class="row">
        <div class="span6">
          @if(isset(Auth::user()->user_name))
          Welcome!<strong> {{Auth::user()->user_name}}
          @endif
        </strong></div>
        <div class="span6">
        <div class="pull-right">
            <a href="{{route('cart')}}"><span class="">Fr</span></a>
            <a href="{{route('cart')}}"><span class="">Es</span></a>
            <span class="btn btn-mini">En</span>
            <a href="{{route('cart')}}"><span>&pound;</span></a>
            <span class="btn btn-mini">$155.00</span>
            <a href="{{route('cart')}}"><span class="">$</span></a>
            <a href="{{route('cart')}}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
        </div>
        </div>
    </div>
    <!-- Navbar ================================================== -->
    <div id="logoArea" class="navbar">
    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
      <div class="navbar-inner">
        <a class="brand" href="{{route('home')}}"><img src="{{asset('themes/images/logo.png')}}" alt="Bootsshop"/></a>
            <form class="form-inline navbar-search" method="post" action="products.html" >
            <input id="srchFld" class="srchTxt" type="text" />
              <select class="srchTxt">
                <option>All</option>
                <option>CLOTHES </option>
                <option>FOOD AND BEVERAGES </option>
                <option>HEALTH & BEAUTY </option>
                <option>SPORTS & LEISURE </option>
                <option>BOOKS & ENTERTAINMENTS </option>
            </select> 
              <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
        </form>
        <ul id="topMenu" class="nav pull-right">
         <li class=""><a href="{{route('specialsOffer')}}">Specials Offer</a></li>
         <li class=""><a href="{{route('delivery')}}">Delivery</a></li>
         <li class=""><a href="{{route('contact')}}">Contact</a></li>
         <li class="">
          @auth
          <form action="{{route('user.logout')}}" method="post" style="margin-top: 12px;">
            @csrf
            <button class="btn btn-large btn-success mt-2" type="submit">Logout</button>
          </form>
          @endauth
          @guest
              <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
          @endguest
         
        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                <h3>Login Block</h3>
              </div>
              <div class="modal-body">

                <form class="form-horizontal loginFrm" action="{{route('user.login')}}" method="POST">
                  @csrf
                  <div class="control-group">								
                    <input type="email" name="email" id="inputEmail" placeholder="Email">
                  </div>
                  <div class="control-group">
                    <input type="password" name="password" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="control-group">
                    <label class="checkbox">
                    <input type="checkbox"> Remember me
                    </label>
                  </div>
                  <button type="submit" class="btn btn-success">Sign in</button>
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </form>	
              </div>
        </div>
        </li>
        </ul>
      </div>
    </div>
    </div>
    </div>