<input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() :null; ?>">
<div class="form-group">
    <label for="descripcion">Descripci&oacute;n</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getDescripcion()) : null; ?>" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
</div>

<input type="submit" class="btn btn-success" value="Confirmar" />
<a href="UnidadMedida.Todo.php" class = "btn btn-outline-danger" ><i class = "oi oi-account-logout"> </i> Cancelar </a>