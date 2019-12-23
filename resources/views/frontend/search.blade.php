@extends('frontend.master')
@section('title','Trang ket qua tim kiem')
@section('main')
<link rel="stylesheet" href="css/search.css">
<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
		<div class="product-list row">
			@foreach($items as $p)
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

	<!-- <div id="pagination">
		<ul class="pagination pagination-lg justify-content-center">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<li class="page-item disabled"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
		</ul>
	</div> -->
</div>
@stop

