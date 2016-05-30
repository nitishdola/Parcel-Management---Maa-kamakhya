@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="widget box">
			<div class="widget-header">
				<h3>Received Orders</h3>
			</div>
			<div class="widget-content">
				@include('orders._view_all_orders')
			</div>
		</div>
	</div>
</div>
@stop