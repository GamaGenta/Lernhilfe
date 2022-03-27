<?php

class THM_Mitglied
{
    var $ID;
    var $vorname;
    var $name;
    var $rolle;
    var $matrikelnummer;
    var $mitarbeiternummer;

    public function __construct($ID, $vorname, $name, $rolle, $matrikelnummer, $mitarbeiternummer)
    {
        $this->ID = $ID;
        $this->vorname = $vorname;
        $this->name = $name;
        $this->rolle = $rolle;
        $this->matrikelnummer = $matrikelnummer;
        $this->mitarbeiternummer = $mitarbeiternummer;
    }


}