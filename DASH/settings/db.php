
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
            $username = $this->variables->usuario;
            $password = $this->variables->clave;
            $port = $this->variables->port;

            $dsn = "mysql:host=$servidor;  port=$port; dbname=$baseDatos";
            $options = [];



            //try to connection from database
            $connect = new PDO($dsn, $username, $password, $options);
            $this->connect = $connect;
        } catch (Exception $th) {
            //    echo $th->getMessage();
            $mesage_error = "Error al conectar con la base de datos, por favor contacte al administrador.";
            $this->variables->function_alert_error($mesage_error, $th->getMessage());
        }
    }


}
?>