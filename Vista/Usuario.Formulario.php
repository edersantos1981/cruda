
<input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">
<div class="form-group">

<label for="descripcion">Nombre Usuario</label>
    <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getNombre()) : null; ?>" required>



    <label for="descripcion">Password</label>
    <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getPassword()) : null; ?>" required>

</div>

<input type="submit" class="btn btn-success" value="Confirmar" />
<a href="Usuario.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>