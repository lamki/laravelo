@extends('layout.app')

@section('content')
<h1>User: {{$username}}</h1>
{{-- Header --}}
    <div class="form-group pb-5">
        <label for="name" class="col-lg-4">Name:</label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="name" id="name" value="{{$name}}" disabled>
        </div>
        <label for="name" class="col-lg-3">Department:</label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="name" id="name" value="{{$dept}}" disabled>
        </div>
        <label for="name" class="col-lg-4">Status:</label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="name" id="name" value="{{$stat}}" disabled>
        </div>
    </div>
{{-- End of Header --}}
<h1>Sale Item Input</h1>
{{-- <a href="#" onclick="addField();">Add Row</a> --}}
<h3><a href="#" onclick="addField()">+</a> | <a href="#" onclick="deleteRow(this)">-</a></h3>
<table id="myTable" class="table">
    <tr>
        <th>Item Category</th>
        <th>Item Code</th>
        <th>Item Quantity Sold</th>
        <th>Item Base Price</th>
        <th>Profit Rate</th>
        <th>Total Sale</th>
    </tr>
    <tr>
        <td>
            <select id="category" class="form-control" onchange="updateProfitRate()">
                <option value=" " class="form-control"></option>
                <option value="intl" class="form-control">A -  Medical Equipment</option>
                <option value="local" class="form-control">B - Drugs</option>
            </select>
        </td>
        <td><input type="text" name="itemCd" class="form-control" ></td>
        <td><input type="text" name="itemQty" id="itemQty" class="form-control" onchange="calcTotalSale()"></td>
        <td><input type="text" name="itemBasePrice" id="itemBasePrice" class="form-control" onchange="calcTotalSale()"></td>
        <td><input type="text" name="prfRate" id="prfRate" class="form-control" disabled="disabled"></td>
        <td><input type="text" name="totalSale" id="totalSale" class="form-control" disabled="disabled"></td>
    </tr>

</table>
<input type="submit" value="Submit" class="btn"></button>
@endsection

<script type="text/javascript">
    function addField (argument) {
        var myTable = document.getElementById("myTable");
        var currentIndex = myTable.rows.length;
        var currentRow = myTable.insertRow(-1);

        // itemCat
        var itemCat = document.createElement("select");
        itemCat.setAttribute("id", "category");
        itemCat.setAttribute("class", "form-control");
        itemCat.setAttribute("onchange", "updateProfitRate()");

        var opt = document.createElement("option");
        opt.setAttribute("value", " ");
        opt.setAttribute("value", " ");
        opt.setAttribute("value", " ");

        //itemCd
        var itemCd = document.createElement("input");
        itemCd.setAttribute("name", "keywords" + currentIndex);
        itemCd.setAttribute("class", "form-control");

        //itemQty
        var itemQty = document.createElement("input");
        itemQty.setAttribute("name", "keywords" + currentIndex);
        itemQty.setAttribute("class", "form-control");

        //itemBasePrice
        var itemBasePrice = document.createElement("input");
        itemBasePrice.setAttribute("name", "violationtype" + currentIndex);
        itemBasePrice.setAttribute("class", "form-control");

        //prftRate
        var prftRate = document.createElement("input");
        prftRate.setAttribute("name", "violationtype1" + currentIndex);
        prftRate.setAttribute("class", "form-control");
        prftRate.setAttribute("disabled","disabled");

        //totalSale
        var totalSale = document.createElement("input");
        totalSale.setAttribute("name", "prfRate" + currentIndex);
        totalSale.setAttribute("class", "form-control");
        totalSale.setAttribute("disabled","disabled");



        //Add to table
        var currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(itemCat);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(itemCd);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(itemQty);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(itemBasePrice);
        
        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(prftRate);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(totalSale);
    }

    function deleteRow(btn) {
        document.getElementById("myTable").deleteRow(1);
    }

    function updateProfitRate(){
        var category = document.getElementById("category");
        var prft = document.getElementById("prfRate");

        if(category.value === 'intl'){
            document.getElementById("prfRate").value = "0.35";
        }
        else{
            document.getElementById("prfRate").value = "0.15";
        }
        console.log(category.value);
        this.calcTotalSale();
    }

    function calcTotalSale(){
        var basePrice = document.getElementById("itemBasePrice").value;
        var itemQty = document.getElementById("itemBasePrice").value;
        var prfRate = document.getElementById("prfRate").value;

        console.log(basePrice);
        console.log(itemQty);
        console.log(prfRate);

        var totalSale = (itemQty * basePrice) * prfRate;

        console.log(totalSale);

        document.getElementById("totalSale").value = totalSale;

    }
</script>