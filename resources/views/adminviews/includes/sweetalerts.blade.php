@if (count($errors))
	<script>
		$(document).ready(function(){
			var errors = "";
			@foreach ($errors->all() as $error)
				errors += "{{$error}}\n";
			@endforeach

			swal({
				type:"error",
			 	title: "Errors",
			  	text: errors,
			  	customClass: 'pulsate-crazy',
			});
		});
	</script>
@endif



@if (Session::has('success'))
	<script>
		$(document).ready(function(){
			var msg = "{{ Session::get('success') }}";
			swal({
				type:"success",
			  	title: "Success",
			  	text: msg,
			  	customClass: 'pulsate-regular',
			});
			 // swal("Hello world!", {
			 //    className: "red-bg",
			 //  });
		});
	</script>
@endif

@if (Session::has('error'))
	<script>
		$(document).ready(function(){
			var msg = "{{ Session::get('error') }}";
			swal({
				type:"error",
			  	title: "Error",
			  	text: msg,
			  	html: true,
			  	customClass: 'pulsate-crazy',

			});
		});
	</script>
@endif