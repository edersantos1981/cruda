<?php include_once __DIR__ . '/../Cruda/Core.Init.php';  ?>
<?php if ($ObjetoEliminado) { ?>
                <p class="alert alert-success">Operaci&oacute;n realizada con &eacute;xito.</p>
                <p>Se ha eliminado correctamente.</p>
                <?php
}?>
                <?php if (!$ObjetoEliminado) { ?>
                <p class="alert alert-danger">Hubo un error</p>
                <p>No fue posible eliminar. Por favor, intente nuevamente. </p>
                <p>Si el problema persiste, contacte
                    el administrador del sistema e informe el siguiente codigo de referencia: <b><?= $th->getCode() ?></b></p>
                <?php
}?>