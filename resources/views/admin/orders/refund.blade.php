@extends('admin.layouts.default')	
@section('content')
<h3>Add New Order</h3>

<div class="col-md-12">
	<div class="widget box">
		<div class="widget-content">
			{!! Form::open(array('route' => 'admin.order.store', 'id' => 'admin.order.store', 'class' => 'form-horizontal row-border')) !!}
				@include('orders._create_order')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop

@section('Scripts')
<script type="text/javascript">
  
</script>
@stop