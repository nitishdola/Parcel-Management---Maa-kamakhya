@extends('admin.layouts.default')	
@section('content')
<h3>View All Loading Details</h3>

<div class="col-md-12">
	@if(count($results))
	@include('admin.loading_infos._view_all_infos')
	@else
		<div class="alert alert-warning">
		  <strong>oops !</strong> No results found !
		</div>
	@endif
</div>
@stop