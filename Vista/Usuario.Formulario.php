<input type="hidden" name="id" value="<?= isset($ObjetoCreado) ? $ObjetoCreado->getId() : null; ?>">

<div class="form-group">

    <label for="nombre_completo">Nombre Completo</label>
    <input type="text" name="nombre_completo" class="form-control" id="nombre_completo" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getNombre_completo()) : null; ?>" required>

</div>
<div class="form-row">
    <div class="form-group col-md-8">

        <label for="nombre_usuario">Nombre Usuario</label>
        <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getNombre_usuario()) : null; ?>" required>

    </div>

    <?php if (!isset($ObjetoCreado)) { ?>

        <div class="form-group col-md-4">

            <label for="descripcion">Contrase&ntilde;a</label>          
        
            <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" id="ojo-btn" type="button">
                        <i id="ojo-icono" class="bi bi-eye-slash"></i>
                    </button>
                </div>
            </div>

        </div>
    <?php } ?>
</div>
<hr />
<h5> Datos de contacto </h5>

<div class="form-row">
    <div class="form-group col-md-6">

        <label for="mail">Mail</label>
        <input type="text" name="mail" class="form-control" id="mail" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getMail()) : null; ?>">

    </div>

    <div class="form-group col-md-6">

        <label for="whatsapp">Whatsapp</label>
        <input type="text" name="whatsapp" class="form-control" id="whatsapp" aria-describedby="emailHelp" value="<?= isset($ObjetoCreado) ? htmlspecialchars($ObjetoCreado->getWhatsapp()) : null; ?>">

    </div>

</div>


<input type="submit" class="btn btn-success" value="Confirmar" />
<a href="Usuario.Todo.php" class="btn btn-outline-danger"><i class="oi oi-account-logout"> </i> Cancelar </a>