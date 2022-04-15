<?php
    $servname = "localhost";
    $user = "root";
    $pass = "";
    $db = "eoneshop";
	$conn = mysqli_connect($servname,$user,$pass,$db);
?>
<section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php
                            $pro ='SELECT tbl_products.proID as "proID", tbl_image.imgname as "imgname", tbl_products.name as "name", tbl_category.name as "cname", tbl_products.qty as "qty", tbl_products.price as "price", tbl_discount.discountPerent as "discountPerent", tbl_products.desc as "desc",tbl_products.price - tbl_discount.discountPerent as "saleOff" FROM `tbl_products` INNER JOIN tbl_discount on tbl_products.discountID = tbl_discount.discountID INNER JOIN tbl_image on tbl_products.imgID = tbl_image.imgID INNER JOIN tbl_category on tbl_products.cateID = tbl_category.cateID;';
                            $runpro = mysqli_query($conn,$pro);
                            while($rows = mysqli_fetch_array($runpro))
                            {
                        ?>
                    <div class="col-lg-3">
                    
                        <div class="categories__item set-bg p-3" data-setbg="img/images/<?=$rows['imgname']?>">
                            <button class="btn btn-danger"><?= $rows['name'] ?></button>
                            <button class="btn btn-warning"><strong>Off $<?= number_format($rows['discountPerent'],2) ?></strong></button>
                        </div>
                       
                    </div>
                    <?php
                            }
                        ?>
                </div>
            </div>
        </div>
</section>
