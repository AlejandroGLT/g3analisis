
<?php
include_once("variables.php");
class DB
{
    public $connect;
    private $variables;

    function __construct()
    {
        $this->variables = new Variables();
        $this->connect();
    }

    function connect()
    {
        try {
            $servidor = $this->variables->servidor;
            $baseDatos = $this->variables->baseDatos;
            $usuario = $this->variables->usuario;
            $clave = $this->variables->clave;
            //try to connection from database
            $connect = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $clave);
            $this->connect = $connect;
        } catch (Exception $th) {
            //    echo $th->getMessage();
            $mesage_error = "Error al conectar con la base de datos, por favor contacte al administrador.";
            $this->variables->function_alert_error($mesage_error, $th->getMessage());
        }
    }


}
?>