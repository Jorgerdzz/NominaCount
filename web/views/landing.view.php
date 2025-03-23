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
  <main>
      <div class="container">
          <div class="row">
              <div class="col d-flex flex-column align-items-center justify-content-center">
                  <h1>NominaCount</h1>
                  <h2>La mejor aplicacion para gestionar tu empresa</h2>
              </div>
          </div>
          <div class="row">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inicio-sesion">Iniciar sesion</button>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrarse">Registrarse</button>
          </div>
      </div>

      <!-- Modal Inicio Sesion -->
      <div class="modal fade" id="inicio-sesion" tabindex="-1" aria-labelledby="inicio-sesionLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      ...
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal Registro -->
      <div class="modal fade" id="registrarse" tabindex="-1" aria-labelledby="registrarseLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <div class="row">
                          <div class="col-md-4">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          </div>
                          <div class="col-md-6">
                              <div class="d-flex justify-content-center align-items-center">
                                  <div class="col-md-3">
                                      <label for="cif" class="form-label">C.I.F:</label>
                                  </div>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" id="cif" name="cif" aria-describedby="cifHelp">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="d-flex justify-content-center align-items-center">
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="mb-3">
                              <label for="denominacionSocial" class="form-label">Denominación social:</label>
                              <input type="text" class="form-control" id="denominacionSocial" name="denominacionSocial" aria-describedby="denominacionSocialHelp">
                          </div>
                          <div class="mb-3">
                              <label for="nombreComercial" class="form-label">Nombre comercial:</label>
                              <input type="text" class="form-control" id="nombreComercial" name="nombreComercial" aria-describedby="nombreComercialHelp">
                          </div>
                          <div class="mb-3">
                              <label for="direccion" class="form-label">Dirección:</label>
                              <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccionHelp">
                          </div>
                          <div class="mb-3">
                              <div class="d-flex align-items-center">
                                  <div class="col-md-6">
                                      <div class="d-flex justify-content-center align-items-center m-1">
                                          <div class="col-md-3">
                                              <label for="ciudaD" class="form-label">Ciudad:</label>
                                          </div>
                                          <div class="col-md-9">
                                              <input type="text" class="form-control" id="ciudad" name="ciudad" aria-describedby="ciudadHelp">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="d-flex justify-content-center align-items-center m-1">
                                          <div class="col-md-4">
                                              <label for="provincia" class="form-label">Provincia:</label>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="text" class="form-control" id="provincia" name="provincia" aria-describedby="provinciaHelp">
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                          <div class="col-md-4">
                              <label for="cp" class="form-label">C.P:</label>
                              <input type="text" class="form-control" id="cp" name="cp" aria-describedby="cpHelp">
                          </div>
                          <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
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