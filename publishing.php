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
                    <h2>Manage <b>Издательство</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                        <span>Добавить издательство</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Издательство</th>
                <th>Адрес</th>
                <th>Телефон</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $publishing = mysqli_query($connection, "SELECT * FROM `publishing`");
            while ($publish = mysqli_fetch_assoc($publishing)) {
                ?>
                <tr>
                    <td><?php echo $publish['name'] ?></td>
                    <td><?php echo $publish['address'] ?></td>
                    <td><?php echo $publish['phone'] ?></td>
                    <td>
                        <a href="#editEmployeeModal" p_name="<?php echo $publish['name'] ?>"
                           p_address="<?php echo $publish['address'] ?>" p_phone="<?php echo $publish['phone'] ?>"
                           id="<?php echo $publish['id'] ?>" class="edit" data-toggle="modal"><i class="material-icons"
                                                                                                 data-toggle="tooltip"
                                                                                                 title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" id="<?php echo $publish['id'] ?>" class="delete"
                           data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                  title="Delete">&#xE872;</i></a>
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
            <form action="includes/crud_publishign.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить издательство</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Издательство
                            <input name="add_name" type="text" class="form-control" required></label>
                    </div>
                    <div class="form-group">
                        <label>Адрес
                            <input name="add_address" type="text" class="form-control" required></label>
                    </div>
                    <div class="form-group">
                        <label>Телефон
                            <input name="add_phone" type="text" class="form-control" required></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="add_publish">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_publishign.php" method="post">
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
                        <label>Издательство
                            <input name="edit_name" type="text" class="form-control" required></label>
                    </div>
                    <div class="form-group">
                        <label>Адрес
                            <input name="edit_address" type="text" class="form-control" required></label>
                    </div>
                    <div class="form-group">
                        <label>Телефон
                            <input name="edit_phone" type="text" class="form-control" required></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save" name="edit_publish">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="includes/crud_publishign.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Удалить автора</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_publish_id">
                    <p>Вы уверены что хотите удалить эту запись?</p>
                    <p class="text-warning">
                        <small>Отменить действие будет невозможно.</small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete" name="delete_publish">
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
            var address = $(this).attr("p_address");
            var phone = $(this).attr("p_phone");
            //alert(id);
            $("[name = \"edit_id\"]").val(id);
            $("[name = \"edit_name\"]").val(name);
            $("[name = \"edit_address\"]").val(address);
            $("[name = \"edit_phone\"]").val(phone);
        });
    });
    $(document).ready(function () {
        $('.delete').click(function () {
            var id = this.id;
            //alert(id);
            $("[name = \"del_publish_id\"]").val(id);
        });
    });
</script>
</body>
</html>
