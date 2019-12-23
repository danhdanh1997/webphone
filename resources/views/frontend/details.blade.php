
@extends('frontend.master')
@section('title','Trang chi tiet san pham')
@section('main')
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$detail->prod_name}}</h3>
		<div class="row">
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
				<img height="220px"src="{{asset('storage/app/avatar/'.$detail->prod_image)}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
				<p>Giá: <span class="price">{{number_format($detail->prod_price,0,',','.')}}.000VND</span></p>
				<p>Bảo hành: {{$detail->prod_warranty}}</p> 
				<p>Phụ kiện: {{$detail->prod_accessories}}</p>
				<p>Tình trạng: {{$detail->prod_condition}}</p>
				<p>Khuyến mại: {{$detail->prod_promotion}}</p>
				<p>Còn hàng: @if($detail->prod_status==1) Con hang @else Het hang @endif</p>
				<p class="add-cart text-center">
					<a href="{{asset('cart/add/'.$detail->id)}}" 
					style="text-decoration: none;
					font-weight: bold;
					font-size: 18px;
					background:orangered;
					padding:22px">Đặt hàng online
					</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify">{!!$detail->prod_discription!!}</p>
	</div>
	<div id="comment">
		<h3>Bình luận</h3>
		<div class="col-md-9 comment">
			<form  method="POST">
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="name">Tên:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Gửi</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
	<div id="comment-list">
		@foreach($comment as $c)
			<ul>
				<li class="com-title">
					{{$c->name}}
					<br>
					<span>{{date('Y/m/d H:i',strtotime($c->created_at))}}</span>	
				</li>
				<li class="com-details">
					{{$c->content}}
				</li>
			</ul>
		@endforeach
	</div>
</div>					
@stop