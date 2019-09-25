@extends('layout.app')

@section('content')
    <h1>Sales</h1><hr>
    List of sales:
    
    @if(count($sales) > 0)
    <table border="1" class="table table-hover">
            <tr>
                <td>Sales Person</td>
                <td>Department</td>
                <td>Item Code</td>
                <td>Item Quantity</td>
                <td>Item Price</td>
                <td>Commision Rate</td>
                <td>Total Sale</td>
                @if(auth()->user()->isAdmin == "1")
                <td>Action</td>
                @endif
            </tr>
        @foreach ($sales as $sale)
            @if ($sale->delFlag != 1)  
                <tr>
                    <td>{{$sale->name}}</td>
                    <td>
                        @if ($sale->itemCat == "1")
                            International Sale
                        @else
                            Local Sale
                        @endif    
                    </td>
                    <td>{{$sale->itemCd}}</td>
                    <td>{{$sale->itemQty}}</td>
                    <td>{{$sale->itemBasPrc}}</td>
                    <td>{{$sale->prftRate}}</td>
                    <td>{{$sale->totalPrice}}</td>
                    @if(auth()->user()->isAdmin == "1")
                    <td>
                    <a class="btn btn-primary" href="/sales/{{$sale->id}}/edit">Edit</a>
                    {!!Form::open(['action' => ['SalesController@destroy', $sale->id], 'method' => 'DELETE', 'class' => 'float-right'])!!}
                        {{Form::hidden('method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                    </td>
                    @endif
                </tr> 
            @endif      
        @endforeach    
</table>   
    <br>
    <a href="/sales/create" class="btn btn-info">Click here to add your sale</a>
    @endif
    {{-- {{$sales}} --}}
    {{-- <h4>Person with highest sales: [username]</h4> --}}

    {{-- <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Salesman</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">Mark</th>
            <td>International Sale</td>
            <td>
                <a href="/main"><button class="btn btn-primary">Update</button></a>
                <button class="btn btn-secondary">Update</button>
            </td>
            </tr>
            <tr>
            <th scope="row">Jacob</th>
            <td>International Sale</td>
            <td>
                <button class="btn btn-primary">Update</button>
                <button class="btn btn-secondary">Update</button>
            </td>
            </tr>
            <tr>
            <th scope="row">Larry</th>
            <td>Local Sale</td>
            <td>
                <button class="btn btn-primary">Update</button>
                <button class="btn btn-secondary">Update</button>
            </td>
            </tr>
        </tbody>
    </table> --}}
@endsection
