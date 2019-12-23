@extends('frontend.master')
@section('title','Danh muc san pham')
@section('main')

<div id="wrap-inner">
	<div class="products">
		<h3>{{$cate->cate_name}}</h3>
		<div class="product-list row">
			@foreach($categori as $i)
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{asset('storage/app/avatar/'.$i->prod_image)}}" class="img-thumbnail"></a>
					<p><a href="#">{{$i->prod_name}}</a></p>
					<p class="price">{{number_format($i->prod_price,0,',','.')}}.000VND</p>	  
					<div class="marsk">
						<a href="{{asset('detail/'.$i->id)}}">Xem chi tiết</a>
					</div>                                    
				</div>
			@endforeach()
		</div>                	                	
	</div>

	<div id="pagination">
		
		{{$categori->links()}}
	</div>
</div>
@stop			
					