<?php

class THM_Mitglied
{
    var $ID;
    var $Vorname;
    var $Name;
    var $Rolle;
    var $Matrikelnummer;
    var $Mitarbeiternummer;


    public function getID()
    {
        return $this->ID;
    }


    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getVorname()
    {
        return $this->Vorname;
    }


    public function setVorname($Vorname)
    {
        $this->Vorname = $Vorname;
    }


    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }


    public function getRolle()
    {
        return $this->Rolle;
    }


    public function setRolle($Rolle)
    {
        $this->Rolle = $Rolle;
    }


    public function getMatrikelnummer()
    {
        return $this->Matrikelnummer;
    }


    public function setMatrikelnummer($Matrikelnummer)
    {
        $this->Matrikelnummer = $Matrikelnummer;
    }


    public function getMitarbeiternummer()
    {
        return $this->Mitarbeiternummer;
    }

  
    public function setMitarbeiternummer($Mitarbeiternummer)
    {
        $this->Mitarbeiternummer = $Mitarbeiternummer;
    }


}