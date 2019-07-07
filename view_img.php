<?php
require 'includes/config.php';
?>
<!-- templatemo 382 simplex -->
<!--
Simplex Template
http://www.templatemo.com/preview/templatemo_382_simplex
-->
<?php include 'includes/head_crud_panel.php'; ?>
<body>
<div id="container" class="container">
    <?php include 'includes/header.php'; ?>
    <div class="row space30"> <!-- row 1 begins -->
        <?php
        $query = 'select * from image WHERE book_id = ' . $_POST['b_id'] . ';';
        $images = mysqli_query($connection, $query);
        while ($image = mysqli_fetch_assoc($images)) {
            ?>
            <div class="col-xs-6 col-sm-3 d-block w-25" style="border: 1px black solid;">
                    <img src="<?php echo $image['image_path'] ?>" alt="No Image"
                            style="width: 100%"/>
            </div>
            <?php
        }
        ?>
    </div> <!-- /row 1 -->
    <?php include 'includes/footer.php'; ?>
</div> <!-- /container -->
<!-- Bootstrap core JavaScript
=================   ================================= -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
