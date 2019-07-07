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
                    <h2>Manage <b>Авторы</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Добавить автора</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Полное имя автора</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $authors = mysqli_query($connection, "SELECT * FROM `author`");
            while ($author = mysqli_fetch_assoc($authors)) {
                ?>
                <tr>
                    <td><?php echo $author['full_name']?></td>
                    <td>
                        <a href="#editEmployeeModal" mydata="<?php echo $author['full_name']?>" id="<?php echo $author['id']?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" id="<?php echo $author['id']?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
            <form action="includes/crud_aurhor.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Полное имя автора</label>
                        <input name="full_name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="add_author">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_aurhor.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Отредактировать</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group hidden">
                        <label>id</label>
                        <input name="edit_id" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Полное имя автора</label>
                        <input name="edit_full_name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save" name="rename_author">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_aurhor.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Удалить автора</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_author_id">
                    <p>Вы уверены что хотите удалить эту запись?</p>
                    <p class="text-warning"><small>Отменить действие будет невозможно.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete" name="delete_author">
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript
=================   ================================= -->
<!-- Placed at the end of the document so the pages load faster -->
<script>
    $(document).ready(function() {
        $('.edit').click(function() {
            var id = this.id;
            var name = $(this).attr("mydata");
            //alert(id);
            $("[name = \"edit_id\"]").val(id);
            $("[name = \"edit_full_name\"]").val(name);
        });
    });
    $(document).ready(function() {
        $('.delete').click(function() {
            var id = this.id;
            //alert(id);
            $("[name = \"del_author_id\"]").val(id);
        });
    });
</script>
</body>
</html>
