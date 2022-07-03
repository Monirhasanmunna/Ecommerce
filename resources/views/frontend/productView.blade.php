@extends('frontend.layouts.main')

@section('content')
<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
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
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
				<img src="{{asset('storage/product/'.$product->image)}}" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera">
            </a>
			<div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""></a>
                   <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""></a>
                   <a href="themes/images/products/large/f3.jpg"> <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""></a>
                  </div>
                  <div class="item">
                   <a href="themes/images/products/large/f3.jpg"> <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""></a>
                   <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""></a>
                   <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""></a>
                  </div>
                </div>
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn"><i class="icon-print"></i></span>
				<span class="btn"><i class="icon-zoom-in"></i></span>
				<span class="btn"><i class="icon-star"></i></span>
				<span class="btn"><i class=" icon-thumbs-up"></i></span>
				<span class="btn"><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3>{{$product->title}}  </h3>
				<small>- (14MP, 18x Optical Zoom) 3-inch LCD</small>
				<hr class="soft">
				<form class="form-horizontal qtyFrm" action="{{route('cart.store',[$product->id])}}" method="POST">
					@csrf
				  <div class="control-group">
					<label class="control-label"><span>Tk.
						@if (isset($product->price))
						{{$product->price}}
						@endif
						</span></label>
					<div class="controls">
					<input type="number" class="span1" name="quantity" placeholder="Qty." required>
					@guest
					<a href="{{route('cart')}}" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></a>
					@endguest
					@auth
					<button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					@endauth
					</div>
				  </div>
				</form>
				
				<hr class="soft">
				<h4>
					@if(isset($product->productDetails->quantity))
					{{$product->productDetails->quantity}}
					@endif
					items in stock</h4>
				<form class="form-horizontal qtyFrm pull-right">
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					@if(isset($product->productDetails->color))
					  {{$product->productDetails->color}}
					@endif
					</div>
				  </div>
				</form>
				<hr class="soft clr">
				@if(isset($product->productDetails->information))
				<p>{!! $product->productDetails->information !!}</p>
				@endif
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr">
			<a href="#" name="detail"></a>
			<hr class="soft">
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">Fujifilm</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">FinePix S2950HD</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> 2011-01-28</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">3</td></tr>
				</tbody>
				</table>
				
				<h5>Features</h5>
				<p>
				14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).<br>
				OND363338
				</p>

				<h4>Editorial Reviews</h4>
				<h5>Manufacturer's Description </h5>
				<p>
				With a generous 18x Fujinon optical zoom lens, the S2950 really packs a punch, especially when matched with its 14 megapixel sensor, large 3.0" LCD screen and 720p HD (30fps) movie capture.
				</p>

				<h5>Electric powered Fujinon 18x zoom lens</h5>
				<p>
				The S2950 sports an impressive 28mm – 504mm* high precision Fujinon optical zoom lens. Simple to operate with an electric powered zoom lever, the huge zoom range means that you can capture all the detail, even when you're at a considerable distance away. You can even operate the zoom during video shooting. Unlike a bulky D-SLR, bridge cameras allow you great versatility of zoom, without the hassle of carrying a bag of lenses.
				</p>
				<h5>Impressive panoramas</h5>
				<p>
				With its easy to use Panoramic shooting mode you can get creative on the S2950, however basic your skills, and rest assured that you will not risk shooting uneven landscapes or shaky horizons. The camera enables you to take three successive shots with a helpful tool which automatically releases the shutter once the images are fully aligned to seamlessly stitch the shots together in-camera. It's so easy and the results are impressive.
				</p>

				<h5>Sharp, clear shots</h5>
				<p>
				Even at the longest zoom settings or in the most challenging of lighting conditions, the S2950 is able to produce crisp, clean results. With its mechanically stabilised 1/2 3", 14 megapixel CCD sensor, and high ISO sensitivity settings, Fujifilm's Dual Image Stabilisation technology combines to reduce the blurring effects of both hand-shake and subject movement to provide superb pictures.
				</p>
              </div>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr">
		<hr class="soft">
		<div class="tab-content">
			<div class="tab-pane" id="listView">
				@if ($relatedProduct->count() > 0)
					
				@foreach ($relatedProduct as $relproduct)
					<div class="row">	  
					<div class="span2">
						<img src="{{asset('storage/product/'.$product->image)}}" alt="">
					</div>
					<div class="span4">
						<h3>New | Available</h3>				
						<hr class="soft">
						<h5>{{$relproduct->title}} </h5>
						<p>	@if (isset($relproduct->productDetails->information))
							{{ Str::words(strip_tags($relproduct->productDetails->information),4) }}
							@endif
							
						</p>
						<a class="btn btn-small pull-right" href="{{route('product_details',[$relproduct->id])}}">View Details</a>
						<br class="clr">
					</div>
					<div class="span3 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> Tk.
						@if ($relproduct->price)
							{{$relproduct->price}}
						@endif
						</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="{{route('product_details',[$relproduct->id])}}" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
					  <a href="{{route('product_details',[$relproduct->id])}}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soft">
				@endforeach

				@else
					<h1>Related Product Not Availeble</h1>
				@endif
				
			
		</div>
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					@foreach ($relatedProduct as $relproduct)
						<li class="span3">
					  <div class="thumbnail">
						<a href="{{route('product_details',[$relproduct->id])}}"><img src="{{asset('storage/product/'.$relproduct->image)}}" alt=""></a>
						<div class="caption">
						  <h5>{{$relproduct->title}}</h5>
						  <p>
							@if(isset($relproduct->productDetails->information))
								{{ Str::words(strip_tags($relproduct->productDetails->information),4) }}
							@endif
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="{{route('product_details',[$relproduct->id])}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">€222.00</a></h4>
						</div>
					  </div>
					</li>
					@endforeach
				  </ul>
			<hr class="soft">
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
@endsection