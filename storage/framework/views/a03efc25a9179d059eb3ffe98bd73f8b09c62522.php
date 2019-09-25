<?php $__env->startSection('content'); ?>
<h1>Sales Entry</h1>

<div class="form-group pb-5">
        <label for="name" class="col-lg-4">Name:</label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="name" id="name" value="<?php echo e(auth()->user()->name); ?>" disabled>
        </div>
        <label for="name" class="col-lg-3">Department:</label>
        <div class="col-lg-8">
            
            <?php if(auth()->user()->dept == 1): ?>
            <input type="text" class="form-control" name="name" id="dept" value="International Sale" disabled>
            <?php else: ?>
            <input type="text" class="form-control" name="name" id="dept" value="Local Sale" disabled>
            <?php endif; ?>
        </div>
        <label for="name" class="col-lg-4">Status:</label>
        <div class="col-lg-8">
            <?php if(auth()->user()->status == 1): ?>
                <input type="text" class="form-control" name="name" id="stat" value="Active" disabled>
            <?php else: ?>
                <input type="text" class="form-control" name="name" id="stat" value="Non-Active" disabled>
            <?php endif; ?>
            
        </div>
    </div>


<?php echo Form::open(['action' => 'SalesController@store', 'method' => 'POST']); ?>

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
              <td><?php echo e(Form::select('itemCat', ['1' => 'Medical Equipment', '2' => 'Drugs'], null, ['id' => 'itemCat', 'class' => 'form-control', 'placeholder' => 'Pick a category...', 'onchange' => 'updateProfitRate()'])); ?></td>
              <td><?php echo e(Form::text('itemCd', '', [ 'id' => 'itemCd', 'class' => 'form-control', 'placeholder' => ' '])); ?></td>
              <td><?php echo e(Form::text('itemQty', '', ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'itemQty', 'onchange' => 'calcTotalSale()'])); ?></td>
              <td><?php echo e(Form::text('itemBasPrice', '', ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'itemBasPrice', 'onchange' => 'calcTotalSale()'])); ?></td>
              <td><?php echo e(Form::text('prftRate', '', ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'prftRate', 'disabled' => 'disabled'])); ?></td>
              <td><?php echo e(Form::text('totalSale', '', ['class' => 'form-control', 'placeholder' => ' ', 'id' => 'totalSale', 'disabled' => 'disabled'])); ?></td>
          </tr>
      </tbody>
  </table>
  <?php echo e(Form::hidden('userId', auth()->user()->id)); ?>

  <?php echo e(Form::hidden('name', auth()->user()->name)); ?>

  <?php echo e(Form::hidden('dept', auth()->user()->dept)); ?>

  <?php echo e(Form::hidden('status', auth()->user()->status)); ?>

<?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary float-right'])); ?>

<?php echo Form::close(); ?>


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/tahi/resources/views/sales/create.blade.php ENDPATH**/ ?>