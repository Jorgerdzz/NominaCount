<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NominaCount</title>
    <link rel="stylesheet" href="<?= BASE_PATH; ?>/views/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_PATH; ?>/views/css/landing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #particles-js{
            width: 100%;
            height: 100%;
            background: #825abd;
        }
    </style>
<body>
    <div id="particles-js">

    </div>
    <script src="/views/js/particles.min.js"></script>
    <script>
        particlesJS(
            {
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
            }
        )
    </script>
</body>
</html>