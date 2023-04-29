<?php include("./../../site/themeStart.php"); ?>
<!-- Content -->
<?php include("./../../settings/db.php"); ?>
<?php
// Instancia de la clase conexion de la base de datos
$db = new Db();
// Variable de aplicacion
$variables = new Variables();
// Variable de conexion
$connect = $db->connect;

if ($_POST) {

    print_r($_POST);

    //SE TOMAN LOS DATOS DEL METODO POST
    $correo = (isset($_POST["correo"]) ? $_POST["correo"] : "");
    $username = (isset($_POST["username"]) ? $_POST["username"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");
    $fullname = (isset($_POST["fullname"]) ? $_POST["fullname"] : "");
    $id_rol_usuario = (isset($_POST["id_rol_usuario"]) ? $_POST["id_rol_usuario"] : "");
    $id_estado_usuario = (isset($_POST["id_estado_usuario"]) ? $_POST["id_estado_usuario"] : "");

    //SENTECIA SQL
    $sentencia = $conexion->prepare("INSERT INTO tbl_usuarios (id_usuario, username, password, fullname, correo, id_rol_usuario, id_estado_usuario)
     VALUES (null, :username, :password, :fullname, :correo, :id_rol_usuario, :id_estado_usuario)");

    //asignando los valores del metodo post, del formulario
    $sentencia->bindParam(":id_estado_usuario", $id_estado_usuario);
    $sentencia->bindParam(":id_rol_usuario", $id_rol_usuario);
    $sentencia->bindParam(":username", $username);
    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":fullname", $fullname);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->execute();
    header("Location: index.php");

}


//imprimo la lista
//print_r($lista_table_puesto);

//Estados empleados
try {
    if (isset($conexion)) {
        $sentencia = $conexion->prepare("SELECT id_estado_usuario, nombre_estado FROM `tbl_estados_usuarios`"); //CONSULTA SQL A LA TABLA PUESTOS
        $sentencia->execute(); //EJECUTO EL QUERY
        $lista_table_estado = $sentencia->fetchAll(PDO::FETCH_ASSOC); //CARGO EN UNA VARIABLE LISTA LOS DATOS
        $variables->function_alert_info($lista_table_estado);
    }
} catch (\Throwable $th) {
    $lista_table_estado = [];
    $mesage_error = "Error al ejecutar la consulta para estados de empleado, por favor contacte al administrador.";
    $variables->function_alert_error($mesage_error, $th->getMessage());
}

//Puestos
try {
    if (isset($conexion)) {
        $sentencia = $conexion->prepare("SELECT id_rol_usuario, nombre_rol FROM `tbl_roles_usuarios`"); //CONSULTA SQL A LA TABLA PUESTOS
        $sentencia->execute(); //EJECUTO EL QUERY
        $lista_table_roles = $sentencia->fetchAll(PDO::FETCH_ASSOC); //CARGO EN UNA VARIABLE LISTA LOS DATOS
        $variables->function_alert_info($lista_table_roles);
    }
} catch (\Throwable $th) {
    $lista_table_roles = [];
    $mesage_error = "Error al ejecutar la consulta para puestos de trabajo, por favor contacte al administrador.";
    $variables->function_alert_error($mesage_error, $th->getMessage());
}

?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-3">
                <div class="text-left h3">
                    <b>
                        Crear usuario
                    </b>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fullname" class="form-label">Nombre Personal:</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" aria-describedby="helpId"
                        placeholder="Escriba su correo">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Nombre del usuario:</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
                        placeholder="Nombre del usuario">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Repetir Contraseña:</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
                        placeholder="Password del username">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
                        placeholder="Password del username">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                        placeholder="Escriba su correo">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_rol_usuario" class="form-label">Rol de usuario:</label>
                    <select class="form-select form-select-sm" value="<?= $id_rol_usuario; ?>" name="id_rol_usuario"
                        id="id_rol_usuario" required>
                        <option value="" disabled>Seleccione una opción</option>
                        <!-- Ciclo for each para la tabla puestos -->
                        <?php foreach ($lista_table_roles as $registro) { ?>
                            <?php $select = $registro['id_rol_usuario'] == $id_rol_usuario ? "selected=selected" : ""; ?>
                            <option value="<?= $registro['id_rol_usuario'] ?>" <?= $select ?>>
                                <?= $registro['nombre_rol'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="id_estado_usuario" class="form-label">Estado:</label>
                    <select class="form-select form-select-sm" value="<?= $id_estado_usuario; ?>"
                        name="id_estado_usuario" id="id_estado_usuario" required>
                        <option value="" disabled>Seleccione una opción</option>
                        <!-- Ciclo for each para la tabla puestos -->
                        <?php foreach ($lista_table_estado as $registro) { ?>
                            <?php $select = $registro['id_estado_usuario'] == $id_estado_usuario ? "selected=selected" : ""; ?>
                            <option value="<?= $registro['id_estado_usuario'] ?>" <?= $select ?>>
                                <?= $registro['nombre_estado'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-secondary" href="./" role="button">Cancelar</a>
        </form>


    </div>
</div>

<!-- End Content -->
<?php include("./../../site/themeEnd.php"); ?>