<?php
$MapperSistema = new \Mappers\Sistema();
$ColeccionSistema = new \Modelo\SistemaColeccion($MapperSistema->findAll());
?>

<input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">
<div class="form-group">
    <label for="combobox">Sistema</label>
    <div class="ui-widget">
        <select id="combobox" name="fk_sistema" class="form-control" aria-describedby="emailHelp" required>
            <?php foreach ($ColeccionSistema->getColeccion() as $ItemSistema) { ?>
                <option value="<?= $ItemSistema->getId() ?>" <?php if (
                                                                    isset($ObjetoCreado) && ($ObjetoCreado->getFk_sistema() == $ItemSistema->getId())
                                                                )
                                                                    echo "selected"; ?>><?= $ItemSistema; ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">

    <label for="descripcion">Descripci&oacute;n</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getDescripcion()) : null; ?>" required>

</div>
<label for="permisos">Permisos</label>
<div class="form-group" id="permisos">
    <?php foreach ($ColeccionPermisosSistema->getColeccion() as $permiso) { ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?= $permiso->getId(); ?>" id="check<?= $permiso->getId(); ?>">
            <label class="form-check-label" for="check<?= $permiso->getId(); ?>">
                <?php echo $permiso;?>
            </label>
        </div>
    <?php } ?>
</div>

<input type="submit" class="btn btn-success" value="Confirmar" />
<a href="Rol.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>