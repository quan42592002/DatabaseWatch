<?php
class tbl_userrole {
    public $Id;
    public $IdRole;
    public $IdUsers;

    public function __construct($Id, $IdRole = null, $IdUsers = null) {
        $this->Id = $Id;
        $this->IdRole = $IdRole;
        $this->IdUsers = $IdUsers;
    }

}
?>