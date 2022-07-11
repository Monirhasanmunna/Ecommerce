@extends('frontend.layouts.main')

@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small>{{$carts->count()}} Item(s) </small>]<a href="{{route('home')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft">
	
	@if($message = Session::get('message'))
				<div class="alert alert-info fade in">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{$message}}
				</div>
			@endif

	@guest
		<table class="table table-bordered">
		<tbody><tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			
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
	
	@auth
	<form action="{{route('product.buy')}}" method="POST">
	@csrf
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				  <th>Select</th>
				  <th>Price</th>
				  <th>Total</th>
				</tr>
              </thead>
			  
              <tbody>
				
				@if ($carts->count() > 0)
					@php $sum = 0; $total = 0; @endphp 
					@foreach ($carts as $cart)
					{{-- @php $sum = $sum + $cart->products->price @endphp--}}
					@php $mul = $cart->quantity * $cart->products->price @endphp
					@php $total = $total + $mul @endphp 
					<tr>
					
					<input style="display: none;" value="{{$cart->product_id}}" name="product_id[]" type="text">
					  <td> <img width="60" src="{{asset('storage/product/'.$cart->products->image)}}" alt=""></td>
					  <td>{{$cart->products->title}}<br>Color : {{$cart->products->color}}</td>
					  <td>
						<div class="input-append"><input class="span1" name="quantity[]" style="max-width:34px" value="{{$cart->quantity}}" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button>
							{{-- <form style="display: inline;" action="{{route('cart.delete',[$cart->id])}}" method="POST">
							@method('delete')
							@csrf
								<button class="btn btn-danger btn_close" type="submit"><i class="icon-remove icon-white"></i></button>
							</form> --}}
							<a class="btn btn-danger btn_close" href="{{route('cart.delete',[$cart->id])}}"><i class="icon-remove icon-white"></i></a>
						</div>
					  </td>
					  <td><input name="select[]" value="{{$cart->id}}" type="checkbox"></td>
					  <td>${{$cart->products->price}}</td>
					  <td>{{$mul}}</td>
					</tr>
					@endforeach
					  {{-- <td colspan="5" style="text-align:right"><strong>TOTAL =</strong></td>
					  <td class="label label-important" style="display:block"> @if(isset($total))<strong> $ {{$total}} </strong> @endif</td> --}}
					
				@else
					<td colspan="5" style="text-align: center;">No Product Found</td>
				@endif
			</tbody>
		</table>
			<button class="btn btn-primary pull-right" type="submit">BUY</button>
		</form>
	@endauth
</div>
@endsection
