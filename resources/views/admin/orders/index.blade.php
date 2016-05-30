@extends('admin.layouts.default')	
@section('content')
<h3>View All Orders</h3>

<div class="col-md-12">
	<div class="widget box">
		<div class="widget-content">
			@if(count($orders))
			@include('orders._view_all_orders')
			@else
				<div class="alert alert-warning">
				  <strong>oops !</strong> No results found !
				</div>
			@endif
			
		</div>
	</div>
</div>
@stop