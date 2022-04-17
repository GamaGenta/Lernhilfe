<?php


class Karteikarte
{
    private $kID;
    private $titel;
    private static $titelLength = 20;
    private $frage;
    private static $frageLenth = 100;
    private $antwortArt;
    private $antwort;
    private static $antwortLength = 50;
    private $bild;


    public function __construct($kID, $titel, $frage, $antwort, $antwortArt = "text", $bild = null)
    {
        $this->kID = $kID;
        $this->titel = $titel;
        $this->frage = $frage;
        $this->antwort = $antwort;
        $this->antwortArt = $antwortArt;
        $this->bild = $bild;
    }

    public function getKID(){
        return $this->kID;
    }

    public function getTitel(){
        return $this->titel;
    }

    public function getFrage(){
        return $this->frage;
    }

    public function getAntwortArt(){
        return $this->antwortArt;
    }

    public function getAntwort(){
        return $this->antwort;
    }

    public function getBild(){
        return $this->bild;
    }

    public static function getTitelLength(){
        return self::$titelLength;
    }

    public static function getFrageLength(){
        return self::$frageLenth;
    }

    public static function getAntwortLength(){
        return self::$antwortLength;
    }

    public function __toString()
    {
        $antowrt = $this->antwort;
        $frageDaten = "Karte :: Titel: ".$this->titel." | Farge: ".$this->frage." | AntwortArt: ".$this->antwortArt." | ";

        if(is_array($antowrt)){
            $frageDaten.= "Antowrten: ".implode(", ", $antowrt);
        } else {
            $frageDaten.= "Antowrt: ".$antowrt;
        }

        return $frageDaten;
    }

}
?>
