<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>
<base href="{{asset('public/backend')}}/">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Sign up</div>
				<div class="panel-body">

				@if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
					<form role="form" method="post" action="{{ asset('register') }}">
						<fieldset>
							@include('errors.note')
							<div class="form-group">
								<input class="form-control" placeholder="username" name="name" type="text" autofocus="">
							</div>

							@if($errors->has('name'))
							<div class="text-danger">
								@foreach($errors->get('name') as $err)
									<li>{{$err}}</li>
								@endforeach
							</div>
							@endif
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value={{old('email')}}>
							</div>

							@if($errors->has('email'))
                        	<div class="text-danger">
                            @foreach($errors->get('email') as $err)
                                <li>{{$err}}</li>
                            @endforeach
							@endif
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>

							@if($errors->has('password'))
							<div class="text-danger">
								@foreach($errors->get('password') as $err)
									<li>{{$err}}</li>
								@endforeach
							</div>
							@endif
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">	
							</div>

							@if($errors->has('confirm_password'))
							<div class="text-danger">
								@foreach($errors->get('confirm_password') as $err)
									<li>{{$err}}</li>
								@endforeach
							</div>
							@endif
							<div class="form-group">
		
								<input type="text" class="form-control" placeholder="adress" name="adress">
								@if($errors->has('adress'))
								<div class="text-danger">
									@foreach($errors->get('adress') as $err)
										<li>{{$err}}</li>
									@endforeach
								</div>
								@endif
							</div>
							<div class="form-group">
								
								<input type="text" class="form-control" placeholder="Phone" name="phone">
								@if($errors->has('phone'))
								<div class="text-danger">
									@foreach($errors->get('phone') as $err)
										<li>{{$err}}</li>
									@endforeach
								</div>
								@endif
							</div>
							<div class="form-group">
								
								<input type="text" class="form-control" placeholder="Age" name="age">
								@if($errors->has('age'))
								<div class="text-danger">
									@foreach($errors->get('age') as $err)
										<li>{{$err}}</li>
									@endforeach
								</div>
								@endif
							</div>
							<input type="submit" class="btn btn-primary" value="Sign up">
							
						</fieldset>
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
