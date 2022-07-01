@extends('frontend.layouts.main')

@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">
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
	 <!--
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
	<form class="form-horizontal" action="{{route('user.store')}}" method="POST">
		@csrf
		<h4>Your personal information</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">First Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" name="first_name" placeholder="First Name">
			</div>
		 </div>

		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputLnam" name="last_name" placeholder="Last Name">
			</div>
		 </div>

		 <div class="control-group">
			<label class="control-label" for="username">User Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="username" name="user_name" placeholder="User Name">
			</div>
		 </div>

		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="email" id="input_email" name="email" placeholder="Email">
		</div>
	  </div>	  
		  
		<div class="control-group">
			<label class="control-label" for="address">Address<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="address" name="address" placeholder="Adress"> <span>Street address, P.O. box, company name, c/o</span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="city">City<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="city" name="city" placeholder="city"> 
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="postcode" name="post_code" placeholder="Zip / Postal Code"> 
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="country">Country<sup>*</sup></label>
			<div class="controls">
			<select id="country" name="country">
				<option disabled hidden>Choose One</option>
				<option value="{{'America'}}">America</option>
				<option value="{{'Bangladesh'}}">Bangladesh</option>
				<option value="{{'India'}}">India</option>
				<option value="{{'Nepal'}}">Nepal</option>
				<option value="{{'Srilanka'}}">Srilanka</option>
			</select>
			</div>
		</div>	

		<div class="control-group">
			<label class="control-label" for="phone">Mobile Phone </label>
			<div class="controls">
			  <input type="text" name="phone" id="phone" placeholder="Mobile Phone"> 
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
			<div class="controls">
			  <input type="password" id="inputPassword1" name="password" placeholder="Password">
			</div>
		</div>
		
	<p><sup>*</sup>Required field	</p>
	
	<div class="control-group">
			<div class="controls">
				
				<button class="btn btn-large btn-success" type="submit">Register</button>
			</div>
		</div>		
	</form>
</div>

</div>
@endsection