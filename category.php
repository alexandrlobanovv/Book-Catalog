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
                    <h2>Manage <b>Рубрика</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                        <span>Добавить рубрику</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <?php
            include 'includes/get_categories.php';
            get_category($connection, null, 0);
            ?>
        </table>
    </div>
    <?php include 'includes/footer.php'; ?>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade" style="position: center">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_category.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить рубрику</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Рубрика
                            <input name="add_cat" type="text" class="form-control" required></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="add_category">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_category.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Отредактировать</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group hidden">
                        <label>id
                            <input name="edit_id" type="text" class="form-control" required></label>
                    </div>
                    <div class="form-group">
                        <label>Рубрика
                            <input name="edit_cat" type="text" class="form-control" required></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save" name="edit_category">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_category.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Удалить автора</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_categiry_id">
                    <p>Вы уверены что хотите удалить эту запись?</p>
                    <p class="text-warning">
                        <small>Отменить действие будет невозможно.</small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete" name="delete_category">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add children Modal HTML -->
<div id="addChildrenModal" class="modal fade" style="position: center">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_category.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить подрубрику</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group hidden">
                        <label>id
                            <input name="add_sub_id" type="text" class="form-control" required></label>
                    </div>
                    <div class="form-group">
                        <label>Подрубрика
                            <input name="add_sub_cat" type="text" class="form-control" required></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="add_sub_category">
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
            var name = $(this).attr("p_name");

            //alert(id);
            $("[name = \"edit_id\"]").val(id);
            $("[name = \"edit_cat\"]").val(name);
        });
    });
    $(document).ready(function () {
        $('.delete').click(function () {
            var id = this.id;
            //alert(id);
            $("[name = \"del_categiry_id\"]").val(id);
        });
    });
    $(document).ready(function () {
        $('.sub').click(function () {
            var id = this.id;
            $("[name = \"add_sub_id\"]").val(id);
        });
    });
</script>
</body>
</html>
