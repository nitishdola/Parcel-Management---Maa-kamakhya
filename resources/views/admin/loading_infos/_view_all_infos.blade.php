<?php $count = 1; ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th> #</th>
            <th> C/No </th>
            <th> Loading Date </th>
            <th> Consignor </th>
            <th> Consignee </th>
            <th> Package Trasportation Method </th>
            <th> Paid for the Trasportation </th>
            <th> Remarks </th>
        </tr>
    </thead>

    <tbody>
        @foreach($results as $k => $v)
        <tr>
            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }}  </td>
            <td> {{ $v->orders['c_number'] }} </td>
            <td> {{ date('d/m/Y', strtotime($v->loading_date)) }} </td>
            <td> {{ $v->orders['consignor'] }} </td>
            <td> {{ $v->orders['consignee'] }} </td>
            <td> {{ $v->package_transportation_method }}</td>
            <td> {{ $v->paid }} </td>
            <td> {{ $v->remarks }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
{!! $results->render() !!}
</div>