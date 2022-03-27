<?php


class DozentenQuiz extends KarteikartenStapel
{
    private $antwortQutoe = array("richtig"=>0, "falsch"=>0);
    private $frequentierung = array();
    private $öffentlich;

    public function __construct($titel, $modul, $karteikartenAnzahl = 0, $richtigeAntworten = 0, $falscheAntworten = 0, $frequentierung = null, $öffentlich = false)
    {
        parent::__construct($titel, $modul, $karteikartenAnzahl);
        $this->antwortQutoe["richtig"] = $richtigeAntworten;
        $this->antwortQutoe["falsch"] = $falscheAntworten;
        $this->frequentierung = $frequentierung;
        $this->öffentlich = $öffentlich;
    }

    public function getAntwortQutoe()
    {
        return $this->antwortQutoe;
    }

    public function getFrequentierung()
    {
        return $this->frequentierung;
    }

    public function frequentierungErhöhen()
    {
        date_default_timezone_set("Europe/Berlin");
        $timestamp = time();
        $datum = date("d.m.Y",$timestamp);
        $this->frequentierung[$datum] += 1;
    }

    public function getÖffentlich()
    {
        return $this->öffentlich;
    }

    public function setÖffentlich()
    {
        $this->öffentlich = true;
    }

    public function setPrivat()
    {
        $this->öffentlich = false;
    }

    public function __toString()
    {
        date_default_timezone_set("Europe/Berlin");
        $timestamp = time();
        $datum = date("d.m.Y",$timestamp);
        return parent::__toString()." | Quote[richtig=>".$this->antwortQutoe["richtig"]."; falsch=>".$this->antwortQutoe["falsch"]."] | Frequentierung heute: ".$this->frequentierung[$datum]." | öffenlich: ".$this->öffentlich;
    }

}
