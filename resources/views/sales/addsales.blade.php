@extends('layout.app')

@section('content')
{!! Form::open(['action' => 'SalesController@store', 'method' => 'POST']) !!}
      <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Item Category</th>
                <th scope="col">Item Code</th>
                <th scope="col">Item Quantity Sold</th>
                <th scope="col">Item Base Price</th>
                <th scope="col">Profit Rate</th>
                <th scope="col">Total Sale</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{Form::select('itemCat', ['1' => 'Medical Equipment', '2' => 'Drugs'], null, ['class' => 'form-control', 'placeholder' => 'Pick a category...'])}}</td>
                    <td>{{Form::text('itemCd', '', ['class' => 'form-control', 'placeholder' => ' '])}}</td>
                    <td>{{Form::text('itemQty', '', ['class' => 'form-control', 'placeholder' => ' '])}}</td>
                    <td>{{Form::text('itemBasPrice', '', ['class' => 'form-control', 'placeholder' => ' '])}}</td>
                    <td>{{Form::text('prftRate', '', ['class' => 'form-control', 'placeholder' => ' ', 'disabled' => 'disabled'])}}</td>
                    <td>{{Form::text('totalSale', '', ['class' => 'form-control', 'placeholder' => ' ', 'disabled' => 'disabled'])}}</td>
                </tr>
            </tbody>
        </table>
    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}
@endsection