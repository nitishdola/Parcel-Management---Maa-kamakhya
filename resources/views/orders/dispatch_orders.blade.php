@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="widget box">
			<div class="widget-header">
				<h3>Received Orders</h3>
			</div>
			<div class="widget-content">
				@if(count($orders))
					<?php $count = 1; ?>
					<table class="table">
					    <thead>
					        <tr>
					            <td> #</td>
					            <td> C/No </td>
					            <td> From </td>
					            <td> To </td>
					            <td> Date </td>
					            <td> Consignor </td>
					            <td> No of packages </td>
					            <td> Weight </td>
					            <td> Consignee </td>
					            <td> Action </td>
					        </tr>
					    </thead>

					    <tbody>
					        @foreach($orders as $k => $v)
					        <tr>
					            <td> {{ (($orders->currentPage() - 1 ) * $orders->perPage() ) + $count + $k }}  </td>
					            <td> {{ $v->c_number }} </td>
					            <td> {{ $v->from_city['name'] }} </td>
					            <td> {{ $v->to_city['name'] }} </td>
					            <td> {{ $v->date }} </td>
					            <td> {{ $v->consignor }} </td>
					            <td> {{ $v->no_of_packages }} </td>
					            <td> {{ $v->weight }} </td>
					            <td> {{ $v->consignee }} </td>
					            <td> @if(!$v->process)<a href="{{ route('order.process', $v->id) }} ">Dispatch Parcel</a>@else Dispatched @endif</td>
					        </tr>
					        @endforeach
					    </tbody>
					</table>
					<div class="pagination">
					{!! $orders->render() !!}
					</div>
				@else
					<div class="alert alert-warning">
					  <strong>oops !</strong> No results found !
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
@stop