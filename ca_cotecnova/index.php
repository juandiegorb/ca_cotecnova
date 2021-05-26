<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link
      href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>
  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img
                src="assets/img/logo_cotecnova.png"
                alt="login"
                class="login-card-img"
              />
            </div>
            <div class="col-md-7"><center>
              <div class="card-body">
                <p class="login-card-description">Sistema de Login</p>
                <form action="POST">
                  <div class="form-group">
                    <label for="documento" class="sr-only">documento</label>
                    <input
                      type="number"
                      name="documento"
                      id="documento"
                      class="form-control"
                      placeholder="Documento"
                    />
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input
                      type="password"
                      name="password"
                      id="password"
                      class="form-control"
                      placeholder="***********"
                    />
                  </div>
                  <div class="form-group">
                    <label>Tipo de usuario: </label>
                    <select name="tipo_usuario_login">
                      <option value="Docente">Docente</option>
                      <option value="Estudiante">Estudiante</option>
                      <option value="Administrador">Administrador</option>
                    </select>
                  </div>
                  <input
                    name="login"
                    id="login"
                    class="btn btn-block login-btn mb-4"
                    type="button"
                    value="Ingresar"
                  />
                </form>
                <a href="#!" class="forgot-password-link"
                  >¿Has olvidado tu contraseña o aun no la tienes?</a
                >
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
              </div>
            </div></center>
          </div>
        </div>
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
