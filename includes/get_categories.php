<?php
include_once "includes/config.php";
?>
<?php
function get_category($connection, $categories, $level)
{
    $categories = mysqli_query($connection, "SELECT * FROM `category` WHERE `parent_id` = " . $level . "");
    ?>
    <ul id="menu" class="text-decoration-none">
        <?php
        while ($cat = mysqli_fetch_assoc($categories)) {
            ?>
            <li>
                <div class="btn btn-outline-primary">
                    <a href="#" class="btn-outline-success"><?php echo $cat['name']; ?></a>
                    <a href="#editEmployeeModal" class="edit btn btn-outline-success"
                       p_name="<?php echo $cat['name'] ?>"
                       id="<?php echo $cat['id'] ?>" data-toggle="modal"><i class="material-icons"
                                                                            data-toggle="tooltip"
                                                                            title="Edit">&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" class="delete btn btn-outline-success" id="<?php echo $cat['id'] ?>"
                       data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                              title="Delete">&#xE872;</i></a>
                    <a href="#addChildrenModal" class="sub btn btn-outline-success" id="<?php echo $cat['id'] ?>"
                       data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                  title="Add">&#xe03b;</i></a>
                </div>
                <?php

                get_category($connection, $categories, ($cat['id']));

                ?>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}

?>