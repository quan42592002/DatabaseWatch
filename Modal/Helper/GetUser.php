<?php
include __DIR__ . '/SetUser.php';
class GetUser
{
    public $IdUsers;
    public $Username;
    public $Password;
    public $Email;
    public $Create_Date;
    public $MaPin;
    public $CauHoiBaoMat;
    public $CauTraLoi;
    public $CountPassworld;
    public $IdRole;

    public function getUsers()
    {
        $users = new SetUser;
        $this->IdUsers = $users->IdUsers;
        $this->Username = $users->Username;
        $this->Password = $users->Password;
        $this->Email = $users->Email;
        $this->Create_Date = $users->Create_Date;
        $this->MaPin = $users->MaPin;
        $this->CauHoiBaoMat = $users->CauHoiBaoMat;
        $this->CauTraLoi = $users->CauTraLoi;
        $this->CountPassworld = $users->CountPassworld;
        $this->IdRole = $users->IdRole;
    }
}

?>


<!-- <?php
        // include __DIR__ . '/../tbl_user.php';

        // function getUsers($conn) {
        //     $sql = "SELECT IdUsers, Username, Password FROM tbl_user";
        //     $result = $conn->query($sql);

        //    $users = array();

        //     if ($result->num_rows > 0) {
        //         while ($row = $result->fetch_assoc()) {
        //             $users[] = new tbl_user($row["IdUsers"], $row["Username"], $row["Password"]);
        //         }
        //     }

        //     return $users;
        // }
        ?> -->