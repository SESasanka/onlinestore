<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Mobile</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>

        <?php

        include "connection.php";

        $page = 1;
        if (isset($_GET["page"]) && $_GET["page"] > 1) {
            $page = $_GET["page"];
        }

        $rs = Database::search("SELECT * FROM `users` WHERE `user_type_id`='2'");
        $num = $rs->num_rows;


        $resultPerPage = 5;
        $onOfPage = ceil($num / $resultPerPage);
        $pageResults = ($page - 1) * $resultPerPage;

        $rs2 = Database::search("SELECT * FROM `users` WHERE `user_type_id`='2' LIMIT $resultPerPage OFFSET $pageResults");
        $num2 = $rs2->num_rows;


        for ($x = 0; $x < $num2; $x++) {
            $row = $rs2->fetch_assoc();

        ?>

            <tr>
                <td><?php echo ($row["id"]); ?></td>
                <td><?php echo ($row["fname"]); ?></td>
                <td><?php echo ($row["lname"]); ?></td>
                <td><?php echo ($row["email"]); ?></td>
                <td><?php echo ($row["mobile"]); ?></td>
                <td>

                    <?php
                    if ($row["status"] == '1') {
                    ?>
                        <button class="btn btn-success w-100" onclick="changeUserStatus(<?php echo($row['id']); ?>, 0);">Active</button>
                    <?php
                    } else {
                    ?>
                        <button class="btn btn-danger w-100" onclick="changeUserStatus(<?php echo($row['id']); ?>, 1);">Deactive</button>
                    <?php
                    }
                    ?>


                </td>
            </tr>

        <?php

        }

        ?>
    </tbody>
</table>

<nav aria-label="mt-3">
    <ul class="pagination  justify-content-center">

        <li class="page-item">
            <a class="page-link" aria-label="Previous" <?php if ($page > 1) { ?> onclick="loadUsers(<?php echo ($page - 1) ?>);" <?php }  ?>>
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <?php
        for ($i = 1; $i <= $onOfPage; $i++) {
            if ($i == $page) {
        ?>
                <li class="page-item active"><a class="page-link" onclick="loadUsers(<?php echo ($i); ?>)"><?php echo ($i); ?></a></li>
            <?php
            } else {
            ?>
                <li class="page-item"><a class="page-link" onclick="loadUsers(<?php echo ($i); ?>)"><?php echo ($i); ?></a></li>
        <?php
            }
        }
        ?>


        <li class="page-item">
            <a class="page-link" aria-label="Next" <?php if ($page < $onOfPage) { ?> onclick="loadUsers(<?php echo ($page + 1) ?>);" <?php }  ?>>
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>

    </ul>
</nav>