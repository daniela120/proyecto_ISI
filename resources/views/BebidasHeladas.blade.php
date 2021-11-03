<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MR COFFE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
        <body id="page-top">
            @extends('layoutmenu')

                @section('content')
            <!-- Producto Grid-->
            <section class="page-section bg-light" id="portfolio">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Bebidas Frias</h2>
                        <h3 class="section-subheading text-muted">.</h3>
                    </div>
                    <div>
                        <h2 class= "section-heading text-uppercase">Granitas frutales</h2> 
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-thumbnail" src="assets\img\producto\GranitaMora.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Granita de Mora</div>
                                    <div class="portfolio-caption-subheading text-muted">Mezcla de moras Refrescante!</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 2-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets\img\producto\GranitaNaranja.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Granita de Naranja</div>
                                    <div class="portfolio-caption-subheading text-muted">Mezcla de Naranja Refrescante!</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">

                            <!-- Portfolio item 3-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets\img\producto\GranitaMango.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Grenita de Mango</div>
                                    <div class="portfolio-caption-subheading text-muted">Mezcla de Mango Refrescante!</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">

                            <!-- Portfolio item 4-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/producto/GranitaPiñaColada.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Granita Piña Colada</div>
                                    <div class="portfolio-caption-subheading text-muted">Mezcla de Piña Colada Refrescante!</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">

                            <!-- Portfolio item 5-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/producto/GranitaTamarindo.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Granita Tamarindo</div>
                                    <div class="portfolio-caption-subheading text-muted">Mezcla de Tamarindo Refrescante!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

            <!--Seccion Iced-->
            <section class="page-section bg-light" id="portfolio">
                <div class="container">
                    <div>
                        <h2 class= "section-heading text-uppercase">Iced</h2> 
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-thumbnail" src="assets\img\BebidasHeladas\TeFrios.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Té Frios</div>
                                    <div class="portfolio-caption-subheading text-muted">Refrescante Natural té Helado</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 2-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets\img\BebidasHeladas\TisanaHeladas.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Tisanas Heladas</div>
                                    <div class="portfolio-caption-subheading text-muted">Refrescante infusion de frutas secas</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">

                            <!-- Portfolio item 3-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets\img\BebidasHeladas\Chai Helado.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Chai Helado</div>
                                    <div class="portfolio-caption-subheading text-muted">Mezcla de especias con dulce y armoa del té</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">

                            <!-- Portfolio item 4-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/BebidasHeladas/MatchaLatteHelada.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Matcha Latte Helada</div>
                                    <div class="portfolio-caption-subheading text-muted">Bebida energizante de hojas de te verde</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">

                            <!-- Portfolio item 5-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/BebidasHeladas/Moo Helado.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Moo Helado</div>
                                    <div class="portfolio-caption-subheading text-muted">Elige el sabor que mas te guste con leche</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>


            <section class="page-section bg-light" id="portfolio">
                <div class="container">
                    <div>
                        <h2 class= "section-heading text-uppercase">Granitas Cremosas</h2> 
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-thumbnail" src="assets\img\BebidasHeladas\GranitaCafe.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Granita de Cafe</div>
                                    <div class="portfolio-caption-subheading text-muted">Refrescante y cremosa bebida de cafe con hielo</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 2-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets\img\BebidasHeladas\Mochaccino.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Mochaccino</div>
                                    <div class="portfolio-caption-subheading text-muted">Mezcla entre Helado y chocolate</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">

                            <!-- Portfolio item 3-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets\img\BebidasHeladas\Frapuchatta.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Frapuchatta</div>
                                    <div class="portfolio-caption-subheading text-muted">Rica y cremosa bebida a base de arroz</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">

                            <!-- Portfolio item 4-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/BebidasHeladas/GranitaCaramelo.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Granita de Caramelo</div>
                                    <div class="portfolio-caption-subheading text-muted">Refrescante cafe con caramelo, coronada con crema</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">

                            <!-- Portfolio item 5-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/BebidasHeladas/CookiesCream.png" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Cookies & Cream</div>
                                    <div class="portfolio-caption-subheading text-muted">Bebida refrescante, suave ycremosa con trozos de galleta</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
@stop
    </body>
</html>