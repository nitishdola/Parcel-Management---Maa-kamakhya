<table class="table">
	<thead>
		<tr>
			<th> Stock In </th>
			<th> {{ $stock_in }} </th>
		</tr>

		<tr>
			<th> Stock Out </th>
			<th> {{ $stock_out }} </th>
		</tr>

		<tr>
			<th> Total Orders Received </th>
			<th> {{ $stock_in + $stock_out }} </th>
		</tr>
	</thead>
</table>

<br><br>
<h4> Stock In </h4>

@if(count($stock_ins))
<table class="table">
	<thead>
		<tr>
			<th>Consignee</th>
			<th>From</th>
			<th>To</th>
			<th>Date</th>
			<th>Weignt</th>
			<th>Consignor</th>
		</tr>
	</thead>

	<tbody>
		@foreach($stock_ins as $k => $v) 
		<tr>
			<td> {{ $v->consignee }} </td>
			<td> {{ $v->from_city['name'] }} </td>
			<td> {{ $v->to_city['name'] }} </td>
			<td> {{ $v->date }} </td>
			<td> {{ $v->weight }} Kg </td>
			<td> {{ $v->consignor }} </td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<div class="alert alert-warning">
  <strong>oops !</strong> No stocks found
</div>

@endif
<br><br>



<h4> Stock Out </h4>
@if(count($stock_outs))
<table class="table">
	<thead>
		<tr>
			<th>Consignee</th>
			<th>From</th>
			<th>To</th>
			<th>Date</th>
			<th>Weignt</th>
			<th>Consignor</th>
			<th>Dispatched Date</th>
		</tr>
	</thead>

	<tbody>
		@foreach($stock_outs as $k => $v) 
		<tr>
			<td> {{ $v->consignee }} </td>
			<td> {{ $v->from_city['name'] }} </td>
			<td> {{ $v->to_city['name'] }} </td>
			<td> {{ $v->date }} </td>
			<td> {{ $v->weight }} Kg</td>
			<td> {{ $v->consignor }} </td>
			<td> {{ date('d-m-Y h:i:s A', strtotime($v->process_date)) }} </td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<div class="alert alert-warning">
  <strong>oops !</strong> No stocks found
</div>

@endif