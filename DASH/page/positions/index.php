<?php include("./../../site/themeStart.php"); ?>
<!-- Content -->
<?php include("./../../settings/db.php"); ?>
<?php
// Instancia de la clase conexion de la base de datos
$db = new Db();
// Variable de conexion
$connect = $db->connect;
// Query para obtener el rol del usuario
$sqlRole = "SELECT name_role FROM tbl_role WHERE tbl_users.id_role = tbl_role.id_role limit 1";
// Query para obtener el cargo del usuario
$sqlPosition = "SELECT positions_name FROM tbl_positions WHERE tbl_users.id_positions  = tbl_positions.id_positions limit 1";
// Query para obtener los datos de los usuarios
$sqlQuery = "SELECT *, ($sqlRole) as role, ($sqlPosition) as positions FROM `tbl_users`";
//PREPARO EL QUERY
$sentencia = $connect->prepare($sqlQuery);
//EJECUTO EL QUERY
$sentencia->execute();
//CARGO EN UNA VARIABLE LISTA LOS DATOS
$data = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-3">
                <div class="text-left h3">
                    <b>
                        POSICIONES
                    </b>
                </div>
            </div>
            <div class="col">
                <div class="text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered border-primary">
                <thead class="table-info">
                    <tr>
                        
                        <th scope="col">IDPosicion</th>
                        <th scope="col">Posicion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $item) { ?>
                        <tr>
                            <th scope="row">
                                <?= $item['id_positions']; ?>
                            </th>
                            <td>
                                <?= $item['username']; ?>
                            </td>
                            <td>
                                <?= $item['email']; ?>
                            </td>
                            <td>
                                <?= $item['positions']; ?>
                            </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- End Content -->
<?php include("./../../site/themeEnd.php"); ?>