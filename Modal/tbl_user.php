<?php
class tbl_user {
    public $IdUsers;
    public $Username;
    public $Password;
    public $Email;
    public $Create_Date;
    public $MaPin;
    public $CauHoiBaoMat;
    public $CauTraLoi;
    public $CountPassworld;

    public function __construct($IdUsers, $Username = null, $Password = null, $Email = null, 
    $Create_Date = null, $MaPin = null, $CauHoiBaoMat  = null,$CauTraLoi = null,$CountPassworld = null) {
        $this->IdUsers = $IdUsers;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->Email = $Email;
        $this->Create_Date = $Create_Date;
        $this->MaPin = $MaPin;
        $this->CauHoiBaoMat = $CauHoiBaoMat;
        $this->CauTraLoi = $CauTraLoi;
        $this->CountPassworld = $CountPassworld;
    }

    
}

?>