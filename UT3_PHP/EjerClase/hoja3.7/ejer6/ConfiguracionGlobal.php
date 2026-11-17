<?php
    class ConfiguracionGlobal{
    
        protected static $nombre;
        protected static $version;
        protected static $idioma;

        public static function setNombre($nnombre){
            self::$nombre = $nnombre;
        }

        public static function setVersion($nversion){
            self::$version = $nversion;
        }

        public static function setIdioma($nidioma){
            self::$idioma = $nidioma;
        }

        public static function getNombre(){
            return self::$nombre;
        }

        public static function getVersion(){
            return self::$version;
        }

        public static function getIdioma(){
            return self::$idioma;
        }
    }


    ConfiguracionGlobal::setNombre("Youtube");
    ConfiguracionGlobal::setVersion("1.0");
    ConfiguracionGlobal::setIdioma("Ingles");

    echo ConfiguracionGlobal::getNombre() . "<br>";
    echo ConfiguracionGlobal::getVersion() . "<br>";
    echo ConfiguracionGlobal::getIdioma() . "<br>";

?>