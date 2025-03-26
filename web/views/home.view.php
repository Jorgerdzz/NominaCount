  <style>
      #particles-js {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: #825abd;
          z-index: -1;
      }
  </style>

  <?php require 'views/partials/head.php'; ?>

  <div id="particles-js"></div>
  <main class="d-flex align-items-center">
      <div class="container">
          <div class="row">
              <div class="col d-flex flex-column align-items-center justify-content-center">
                  <h1>NominaCount</h1>
                  <h2>¡La mejor aplicacion para gestionar tu empresa!</h2>
              </div>
          </div>
          <div class="row m-3">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inicio-sesion">Iniciar sesion</button>
          </div>
          <div class="row m-3">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrarse">Registrarse</button>
          </div>
      </div>

      <!-- Modal Inicio Sesion -->
      <div class="modal fade" id="inicio-sesion" tabindex="-1" aria-labelledby="inicio-sesionLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content" style="background-color: 825abd;">
                  <div class="modal-header" data-bs-theme="dark">
                      <h1 class="modal-title fs-5" id="titulo">Iniciar Sesion</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST">
                          <div class="mb-3">
                              <label for="cifInicioSesion" class="form-label">C.I.F:</label>
                              <input type="text" class="form-control" id="cifInicioSesion" name="cifInicioSesion" aria-describedby="cifHelp">
                          </div>
                          <div class="mb-3">
                              <label for="contraInicioSesion" class="form-label">Contraseña:</label>
                              <input type="password" class="form-control" id="contraInicioSesion" name="contraInicioSesion" aria-describedby="contraHelp">
                          </div>
                          <div class="modal-footer">
                              <div class="d-grid w-100">
                                  <button type="submit" class="btn btn-primary" id="botonInicioSesion" disabled>Confirmar</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal Registro -->
      <div class="modal fade" id="registrarse" tabindex="-1" aria-labelledby="registrarseLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content" style="background-color: 825abd;">
                  <div class="modal-header">
                      <div class="row align-items-center">
                          <div class="col-md-11">
                              <div class="d-flex align-items-center">
                                  <h1 class="modal-title fs-5" id="titulo">Registro de Empresa</h1>
                                  <input type="text" class="form-control w-50 m-2" id="cif" name="cif" aria-describedby="cifHelp" placeholder="C.I.F">
                              </div>
                          </div>
                          <div class="col-md-1" data-bs-theme="dark">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                      </div>
                  </div>
                  <div class="modal-body">
                      <form method="POST">
                          <div class="mb-3">
                              <label for="denominacionSocial" class="form-label">Denominación social:</label>
                              <input type="text" class="form-control" id="denominacionSocial" name="denominacionSocial" aria-describedby="denominacionSocialHelp" placeholder="Ej: El Corte Inglés S.A.">
                          </div>
                          <div class="mb-3">
                              <label for="nombreComercial" class="form-label">Nombre comercial:</label>
                              <input type="text" class="form-control" id="nombreComercial" name="nombreComercial" aria-describedby="nombreComercialHelp" placeholder="Ej: El Corte Inglés">
                          </div>
                          <div class="mb-3">
                              <label for="direccion" class="form-label">Dirección:</label>
                              <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccionHelp" placeholder="Ej: Calle de la Princesa Nº56">
                          </div>
                          <div class="mb-3">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="d-flex align-items-center">
                                          <div class="col-md-3">
                                              <label for="ciudad" class="form-label">Ciudad:</label>
                                          </div>
                                          <div class="col-md-9">
                                              <input type="text" class="form-control" id="ciudad" name="ciudad" aria-describedby="ciudadHelp" placeholder="Ej: Madrid">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="d-flex align-items-center">
                                          <div class="col-md-4">
                                              <label for="provincia" class="form-label">Provincia: </label>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="text" class="form-control" id="provincia" name="provincia" aria-describedby="provinciaHelp" placeholder="Ej: Madrid">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="d-flex align-items-center">
                                          <div class="col-md-3">
                                              <div class="d-flex justify-content-center">
                                                  <label for="cp" class="form-label">C.P:</label>
                                              </div>
                                          </div>
                                          <div class="col-md-9">
                                              <input type="text" class="form-control" id="cp" name="cp" aria-describedby="cpHelp" placeholder="Ej: 28008">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="d-flex align-items-center">
                                          <div class="col-md-4">
                                              <label for="cp" class="form-label">Teléfono:</label>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" placeholder="Ej: 913 567 324">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3">
                              <label for="persona" class="form-label">Persona de contacto:</label>
                              <input type="text" class="form-control" id="persona" name="persona" aria-describedby="personaHelp" placeholder="Ej: Juan Antonio Domínguez">
                          </div>
                          <div class="mb-3">
                              <label for="email" class="form-label">Correo electrónico:</label>
                              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ej: example@gmail.com">
                          </div>
                          <div class="mb-3">
                              <label for="contra" class="form-label">Contraseña:</label>
                              <input type="password" class="form-control" id="contra" name="contra" aria-describedby="contraHelp" placeholder="Introduzca al menos ocho caracteres">
                              <p><small>Para mejorar la fotaleza de la contraseña debe introducir algun numero, mayúscula y caracter especial</small></p>
                              <div id="fuerzaContra" style="height: 5px; width: 0%; background-color: red;" class="rounded mt-1"></div>
                          </div>
                          <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="privacidad" name="privacidad">
                              <label class="form-check-label" for="privacidad">Acepto la política de privacidad</label>
                          </div>
                          <div class="modal-footer">
                              <div class="d-grid w-100">
                                  <button type="submit" class="btn btn-primary" id="botonRegistro" disabled>Registrarse</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </main>

  <?php require 'views/partials/footer.php'; ?>

  <script src="/views/js/particles.min.js"></script>
  <script>
      particlesJS({
          "particles": {
              "number": {
                  "value": 80,
                  "density": {
                      "enable": true,
                      "value_area": 800
                  }
              },
              "color": {
                  "value": "#ffffff"
              },
              "shape": {
                  "type": "circle",
                  "stroke": {
                      "width": 0,
                      "color": "#000000"
                  },
                  "polygon": {
                      "nb_sides": 5
                  },
                  "image": {
                      "src": "img/github.svg",
                      "width": 100,
                      "height": 100
                  }
              },
              "opacity": {
                  "value": 0.5,
                  "random": false,
                  "anim": {
                      "enable": false,
                      "speed": 1,
                      "opacity_min": 0.1,
                      "sync": false
                  }
              },
              "size": {
                  "value": 3,
                  "random": true,
                  "anim": {
                      "enable": false,
                      "speed": 40,
                      "size_min": 0.1,
                      "sync": false
                  }
              },
              "line_linked": {
                  "enable": true,
                  "distance": 150,
                  "color": "#ffffff",
                  "opacity": 0.4,
                  "width": 1
              },
              "move": {
                  "enable": true,
                  "speed": 6,
                  "direction": "none",
                  "random": false,
                  "straight": false,
                  "out_mode": "out",
                  "bounce": false,
                  "attract": {
                      "enable": false,
                      "rotateX": 600,
                      "rotateY": 1200
                  }
              }
          },
          "interactivity": {
              "detect_on": "canvas",
              "events": {
                  "onhover": {
                      "enable": false,
                      "mode": "repulse"
                  },
                  "onclick": {
                      "enable": true,
                      "mode": "push"
                  },
                  "resize": true
              },
              "modes": {
                  "grab": {
                      "distance": 400,
                      "line_linked": {
                          "opacity": 1
                      }
                  },
                  "bubble": {
                      "distance": 400,
                      "size": 40,
                      "duration": 2,
                      "opacity": 8,
                      "speed": 3
                  },
                  "repulse": {
                      "distance": 200,
                      "duration": 0.4
                  },
                  "push": {
                      "particles_nb": 4
                  },
                  "remove": {
                      "particles_nb": 2
                  }
              }
          },
          "retina_detect": true
      })
  </script>