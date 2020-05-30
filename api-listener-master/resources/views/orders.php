<?php include(app_path().'/../resources/views/includes/header.php'); ?>

    <input type="hidden" id="title" name="pageName" value="orders" />

    <h2>Orders</h2>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>total</th>
            <th>shipping_total</th>
            <th>create_time</th>
            <th>timezone</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach($data as $key => $row) {
           if(!is_int($key)) continue;
            print('
                <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['total'].'</td>
                <td>'.$row['shipping_total'].'</td>
                <td>'.date('d-m-Y H:i:s', $row['create_time']).'</td>
                <td>'.$row['timezone'].'</td>
                </tr>
            ');
        }
        ?>

        </tbody>
    </table>
        </div>
    </div>


<?php include(app_path().'/../resources/views/includes/footer.php'); ?>
