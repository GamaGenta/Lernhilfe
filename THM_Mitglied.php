<?php

class THM_Mitglied
{
    private var $ID;
    private var $vorname;
    private var $name;
    private var $rolle;

    public function __construct($ID, $vorname, $name, $rolle)
    {
        $this->ID = $ID;
        $this->vorname = $vorname;
        $this->name = $name;
        $this->rolle = $rolle;

    }

    public function getID()
    {
        return $this->ID;
    }


    public function getVorname()
    {
        return $this->vorname;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getRolle()
    {
        return $this->rolle;
    }


}