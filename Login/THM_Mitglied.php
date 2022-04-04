<?php

class THM_Mitglied
{
private $uid;
private $rolle;

    public function __construct($uid, $rolle)
    {
        $this->uid = $uid;
        $this->rolle = $rolle;

    }

    public function getUid()
    {
        return $this->uid;
    }
    
    public function getRolle()
    {
        return $this->rolle;
    }


}

?>
