<?php

require_once "class/MySQL.php";

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT factura.fecha, factura.numero, factura.tipo, "
            . "SUM(df.cantidad * df.precio) as total "
            . "FROM factura "
            . "INNER JOIN detallefactura as df ON df.id_factura = factura.id "
            . "WHERE factura.fecha BETWEEN '$fechaDesde' AND '$fechaHasta' "
            . "GROUP BY factura.id";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
    }
}

//echo $datos->num_rows;
//echo "<br><br>";

//highlight_string(var_export($datos, true));
//exit;

?>

<html>
    <head></head>
    <body>
        <div align='center'>
            <form method='GET'>
                Desde: <input type='date' name='txtFechaDesde'>
                &nbsp;&nbsp;
                Hasta: <input type='date' name='txtFechaHasta'>
                <br><br>
                <input type='submit' value='Consultar'>
            </form>

            <?php if (!is_null($datos)): ?>
                <table border=1 width="80%">
                    <tr>
                        <th>Fecha</th>
                        <th>Numero</th>
                        <th>Tipo de Factura</th>
                        <th>Total</th>
                    </tr>
                    <?php while($row = $datos->fetch_assoc()): ?>
                        <tr>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['numero'] ?></td>
                        <td><?php echo $row['tipo'] ?></td>
                        <td><?php echo $row['total'] ?></td>
                        </tr>
                    <?php endwhile ?>
                </table>
            <?php endif ?>
        </div>

    </body>
</html>