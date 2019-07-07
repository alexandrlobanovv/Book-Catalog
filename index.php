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
        $books = mysqli_query($connection, "select b.id \"id\", b.title \"name\", a.full_name \"author\", c.name \"category\"
                                                            from books b, author a, category c
                                                            where b.author_id = a.id and b.category_id = c.id; ");
        while ($book = mysqli_fetch_assoc($books)) {
            ?>
            <div class="col-xs-6 col-sm-3" style="height: 500px; border: 1px black solid; margin: -2px">
                <?php
                $query = 'select * from image WHERE book_id = ' . $book['id'] . ';';
                $images = mysqli_query($connection, $query);
                $image = mysqli_fetch_assoc($images);
                ?>
                <form action="view_img.php" method="post" class="show">

                        <h4 class=""><strong><?php echo $book['name'] ?></strong></h4>

                        <a href="#"><img
                                    src="<?php echo $image['image_path'] ?>" alt="No Image"
                                    class="img-responsive img-rounded img_bottom" style="max-height: 280px"/></a>
                        <input hidden name="b_id" id="b_id" value="<?php echo $book['id'] ?>">

                        <p><?php echo $book['author'] ?></p>
                        <p><?php echo $book['category'] ?></p>
                        <button class="btn btn-outline-success" type="submit"> Смотреть изображения</button>

                </form>

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
