<?php
class DB
{
    private $servidor = "localhost"; //ip
    private $baseDatos = "logistic"; //dbname
    private $usuario = "root"; //user
    private $clave = ""; //password
    public $conexion;

    function function_alert_error($message, $error)
    {
        str_replace("'", '"', $error);
        $js_code = 'console.error(' . json_encode($error, JSON_HEX_TAG) . ');';
        // Display the alert box 
        echo "<script> alert('$message'); </script>";
        echo '<script>' . $js_code . '</script>';
    }

    function function_alert_info($message)
    {
        $js_code = 'console.info(' . json_encode($message, JSON_HEX_TAG) . ');';
        // Display the alert box 
        echo '<script>' . $js_code . '</script>';
    }

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            $servidor = $this->servidor;
            $baseDatos = $this->baseDatos;
            $usuario = $this->usuario;
            $clave = $this->clave;
            //try to connection from database
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $clave);
            $this->conexion = $conexion;
        } catch (Exception $th) {
            //    echo $th->getMessage();
            $mesage_error = "Error al conectar con la base de datos, por favor contacte al administrador.";
            $this->function_alert_error($mesage_error, $th->getMessage());
        }
    }


}
?>