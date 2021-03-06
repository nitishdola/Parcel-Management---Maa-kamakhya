@extends('layouts.app')	
@section('content')
<div class="col-md-8">
	<div class="widget box">
		<div class="widget-header">
			<h3>Search Stock</h3>
		</div>
		<div class="widget-content">
			{!! Form::open(array('route' => 'stock.search_result', 'id' => 'stock.search_result', 'class' => 'form-horizontal row-border')) !!}
				@include('orders._stock_search')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop