<?php

$GLOBALS = array();
function get_children($connection, $id)
{

    $categories = mysqli_query($connection, "SELECT * FROM `category` WHERE `parent_id` = " . $id . "");
    while ($cat = mysqli_fetch_assoc($categories)) {
        $GLOBALS[] = $cat['id'];
        get_children($connection, $cat['id']);
    }
    return $GLOBALS;
}