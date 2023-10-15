<?php
include __DIR__ . '/../tbl_user.php';

function getUsers($conn) {
    $sql = "SELECT IdUsers, Username, Password FROM tbl_user";
    $result = $conn->query($sql);

   $users = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = new tbl_user($row["IdUsers"], $row["Username"], $row["Password"]);
        }
    }

    return $users;
}