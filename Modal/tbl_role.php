<?php
class tbl_role {
    public $IdRole;
    public $NameRole;

    public function __construct($IdRole, $NameRole = null) {
        $this->IdRole = $IdRole;
        $this->NameRole = $NameRole;
    }

}

?>