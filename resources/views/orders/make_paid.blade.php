@extends('layouts.app')	
@section('content')
<div class="col-md-8">
	<div class="widget box">
		<div class="widget-header">
			<h3>Pay</h3>
		</div>
		<div class="widget-content">
			{!! Form::model($order, array('route' => 'order.post_paid', 'id' => 'order.post_paid', 'class' => 'form-horizontal row-border')) !!}
				@include('orders._make_paid')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop