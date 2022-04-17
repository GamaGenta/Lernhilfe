<?php

class StudentenKarte extends Karteikarte
{
    private $antwortStatus;
    //die Konstanten werden als ersatz für die enumerationen verwendet (= weniger Speicheraufwand als einen String, als Zustand, zu speichern)
    const nicht = null;
    const richtig = 1;
    const falsch = 2;
    const vorherFalsch = 3;

    public function __construct($kID, $titel, $frage, $antwort, $antwortArt = "Text", $antwortStatus = self::nicht, $bild = null)
    {
        parent::__construct($kID, $titel, $frage, $antwort, $antwortArt, $bild);
        $this->antwortStatus = $antwortStatus;
    }

    public function getAntwortStatus()
    {
        return $this->antwortStatus;
    }

    public function setAntwortStatusRichtig()
    {
        $this->antwortStatus = self::richtig;
    }

    public function setAntwortStatusFalsch()
    {
        $this->antwortStatus = self::falsch;
    }

    public function setAntwortStatusVorherFalsch()
    {
        $this->antwortStatus = self::vorherFalsch;
    }

    public function __toString()
    {
        switch ($this->antwortStatus) {
            case 0: return "Studenten".parent::__toString()." | AntwortStaus: nicht";
            case 1: return "Studenten".parent::__toString()." | AntwortStaus: richtig";
            case 2: return "Studenten".parent::__toString()." | AntwortStaus: falsch";
            case 3: return "Studenten".parent::__toString()." | AntwortStaus: vorherFalsch";
        }

    }

}
