@extends('backend.master')
@section('title','sua danh muc san pham')
@section('main')	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-5 col-lg-5">
				<div class="panel panel-primary">
					@include('errors.note')
					<form method="POST">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Tên danh mục:</label>
								<input required type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cate->cate_name}}">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên danh mục..." value="Sua">
							</div>
							<div class="form-group ">
								<a href="{{asset('categori')}}" class="form-control btn btn-danger">Huy bo</a>
							</div>
						</div>
						{{ csrf_field() }}
					</form>
				</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop