@extends('frontend.layouts.main')

@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small>3 Item(s) </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft">

	@guest
		<table class="table table-bordered">
		<tbody><tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			@if($message = Session::get('message'))
				<div class="alert alert-info fade in">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{$message}}
				</div>
			@endif

			@if ($errors->any())
				<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
						<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							{{$error}}
						 </div>
						@endforeach
				</div>
			@endif
			<form class="form-horizontal" action="{{route('user.login')}}" method="POST">
				@csrf
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Email</label>
				  <div class="controls">
					<input type="text" id="inputUsername" name="email" placeholder="Email">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" name="password" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Sign in</button> OR <a href="{{route('user.registration')}}" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</tbody></table>
	@endguest	
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				  <th>Price</th>
				  <th>Total</th>
				</tr>
              </thead>
              <tbody>
				@php $sum = 0; $total = 0; @endphp
				@foreach ($carts as $cart)
				@php $sum = $sum + $cart->products->price @endphp
				@php $mul = $cart->quantity * $cart->products->price @endphp
				@php $total = $total + $mul @endphp
                <tr>
                  <td> <img width="60" src="themes/images/products/4.jpg" alt=""></td>
                  <td>{{$cart->products->title}}<br>Color : {{$cart->products->color}}</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" value="{{$cart->quantity}}" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>${{$cart->products->price}}</td>
				  <td>{{$mul}}</td>
                </tr>
				@endforeach
				 <tr>
                  <td colspan="4" style="text-align:right"><strong>TOTAL =</strong></td>
                  <td class="label label-important" style="display:block"> @if(isset($total))<strong> $ {{$total}} </strong> @endif</td>
                </tr>
				
				</tbody>

            </table>
		
		
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> ADD </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>
			
			<table class="table table-bordered">
			 <tbody><tr><th>ESTIMATE YOUR SHIPPING </th></tr>
			 <tr> 
			 <td>
				<form class="form-horizontal">
				  <div class="control-group">
					<label class="control-label" for="inputCountry">Country </label>
					<div class="controls">
					  <input type="text" id="inputCountry" placeholder="Country">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputPost">Post Code/ Zipcode </label>
					<div class="controls">
					  <input type="text" id="inputPost" placeholder="Postcode">
					</div>
				  </div>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" class="btn">ESTIMATE </button>
					</div>
				  </div>
				</form>				  
			  </td>
			  </tr>
            </tbody></table>		
	<a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
@endsection