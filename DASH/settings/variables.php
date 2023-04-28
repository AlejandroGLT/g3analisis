<?php

class Variables
{
    public $servidor = "localhost"; //ip
    public $baseDatos = "grupo2"; //dbname
    public $usuario = "root"; //user
    public $clave = ""; //password
    public $url = "http://localhost:8080/g3analisis/DASH";

    public function function_alert_error($message, $error)
    {
        str_replace("'", '"', $error);
        $js_code = 'console.error(' . json_encode($error, JSON_HEX_TAG) . ');';
        // Display the alert box 
        echo "<script> alert('$message'); </script>";
        echo '<script>' . $js_code . '</script>';
    }

    public function function_alert_info($message)
    {
        $js_code = 'console.info(' . json_encode($message, JSON_HEX_TAG) . ');';
        // Display the alert box 
        echo '<script>' . $js_code . '</script>';
    }

}

?>