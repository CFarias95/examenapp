<?php

if (isset($_SESSION['login_user'])) {
    function listar($sql, $etiqueta1, $etiqueta2, $etiqueta3,$etiqueta4)
    {
        include('conexion.php');
        $res = mysqli_query($con, $sql);
        if ($res == false) {
            ?>
            <script>
                alert('No Hay datos para Mostrar');
            </script>
        <?php
        } else {
            ?>
            <div class="col-sm table-responsive" style="text-align:center;">
                <h5 class="card-title">Reporte</h5>
                <table border="1" align="center">
                    <thead bgcolor="#FF9C33">
                        <tr>
                            
                            <th><?php echo $etiqueta1 ?></th>
                            <th><?php echo $etiqueta2 ?></th>
                            <th><?php echo $etiqueta3 ?></th>
                            <th><?php echo $etiqueta4 ?></th>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <tr bgcolor="#ffc98f">
                            
                            <td><?php echo $row[$etiqueta1] ?></td>
                            <td><?php echo $row[$etiqueta2] ?></td>
                            <td><?php echo $row[$etiqueta3] ?></td>
                            <td><?php echo $row[$etiqueta4] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>            
            </div>
        <?php
        }
    }
}