<?php

class THM_Mitglied
{
    var $ID;
    var $Vorname;
    var $Name;
    var $Rolle;
    var $Matrikelnummer;
    var $Mitarbeiternummer;


    public function __construct($ID, $Vorname, $Name, $Rolle, $Matrikelnummer, $Mitarbeiternummer)
    {
        $this->ID = $ID;
        $this->Vorname = $Vorname;
        $this->Name = $Name;
        $this->Rolle = $Rolle;
        $this->Matrikelnummer = $Matrikelnummer;
        $this->Mitarbeiternummer = $Mitarbeiternummer;
    }


}