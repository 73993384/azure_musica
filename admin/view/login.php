<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../assets/img/rattan_logo.png" />
  <title>Rattan Admin</title>
  <link href="assets/css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <!-- SWEETALERT2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body style="background-color: #5DB0E6;">
  <main class="d-flex w-100">
    <div class="container d-flex flex-column">
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">
            <form action="?c=login&a=Iniciar_Sesion&user,password" method="POST">
              <div class="card">
                <div class="card-body">
                  <div class="m-sm-4">
                    <div class="text-center">
                      <img src="assets/img/icons/logo.jpg" alt="" class="img-fluid" width="132" height="132" />
                    </div>
                    <form>
                      <div class="mb-3">
                        <label class="form-label">Usuario</label>
                        <input class="form-control form-control-lg" type="text" name="user" placeholder="Ingrese su Usuario" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Ingrese su Contraseña" />
                      </div>
                      <div class="text-center mb-3">
                        <button type="submit" class="btn btn-lg text-white" style="background-color:black;">INGRESAR</button>
                      </div>
                      <div class="mb-3 text-center">
                        <label class="form-label">Aun no tienes Una Cuenta?</label><br>
                        <button type="button" class="btn btn-sm text-white" style="background-color:black;" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                          REGISTRARSE
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">REGISTRARSE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="index.php?c=login&a=Registrar_Usuario" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre">
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="contraseña1" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="contraseña1" placeholder="Ingrese la Contraseñá">
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="contraseña2" class="form-label">Repetir Contraseña</label>
                  <input type="password" class="form-control" name="contraseña2" placeholder="Ingrese la contraseña de Arriba">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="assets/js/app.js"></script>
  <!-- SWEETALERT2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
</body>

</html>