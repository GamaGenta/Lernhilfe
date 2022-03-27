<?php


class Karteikarte
{
    private $titel;
    private static $titelLength = 20;
    private $frage;
    private static $frageLenth = 100;
    private $antwortArt;
    private $antwort;
    private static $antwortLength = 50;
    private $bild;


    public function __construct($titel, $frage, $antwort, $antwortArt , $bild)
    {
        $this->titel = $titel;
        $this->frage = $frage;
        $this->antwort = $antwort;
        $this->antwortArt = $antwortArt;
        $this->bild = $bild;
    }

    public function getTitel(){
        return $this->titel;
    }

    public function setTitel($titel){
        $this->titel = $titel;
    }

    public function getFrage(){
        return $this->frage;
    }

    public function setFrage($frage){
        $this->frage = $frage;
    }

    public function getAntwortArt(){
        return $this->antwortArt;
    }

    public function setAntwortArt($art){
        $this->antwortArt = $art;
    }

    public function getAntwort(){
        return $this->antwort;
    }

    public function setAntwort($antwort){
        $this->antwort = $antwort;
    }

    public function getBild(){
        return $this->bild;
    }

    public function setBild($bild){
        $this->bild = $bild;
    }

    public static function getTitelLength(){
        return self::$titelLenth;
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
