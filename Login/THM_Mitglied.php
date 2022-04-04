<?php

class THM_Mitglied
{
private $ID;
private $rolle;

    public function __construct($ID, $rolle)
    {
        $this->ID = $ID;
        $this->rolle = $rolle;

    }

    public function getID()
    {
        return $this->ID;
    }
    
    public function getRolle()
    {
        return $this->rolle;
    }


}

?>
