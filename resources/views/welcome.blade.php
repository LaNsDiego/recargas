<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Autenticar</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/niceadmin.css">
        <link rel="stylesheet" href="/css/bootstrap-icons.min.css">

        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/niceadmin.js"></script>

    </head>
    <body class="antialiased">
        <main>
            <div class="container">

              <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                      <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                          <img src="/logo.png" alt="">
                          <span class="d-none d-lg-block">Recargas</span>
                        </a>
                      </div><!-- End Logo -->

                      <div class="card mb-3">

                        <div class="card-body">

                          <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Iniciar sesión</h5>
                            <p class="text-center small">Ingresar con asesor1@kurax.dev y 123123 para loguearte </p>
                          </div>

                          <form class="row g-3 needs-validation" novalidate action="/login" method="POST">
                            @csrf
                            <div class="col-12">
                              <label for="email" class="form-label">Correo electrónico</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" name="email" class="form-control" id="email" required>
                                <div class="invalid-feedback">Please enter your email.</div>
                              </div>
                            </div>

                            <div class="col-12">
                              <label for="password" class="form-label">Contraseña</label>
                              {{-- <input type="password" name="password" class="form-control" id="password" required>
                              <div class="invalid-feedback">Please enter your password!</div> --}}
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend2">
                                    <i class="bi bi-key-fill"></i>
                                </span>
                                <input type="password" name="password" class="form-control" id="password" required>
                                <div class="invalid-feedback">Please enter your password.</div>
                              </div>
                            </div>

                            {{-- <div class="col-12">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                              </div>
                            </div> --}}
                            <div class="col-12">
                              <button class="btn btn-primary w-100" type="submit">Iniciar sesión</button>
                            </div>

                          </form>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </section>

            </div>
          </main><!-- End #main -->
</html>
