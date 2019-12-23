@extends('frontend.master')
@section('title','Trang Chu')
@section('main')

<div id="wrap-inner">
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach($productlist as $p)
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{asset('storage/app/avatar/'.$p->prod_image)}}" class="img-thumbnail"></a>
					<p><a href="#">{{$p->prod_name}}</a></p>
					<p class="price">{{number_format($p->prod_price,0,',','.')}}.000VND</p>	  
					<div class="marsk">
						<a href="{{asset('detail/'.$p->id)}}">Xem chi tiết</a>
					</div>                                    
				</div>
			@endforeach
		</div>                	                	
	</div>

	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">
			@foreach($productnew as $new)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{asset('storage/app/avatar/'.$new->prod_image)}}" class="img-thumbnail"></a>
					<p><a href="#">{{$new->prod_name}}</a></p>
					<p class="price">{{number_format($new->prod_price,0,',','.')}}.000VND</p>	  
					<div class="marsk">
						<a href="{{asset('detail/'.$new->id)}}">Xem chi tiết</a>
					</div>                                    
				</div>
			@endforeach
		</div>    
	</div>
</div>
@stop
