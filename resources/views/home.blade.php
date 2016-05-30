@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <a class="btn btn-primary btn-lg active" href="#"><span class="glyphicon glyphicon-arrow-down"></span>Receive Parcel</a>
            <a class="btn btn-primary btn-lg active" href="#"><span class="glyphicon glyphicon-arrow-up"></span>Dispatch Parcel</a>

            <div class="panel panel-default">
                <div class="panel-heading">View Latest Orders</div>
                    @if(count($orders))
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
                                <td> Pay </td>
                                <td> Action </td>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $k => $v)
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td> {{ $v->c_number }} </td>
                                <td> {{ $v->from_city['name'] }} </td>
                                <td> {{ $v->to_city['name'] }} </td>
                                <td> {{ $v->date }} </td>
                                <td> {{ $v->consignor }} </td>
                                <td> {{ $v->no_of_packages }} </td>
                                <td> {{ $v->weight }} </td>
                                <td> {{ $v->consignee }} </td>
                                <td> {{ $v->paid }} <br>@if($v->paid == 'no') <a href="{{ route('order.make_paid', $v->id) }}"> Pay </a> @endif </td>
                                <td> @if(!$v->processed)<a href="{{ route('order.process', $v->id) }} ">Dispatch</a>@else Dispatched @endif</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    No Orders
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
