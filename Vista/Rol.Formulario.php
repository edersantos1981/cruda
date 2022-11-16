<?php
$MapperSistema = new \Mappers\Sistema();
$ColeccionSistema = new \Modelo\SistemaColeccion($MapperSistema->findAll());

$Mapper = new \Mappers\Permiso();
$ArrayFindAll = $Mapper->findAll();
$ColeccionPermisos = new \Modelo\PermisoColeccion($ArrayFindAll);
?>

<input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">
<div class="form-group">
    <label for="combobox">Sistema</label>
    <div class="ui-widget">
        <select id="combobox" name="fk_sistema" class="form-control" aria-describedby="emailHelp" required>
            <?php foreach ($ColeccionSistema->getColeccion() as $ItemSistema) { ?>
                <option value="<?= $ItemSistema->getId() ?>" 
                    <?php if (isset($ObjetoCreado) && ($ObjetoCreado->getFk_sistema() == $ItemSistema->getId())) {
                            echo "selected"; 
                            $sistema =  $ItemSistema->getId();
                        }?>><?= $ItemSistema;?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="descripcion">Descripci&oacute;n</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getDescripcion()) : null; ?>" required>
</div>
<hr />
<h4>Permisos</h4>

<script>
    var columnasSinSort = [2];
</script>
<script src="../gui/tablaSort.js"></script>
<table id="csvtable" class="table table-striped table-hover table-responsive-sm table-sm btn-lg">
    <thead>
        <tr class="table-info">
            <th>Sistema</th>
            <th>Permiso</th>
            <th style="width: 20%;">Asignar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ColeccionPermisos->getColeccion() as $Item) {
            if (isset($sistema))
                if ($Item->getFk_sistema() == $sistema) { ?>
                <?php $Item->setSistema($Mapper->findSistemaById($Item->getFk_sistema())); ?>

                <tr>
                    <td><?= $Item->getSistema(); ?></td>
                    <td><?= $Item; ?></td>
                    <td>
                        <input type="checkbox" name="permiso[<?= $Item->getId() ?>]" 
                        <?php
                            if (isset($ArrayFindPermisosRol))
                                foreach ($ArrayFindPermisosRol as $ItemPermisoRol) {
                                    if ($Item->getId() == $ItemPermisoRol["id"]) {
                                        echo "checked";
                                    }
                                } ?>>
                    </td>
                </tr>
            <?php } ?>
            <?php if (!isset($sistema)) { ?>
                <?php $Item->setSistema($Mapper->findSistemaById($Item->getFk_sistema())); ?>

                <tr>
                    <td><?= $Item->getSistema(); ?></td>
                    <td><?= $Item; ?></td>
                    <td>
                        <input type="checkbox" name="permiso[<?= $Item->getId() ?>]">
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>

<input type="submit" class="btn btn-success" value="Confirmar" />
<a href="Rol.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>