  <style>
      #particles-js {
          position: fixed;
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
      <div class="container text-center">
          <div class="row mb-4">
              <div class="col">
                  <h1 class="display-3">NominaCount</h1>
              </div>
          </div>
          <div class="row mb-4">
              <div class="col">
                  <h2>¡La mejor aplicación para gestionar tu empresa!</h2>
              </div>
          </div>
          <div class="row gap-3 justify-content-center">
              <div class="col-8 col-md-4">
                  <button class="btn btn-lg btn-glow w-100" type="button" data-bs-toggle="modal" data-bs-target="#inicio-sesion">Iniciar sesion</button>
              </div>
              <div class="col-8 col-md-4">
                  <button class="btn btn-lg btn-glow w-100" type="button" data-bs-toggle="modal" data-bs-target="#registrarse">Registrarse</button>
              </div>
          </div>
      </div>
  </main>

  <!-- Modal Inicio Sesion -->
  <div class="modal fade" id="inicio-sesion" tabindex="-1" aria-labelledby="inicio-sesionLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #825abd;">
              <div class="modal-header" data-bs-theme="dark">
                  <h1 class="modal-title fs-5" id="titulo">Iniciar Sesion</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="formularioInicioSesion" method="POST">
                      <div class="mb-3">
                          <label for="emailInicioSesion" class="form-label">Correo electrónico:</label>
                          <input type="text" class="form-control" id="emailInicioSesion" name="emailInicioSesion" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                          <label for="contraInicioSesion" class="form-label">Contraseña:</label>
                          <input type="password" class="form-control" id="contraInicioSesion" name="contraInicioSesion" aria-describedby="contraHelp">
                      </div>
                      <div class="mb-3">
                          <ul class="nav nav-underline">
                              <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#comprobar-email">He olvidado mi contraseña</a>
                          </ul>
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

  <!-- Modal Registro de Empresa -->
  <div class="modal fade" id="registrarse" tabindex="-1" aria-labelledby="registrarseLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #825abd;">
              <form id="formularioRegistro" method="POST">
                  <div class="modal-header" data-bs-theme="dark">
                      <h1 class="modal-title fs-5" id="titulo">Registro de Empresa</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="cif" class="form-label">C.I.F:</label>
                          <input type="text" class="form-control" id="cif" name="cif" placeholder="Ej: B12345678">
                      </div>
                      <div class="mb-3">
                          <label for="denominacion_social" class="form-label">Denominación social:</label>
                          <input type="text" class="form-control" id="denominacion_social" name="denominacion_social" aria-describedby="denominacionSocialHelp" placeholder="Ej: El Corte Inglés S.A.">
                      </div>
                      <div class="mb-3">
                          <label for="nombre_comercial" class="form-label">Nombre comercial:</label>
                          <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" aria-describedby="nombreComercialHelp" placeholder="Ej: El Corte Inglés">
                      </div>
                      <div class="mb-3">
                          <label for="direccion" class="form-label">Dirección:</label>
                          <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccionHelp" placeholder="Ej: Calle Princesa Nº56, Madrid, España">
                      </div>
                      <div class="mb-3">
                          <label for="telefono" class="form-label">Teléfono de contacto:</label>
                          <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" placeholder="Ej: 913 567 324">
                      </div>
                      <div class="mb-3">
                          <label for="correo_empresa" class="form-label">Correo electrónico general:</label>
                          <input type="email" class="form-control" id="correo_empresa" name="correo_empresa" placeholder="Ej: contacto@empresa.com">
                      </div>
                      <div class="mb-3">
                          <label for="logo" class="form-label">Logo de la empresa: (opcional)</label>
                          <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                          <small>Formatos aceptados: JPG, PNG, SVG, WebP. Tamaño máximo: 2MB</small>
                      </div>
                      <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="privacidad" name="privacidad">
                          <label class="form-check-label" for="privacidad">Acepto la <a href="<?= BASE_PATH . '/politica-privacidad'; ?>" style="text-decoration: underline;">política de privacidad</a>.</label>
                      </div>
                      <div class="modal-footer">
                          <div class="d-grid w-100">
                              <button type="submit" class="btn btn-primary" id="botonRegistroEmpresa" disabled>Registrarse</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal Datos del CEO -->
  <div class="modal fade" id="datos-personales" tabindex="-1" aria-labelledby="datos-personalesLabel">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #825abd;">
              <form id="formularioRegistroCEO" method="POST">
                  <div class="modal-header" data-bs-theme="dark">
                      <h1 class="modal-title fs-5">Datos personales y laborales (CEO)</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <!-- Datos personales -->
                      <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre:</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Alberto">
                      </div>
                      <div class="mb-3">
                          <label for="apellidos" class="form-label">Apellidos:</label>
                          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ej: Hernández López">
                      </div>
                      <div class="mb-3">
                          <label for="dni" class="form-label">DNI:</label>
                          <input type="text" class="form-control" id="dni" name="dni" placeholder="Ej: 60954324T">
                      </div>
                      <div class="mb-3">
                          <label for="email_ceo" class="form-label">Correo electrónico (para acceso):</label>
                          <input type="email" class="form-control" id="email_ceo" name="email_ceo" placeholder="Ej: ceo@empresa.com">
                      </div>
                      <div class="mb-3">
                          <label for="contra" class="form-label">Contraseña:</label>
                          <input type="password" class="form-control" id="contra" name="contra" placeholder="Introduzca al menos ocho caracteres">
                          <div id="fuerzaContra" style="height: 5px; width: 0%; background-color: red;" class="rounded mt-1"></div>
                          <small>Incluya números, mayúsculas o símbolos para una contraseña fuerte</small>
                      </div>

                      <!-- Datos laborales -->
                      <div class="mb-3">
                          <label for="num_seguridad_social" class="form-label">Numero seguridad social:</label>
                          <input type="text" class="form-control" id="num_seguridad_social" name="num_seguridad_social" placeholder="Ej: 721660997254" aria-describedby="num_seguridad_socialHelp">
                      </div>
                      <div class="mb-3">
                          <label for="telefono_ceo" class="form-label">Teléfono personal:</label>
                          <input type="text" class="form-control" id="telefono_ceo" name="telefono_ceo" placeholder="Ej: 678 324 677">
                      </div>
                      <div class="mb-3">
                          <label for="fecha_incorporacion" class="form-label">Fecha de incorporación:</label>
                          <input type="date" class="form-control" id="fecha_incorporacion" name="fecha_incorporacion">
                      </div>
                      <div class="mb-3">
                          <label for="categoria_profesional" class="form-label">Categoría profesional:</label>
                          <select class="form-select" name="categoria_profesional" id="categoria_profesional">
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="Ingenieros y Licenciados. Personal de alta dirección">Ingenieros y Licenciados. Personal de alta dirección</option>
                              <option value="Ingenieros Técnicos, Peritos y Ayudantes Titulados">Ingenieros Técnicos, Peritos y Ayudantes Titulados</option>
                              <option value="Jefes Administrativos y de Taller">Jefes Administrativos y de Taller</option>
                              <option value="Ayudantes no titulados">Ayudantes no titulados</option>
                              <option value="Oficiales Administrativos">Oficiales Administrativos</option>
                              <option value="Subalternos">Subalternos</option>
                              <option value="Auxiliares administrativos">Auxiliares administrativos</option>
                              <option value="Oficiales de primera y segunda">Oficiales de primera y segunda</option>
                              <option value="Oficiales de tercera y especialistas">Oficiales de tercera y especialistas</option>
                              <option value="Peones">Peones</option>
                              <option value="Trabajadores menores de dieciocho años">Trabajadores menores de dieciocho años</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="num_hijos" class="form-label">Número de hijos:</label>
                          <input type="number" class="form-control" id="num_hijos" name="num_hijos" min="0">
                      </div>
                      <div class="mb-3">
                          <label for="estado_civil" class="form-label">Estado civil:</label>
                          <select class="form-select" name="estado_civil" id="estado_civil">
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="soltero">Soltero</option>
                              <option value="casado">Casado</option>
                              <option value="divorciado">Divorciado</option>
                              <option value="pareja_hecho">Pareja de hecho</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                      </div>
                      <div class="mb-3">
                          <label for="minusvalia" class="form-label">Minusvalía:</label>
                          <select class="form-select" name="minusvalia" id="minusvalia">
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="Sin discapacidad">Sin discapacidad</option>
                              <option value="Entre el 33% y el 65%">Entre el 33% y el 65%</option>
                              <option value="Igual o superior al 65%">Igual o superior al 65%</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="salario_base" class="form-label">Salario base:</label>
                          <input type="number" class="form-control" id="salario_base" name="salario_base" placeholder="Ej: 3500" min="0">
                      </div>
                      <div class="modal-footer">
                          <div id="mensajeCeo"></div>
                          <div class="d-grid w-100">
                              <button type="submit" class="btn btn-primary" id="botonRegistroCEO">Registrar CEO</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <!-- Modal Comprobar Correo Electrónico -->
  <div class="modal fade" id="comprobar-email" tabindex="-1" aria-labelledby="inicio-sesionLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #825abd;">
              <div class="modal-header" data-bs-theme="dark">
                  <h1 class="modal-title fs-5" id="titulo">Comprobación</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="formularioComprobarCorreo" method="POST">
                      <div class="mb-3">
                          <label for="comprobarEmail" class="form-label">Correo electrónico:</label>
                          <input type="text" class="form-control" id="comprobarEmail" name="comprobarEmail" aria-describedby="comprobarEmailHelp">
                      </div>
                      <div class="modal-footer">
                          <div class="d-grid w-100">
                              <button type="submit" class="btn btn-primary" id="botonComprobarCorreo" disabled>Confirmar</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal Establecer Nueva Contraseña -->
  <div class="modal fade" id="establecer-contra" tabindex="-1" aria-labelledby="inicio-sesionLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #825abd;">
              <div class="modal-header" data-bs-theme="dark">
                  <h1 class="modal-title fs-5" id="titulo">Establecer contraseña</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="formularioEstablecerContra" method="POST">
                      <div class="mb-3">
                          <label for="nueva-contra" class="form-label">Nueva contraseña:</label>
                          <input type="password" class="form-control" id="nueva-contra" name="nueva-contra" placeholder="Introduzca al menos ocho caracteres" aria-describedby="nueva-contraHelp">
                          <div id="fuerzaNuevaContra" style="height: 5px; width: 0%; background-color: red;" class="rounded mt-1"></div>
                          <p><small>Para incrementar la fotaleza de la contraseña debe introducir algún número, mayúscula o caracter especial</small></p>
                      </div>
                      <div class="modal-footer">
                          <div class="d-grid w-100">
                              <button type="submit" class="btn btn-primary" id="botonEstablecerContra" disabled>Confirmar</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <?php require_once 'views/partials/footer.php'; ?>

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