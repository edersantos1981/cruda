<input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">
<div class="form-group">

    <label for="descripcion">Descripci&oacute;n</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getDescripcion()) : null; ?>" required>

</div>

<input type="submit" class="btn btn-success" value="Confirmar" />
<a href="Cuenta.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>