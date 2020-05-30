<?php include(app_path().'/../resources/views/includes/header.php'); ?>

        <input type="hidden" id="title" name="pageName" value="products" />

        <h2>Products</h2>

        <div class="row">
            <?php
            $step = 1;

                foreach ($data as $key => $row) {
                    if(!is_int($key)) continue;
                    print('
                <div class="col-sm-4">
                    <div class="mc-el-wrapper">
                        <div>
                            <img  src="data:' . $row['image'] . '" width="250px" height="250px">
                         </div>
                          <div>
                            <div class="mc-el-info">' . $row['SKU'] . '</div>
                         </div>
                          <div>
                            <div class="mc-el-info">' . $row['title'] . '</div>
                         </div>
                    </div>
                </div>

                ');

                    if ($step % 3 == 0) {

                        print('
                    </div>
                    <div>&nbsp;</div>
                    <div class="row">
                    ');
                    }

                    $step++;
                }
            ?>
        </div>


<?php include(app_path().'/../resources/views/includes/footer.php'); ?>