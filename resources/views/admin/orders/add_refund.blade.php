@extends('admin.layouts.default')	
@section('content')
<h3>Add Refund</h3>

<div class="col-md-12">
	<div class="widget box">
		<div class="widget-content">
			{!! Form::open(array('route' => 'admin.order.post_refund', 'id' => 'admin.order.post_refund', 'class' => 'form-horizontal row-border')) !!}
				@include('orders._create_refund')
				<div class="form-actions">
				    {!! Form:: submit('Add', ['class' => 'btn btn-success']) !!}
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