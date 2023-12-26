<div class="container h-100">
    <p class='text-center text-capitalize fs-3 m-4'>Contacto</p>
    <div class="row h-100 justify-content-center align-items-center flex-column">
        <form class="col-md-4" id="formContacto" method="post">
            <div class="mb-3">
                <label for="nombreUser" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombreUser" name="nombreUser" placeholder="usuario">
            </div>
            <div class="mb-3">
                <label for="correoUser" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" id="correoUser" name="correoUser" placeholder="ejemplo@ejemplo.com">
            </div>
            <div class="mb-3">
                <label for="textoUser" class="form-label">Mensaje</label>
                <textarea class="form-control" id="textoUser" rows="2" name="textoUser"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="contactar_usuario" id="btnContactar">Enviar</button>
        </form>
    </div>
</div>