@extends('admin.layouts.default')	
@section('content')
<h3>Update Loading Info @Patna</h3>

<div class="col-md-8">
	<div class="widget box">
		<div class="widget-content">
			{!! Form::open(array('route' => 'admin.loading.store', 'id' => 'loading_store', 'class' => 'form-horizontal row-border')) !!}
				@include('admin.loading_infos._form')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop