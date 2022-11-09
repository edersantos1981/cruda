<?php
$MapperSistema = new \Mappers\Sistema();
$ArrayFindAllSistema = $MapperSistema->findAll();
$ColeccionSistema = new \Modelo\SistemaColeccion($ArrayFindAllSistema);
?>

<input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">
<div class="form-group">

    <label for="combobox">Sistema</label>
    <div class="ui-widget">
        <select id="combobox" name="fk_sistema" class="form-control" aria-describedby="emailHelp" required>
            <option <?php if (!isset($ObjetoCreado)) echo "selected" ?>></option>
            <?php foreach ($ColeccionSistema->getColeccion() as $ItemSistema) { ?>
                <option value="<?= $ItemSistema->getId() ?>" <?php if (isset($ObjetoCreado) && ($ObjetoCreado->getFk_sistema() == $ItemSistema->getId())) echo "selected"; ?>><?= $ItemSistema; ?></option>
            <?php } ?>
        </select>
    </div>

</div>
<div class="form-group">

    <label for="descripcion">Descripci&oacute;n</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getDescripcion()) : null; ?>" required>

</div>

<input type="submit" class="btn btn-success" value="Confirmar" />
<a href="Permiso.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>