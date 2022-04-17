<?php


class KarteikartenStapel
{
    private $sID;
    private $titel;
    private $modul;
    private $karteikartenAnzahl; //wird eventuell nicht benötigt

    public function __construct($sID, $titel, $modul, $karteikartenAnzahl = 0)
    {
        $this->sID = $sID;
        $this->titel = $titel;
        $this->modul = $modul;
        $this->karteikartenAnzahl = $karteikartenAnzahl;
    }


    public function getSID(){
        return $this->sID;
    }

    public function getTitel()
    {
        return $this->titel;
    }

    public function setTitel($titel)
    {
        $this->titel = $titel;
    }

    public function getModul()
    {
        return $this->modul;
    }

    public function setModul($modul)
    {
        $this->modul = $modul;
    }

    public function getKarteikartenAnzahl()
    {
        return $this->karteikartenAnzahl;
    }

    public function neueKarteikarte()
    {
        $this->karteikartenAnzahl += 1;
    }

    public function löscheKarteikarte()
    {
        $this->karteikartenAnzahl -= 1;
    }

    public function __toString()
    {
        return "Stapel :: Titel: ".$this->titel." | Modul: ".$this->modul." | Karteikarten: ".$this->karteikartenAnzahl;
    }

}
