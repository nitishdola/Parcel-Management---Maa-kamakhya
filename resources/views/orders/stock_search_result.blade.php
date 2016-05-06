@extends('admin.layouts.default')	
@section('content')
<div class="col-md-10">
	<div class="widget box">
		<div class="widget-header">
			<h3>Stock Report</h3>
		</div>
		<div class="widget-content">
			@include('orders._stock_search_result')
		</div>
	</div>
</div>
@stop