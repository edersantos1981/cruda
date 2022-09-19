<?php
$MapperCuenta = new \Mappers\Cuenta();
$ArrayFindAllCuenta = $MapperCuenta->findAll();
$ColeccionCuenta = new \Modelo\CuentaColeccion($ArrayFindAllCuenta);
?>

<div class="form-row">

    <input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">
    <div class="form-group col-md-4">
        <label for="combobox">Cuenta</label>
        <div class="ui-widget">
            <select id="combobox" name="fk_cuenta" class="form-control" aria-describedby="emailHelp" required>
                <option <?php if (!isset($ObjetoCreado)) echo "selected" ?>></option>
                <?php foreach ($ColeccionCuenta->getColeccion() as $ItemCuenta) { ?>
                    <option value="<?= $ItemCuenta->getId() ?>" <?php if (isset($ObjetoCreado) && ($ObjetoCreado->getFk_cuenta() == $ItemCuenta->getId())) echo "selected"; ?>><?= $ItemCuenta; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group col-md-8">
        <label for="descripcion">Descripci&oacute;n</label>
        <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getDescripcion()) : null; ?>" required>
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->

    </div>
</div>
<div class="form-row">
    <input type="submit" class="btn btn-success" value="Confirmar" style="margin-right: 4; margin-left: 5;" />
    <a href="Subcuenta.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>
</div>