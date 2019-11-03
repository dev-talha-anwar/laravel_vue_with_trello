@extends('adminviews.layouts.layout')
@section('pagecss')
	<style>
	.componentchange-enter-active{
		animation: coming 0.5s;
		animation-delay: 0.5s;
	}
	.componentchange-leave-active{
		animation: going 0.5s;
	}
	
	@keyframes going {
	  from {
	  	opacity: 1;
	  }
	  to {
	  	opacity: 0;
	  }
	}
	@keyframes coming {
	  from {
	  	opacity: 0;
	  }
	  to {
	  	opacity: 1;
	  }
	}
	</style>
@endsection
@section('content')
<transition name="componentchange">
	<router-view>
	</router-view>
</transition>
<vue-progress-bar>
</vue-progress-bar>
@endsection