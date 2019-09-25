<?php $__env->startSection('content'); ?>
    <h1>Sales</h1><hr>
    List of sales:
    
    <?php if(count($sales) > 0): ?>
    <table border="1" class="table table-hover">
            <tr>
                <th>Sales Person</th>
                <td>Department</td>
                <td>Item Code</td>
                <td>Item Quantity</td>
                <td>Item Price</td>
                <td>Commision Rate</td>
                <td>Total Sale</td>
                <?php if(auth()->user()->isAdmin == "1"): ?>
                <td>Action</td>
                <?php endif; ?>
            </tr>
        <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($sale->delFlag != 1): ?>  
                <tr>
                    <td><?php echo e($sale->name); ?></td>
                    <td>
                        <?php if($sale->itemCat == "1"): ?>
                            International Sale
                        <?php else: ?>
                            Local Sale
                        <?php endif; ?>    
                    </td>
                    <td><?php echo e($sale->itemCd); ?></td>
                    <td><?php echo e($sale->itemQty); ?></td>
                    <td><?php echo e($sale->itemBasPrc); ?></td>
                    <td><?php echo e($sale->prftRate); ?></td>
                    <td><?php echo e($sale->totalPrice); ?></td>
                    <?php if(auth()->user()->isAdmin == "1"): ?>
                    <td>
                    <a class="btn btn-primary" href="/sales/<?php echo e($sale->id); ?>/edit">Edit</a>
                    <?php echo Form::open(['action' => ['SalesController@destroy', $sale->id], 'method' => 'DELETE', 'class' => 'float-right']); ?>

                        <?php echo e(Form::hidden('method', 'DELETE')); ?>

                        <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

                    <?php echo Form::close(); ?>

                    </td>
                    <?php endif; ?>
                </tr> 
            <?php endif; ?>      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
</table>   
    <br>
    <a href="/sales/create" class="btn btn-info">Click here to add your sale</a>
    <?php endif; ?>
    
    

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/tahi/resources/views/sales/index.blade.php ENDPATH**/ ?>