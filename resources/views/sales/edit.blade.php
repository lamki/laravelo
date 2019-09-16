@extends('layout.app')

@section('content')
@if(auth()->user()->isAdmin == "1")
<h1>Sales Entry</h1>
{{-- Header --}}
<div class="form-group pb-5">
        <label for="name" class="col-lg-4">Name:</label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}" disabled>
        </div>
        <label for="name" class="col-lg-3">Department:</label>
        <div class="col-lg-8">
            
            @if(auth()->user()->dept == 1)
            <input type="text" class="form-control" name="name" id="dept" value="International Sale" disabled>
            @else
            <input type="text" class="form-control" name="name" id="dept" value="Local Sale" disabled>
            @endif
        </div>
        <label for="name" class="col-lg-4">Status:</label>
        <div class="col-lg-8">
            @if(auth()->user()->status == 1)
                <input type="text" class="form-control" name="name" id="stat" value="Active" disabled>
            @else
                <input type="text" class="form-control" name="name" id="stat" value="Non-Active" disabled>
            @endif
            
        </div>
    </div>
{{-- End of Header --}}

{!! Form::open(['action' => 'SalesController@store', 'method' => 'POST']) !!}
<table class="table table-striped">
      <thead>
          <tr>
          <th scope="col">Item Category</th>
          <th scope="col">Item Code</th>
          <th scope="col">Item Quantity Sold</th>
          <th scope="col">Item Base Price</th>
          <th scope="col">Commision Rate</th>
          <th scope="col">Total Sale</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>{{Form::select('itemCat', ['1' => 'Medical Equipment', '2' => 'Drugs'], $sale->itemCat, ['id' => 'itemCat', 'class' => 'form-control', 'placeholder' => 'Pick a category...', 'onchange' => 'updateProfitRate()'])}}</td>
              <td>{{Form::text('itemCd', $sale->itemCd, [ 'id' => 'itemCd', 'class' => 'form-control', 'placeholder' => ' '])}}</td>
              <td>{{Form::text('itemQty', $sale->itemQty, ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'itemQty', 'onchange' => 'calcTotalSale()'])}}</td>
              <td>{{Form::text('itemBasPrice', $sale->itemBasPrc, ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'itemBasPrice', 'onchange' => 'calcTotalSale()'])}}</td>
              <td>{{Form::text('prftRate', $sale->prftRate, ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'prftRate', 'disabled' => 'disabled'])}}</td>
              <td>{{Form::text('totalSale', $sale->totalPrice, ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'totalSale', 'disabled' => 'disabled'])}}</td>
          </tr>
      </tbody>
  </table>
  {{Form::hidden('userId', auth()->user()->id)}}
  {{Form::hidden('name', auth()->user()->name)}}
  {{Form::hidden('dept', auth()->user()->dept)}}
  {{Form::hidden('status', auth()->user()->status)}}
{{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
{!! Form::close() !!}

<script>
function updateProfitRate(){
        var category = document.getElementById("itemCat").value;
        var prft = document.getElementById("prfRate");

        if(category === "1"){
            document.getElementById("prftRate").value = "0.35";
        }
        else{
            document.getElementById("prftRate").value = "0.15";
        }
        this.calcTotalSale();
    }

    function calcTotalSale(){
        var basePrice = document.getElementById("itemBasPrice").value;
        var itemQty = document.getElementById("itemQty").value;
        var prfRate = document.getElementById("prftRate").value;

        var totalSale = (itemQty * basePrice) * prfRate;

        document.getElementById("totalSale").value = basePrice-totalSale;

    }
</script>
@else
    Only admin can use this feature!<br><br>
    <a href="/">Back</a>
@endif
@endsection