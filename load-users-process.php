<?php

include "connection.php";
session_start();

$rs = Database::search("SELECT * FROM `users` WHERE `user_type_id`='2'");
$num = $rs->num_rows;

for ($x = 0; $x < $num; $x++) {
    $row = $rs->fetch_assoc();

?>

    <tr>
        <td><?php echo ($row["id"]); ?></td>
        <td><?php echo ($row["fname"]); ?></td>
        <td><?php echo ($row["lname"]); ?></td>
        <td><?php echo ($row["email"]); ?></td>
        <td><?php echo ($row["mobile"]); ?></td>
        <td>

            <?php
            if ($row["status"] == 1) {
            ?>
                <button class="btn btn-success w-100">Active</button>
            <?php
            } else {
            ?>
                <button class="btn btn-danger w-100">Deactive</button>
            <?php
            }
            ?>


        </td>
    </tr>

<?php

}
