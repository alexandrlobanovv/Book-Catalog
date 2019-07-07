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


    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Книги</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                        <span>Добавить книгу</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Автор</th>
                <th>Издано</th>
                <th>Издание</th>
                <th>Рубрика</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $books = mysqli_query($connection, "select b.id \"id\", b.title \"name\", b.issued \"issued\", p.id \"publish_id\", p.name \"publish\", a.id \"author_id\", a.full_name \"author\", c.name \"category\", c.id \"category_id\"
                                                            from books b, author a, category c, publishing p
                                                            where b.author_id = a.id and b.category_id = c.id and b.publishing_id = p.id");
            while ($book = mysqli_fetch_assoc($books)) {
                ?>
                <tr>
                    <td><?php echo $book['name']?></td>
                    <td><?php echo $book['author'] ?></td>
                    <td><?php echo $book['issued'] ?></td>
                    <td><?php echo $book['publish'] ?></td>
                    <td><?php echo $book['category'] ?></td>
                    <td>
                        <a href="#editEmployeeModal"
                           data_title="<?php echo $book['name']?>"
                           data_a_id="<?php echo $book['author_id']?>"
                           data_issued="<?php echo $book['issued']?>"
                           data_p_id="<?php echo $book['publish_id']?>"
                           data_c_id="<?php echo $book['category_id']?>"
                           id="<?php echo $book['id']?>" class="edit" data-toggle="modal"><i class="material-icons"
                                                                                              data-toggle="tooltip"
                                                                                              title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" id="<?php echo $book['id']?>" class="delete"
                           data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                  title="Delete">&#xE872;</i></a>
                        <a href="#addImageModal" id="<?php echo $book['id']?>" class="add_image"
                           data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                  title="Add image">&#xe39d;</i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php include 'includes/footer.php'; ?>

</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade" style="position: center">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_book.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить книгу</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Название
                            <input name="add_title" type="text" class="form-control" required></label>
                        <label>Выберите автора:
                            <select name="add_author" class="form-control" id="sel1">
                                <?php
                                $authors = mysqli_query($connection, "SELECT * FROM `author`");
                                while ($author = mysqli_fetch_assoc($authors)) {
                                    ?>
                                        <option value="<?php echo $author['id']?>"><?php echo $author['full_name']?></option>
                                    <?php
                                }
                                ?>
                            </select></label>
                        <label>Год издания:
                            <input name="add_issue" type="text" class="form-control" required></label>
                        <label>Издательство
                            <select name="add_publishing" class="form-control" id="sel1">
                                <?php
                                $publishing = mysqli_query($connection, "SELECT * FROM `publishing`");
                                while ($publish = mysqli_fetch_assoc($publishing)) {
                                    ?>
                                    <option value="<?php echo $publish['id']?>"><?php echo $publish['name']?></option>
                                    <?php
                                }
                                ?>
                            </select></label>
                        <label>Рубрика
                            <select name="add_category" class="form-control" id="sel1">
                                <?php
                                $category = mysqli_query($connection, "SELECT * FROM `category`");
                                while ($cat = mysqli_fetch_assoc($category)) {
                                    ?>
                                    <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                    <?php
                                }
                                ?>
                            </select></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="add_book">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_book.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Отредактировать</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="hidden">Id
                            <input name="edit_id" type="text" class="form-control" required></label>
                        <label>Название
                            <input name="edit_title" type="text" class="form-control" required></label>
                        <label>Выберите автора:
                            <select name="edit_author" class="form-control" id="sel1">
                                <?php
                                $authors = mysqli_query($connection, "SELECT * FROM `author`");
                                while ($author = mysqli_fetch_assoc($authors)) {
                                    ?>
                                    <option value="<?php echo $author['id']?>"><?php echo $author['full_name']?></option>
                                    <?php
                                }
                                ?>
                            </select></label>
                        <label>Год издания:
                            <input name="edit_issue" type="text" class="form-control" required></label>
                        <label>Издательство
                            <select name="edit_publishing" class="form-control" id="sel1">
                                <?php
                                $publishing = mysqli_query($connection, "SELECT * FROM `publishing`");
                                while ($publish = mysqli_fetch_assoc($publishing)) {
                                    ?>
                                    <option value="<?php echo $publish['id']?>"><?php echo $publish['name']?></option>
                                    <?php
                                }
                                ?>
                            </select></label>
                        <label>Рубрика
                            <select name="edit_category" class="form-control" id="sel1">
                                <?php
                                $category = mysqli_query($connection, "SELECT * FROM `category`");
                                while ($cat = mysqli_fetch_assoc($category)) {
                                    ?>
                                    <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                    <?php
                                }
                                ?>
                            </select></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save" name="edit_book">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_book.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Удалить автора</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_id">
                    <p>Вы уверены что хотите удалить эту запись?</p>
                    <p class="text-warning">
                        <small>Отменить действие будет невозможно.</small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete" name="delete_book">
                </div>
            </form>
        </div>
    </div>

</div>
<!-- Add image Modal HTML -->
<div id="addImageModal" class="modal fade" style="position: center">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_book.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить фото</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input hidden name="id">
                        <label>Выберите фото
                            <input name="upload_file" type="file" class="form-control" size='10' required></label>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="add_img">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
=================   ================================= -->
<!-- Placed at the end of the document so the pages load faster -->
<script>
    $(document).ready(function () {
        $('.edit').click(function () {
            var id = this.id;
            var title = $(this).attr("data_title");
            var a_id = $(this).attr("data_a_id");
            var issued = $(this).attr("data_issued");
            var p_id = $(this).attr("data_p_id");
            var c_id = $(this).attr("data_c_id");
            //alert(id);
            $("[name = \"edit_id\"]").val(id);
            $("[name = \"edit_title\"]").val(title);
            $("[name = \"edit_author\"]").val(a_id);
            $("[name = \"edit_issue\"]").val(issued);
            $("[name = \"edit_publishing\"]").val(p_id);
            $("[name = \"edit_category\"]").val(c_id);
        });
    });
    $(document).ready(function () {
        $('.delete').click(function () {
            var id = this.id;
            //alert(id);
            $("[name = \"del_id\"]").val(id);
        });
    });
    $(document).ready(function () {
        $('.add_image').click(function () {
            var id = this.id;
            //alert(id);
            $("[name = \"id\"]").val(id);
        });
    });
</script>
</body>
</html>
