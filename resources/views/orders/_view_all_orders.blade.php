<?php $count = 1; ?>
<table class="table">
    <thead>
        <tr>
            <th> #</th>
            <th> C/No </th>
            <th> From </th>
            <th> To </th>
            <th> Date </th>
            <th> Consignor </th>
            <th> No of packages </th>
            <th> Weight </th>
            <th> Consignee </th>
            <th> Refund Amount </th>
            <th> Paid Status </th>
            <th> Action </th>
        </tr>
    </thead>

    <tbody>
        @foreach($orders as $k => $v)
        <tr class="@if( $v->paid == 'no') danger @endif">
            <td> {{ (($orders->currentPage() - 1 ) * $orders->perPage() ) + $count + $k }}  </td>
            <td> {{ $v->c_number }} </td>
            <td> {{ $v->from_city['name'] }} </td>
            <td> {{ $v->to_city['name'] }} </td>
            <td> {{ $v->date }} </td>
            <td> {{ $v->consignor }} </td>
            <td> {{ $v->no_of_packages }} </td>
            <td> {{ $v->weight }} </td>
            <td> {{ $v->consignee }} </td>
            <td> {{ $v->refund_amount }} </td>
            <td> {{ $v->paid }} <br>@if($v->paid == 'no') <a href="{{ route('order.make_paid', $v->id) }}"> Pay </a> @endif </td>
            <td>    @if($v->received && !$v->processed) Received @endif
                    @if(!$v->received && !$v->processed) Not yet arrived @endif
                    @if($v->processed) Parcel Dispatched @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
{!! $orders->render() !!}
</div>