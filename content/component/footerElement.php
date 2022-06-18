<?php

namespace content\component;

class footerElement{

    static public function Footer(){
        echo (
        '   <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4 bg-info">
                <!-- Left -->
                <div class="me-5">
                    <span class="default">Mantente conectado con nosotros en las redes sociales</span>
                </div>
                <!-- Left -->
        
                <!-- Right -->
                <div>
                    <a href="" class="text-decoration-none default me-4">
                    <i class="bi bi-facebook"></i>
                    </a>
                    <a href="" class="text-decoration-none default me-4">
                    <i class="bi bi-twitter"></i>
                    </a>
                    <a href="" class="text-decoration-none default me-4">
                    <i class="bi bi-google"></i>
                    </a>
                    <a href="" class="text-decoration-none default me-4">
                    <i class="bi bi-instagram"></i>
                    </a>
                    <a href="" class="text-decoration-none default me-4">
                    <i class="bi bi-linkedin"></i>
                    </a>
                </div>
                <!-- Right -->        
            </section>
            <!-- Section: Social media -->
        
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">Tienda Casa Carlina</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                            ¡Tu tiendita de confianza!
                            </p>
                        </div>
                        <!-- Grid column -->
        
                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Dirección</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p> Av. Los Horcones, Av. La Salle, Barquisimeto 3001, Lara</p>
                        </div>
                        <!-- Grid column -->
        
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Redes Sociales</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p> <a href="#" class="" style="text-decoration: none;"><i class="bi bi-twitter"></i> Twitter</a> </p>
                            <p> <a href="#" class="" style="text-decoration: none;"><i class="bi bi-instagram"></i> Instagram</a> </p>
                            <p> <a href="#" class="" style="text-decoration: none;"><i class="bi bi-facebook"></i> Facebook</a> </p>
                        </div>
                        <!-- Grid column -->
        
                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contacto</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                            <p><i class="bi bi-envelope"></i>contacto@casacarlina.com.ve</p>
                            <p><i class="bi bi-telephone"></i> +58 587 7489</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
        
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2021 Copyright: 
                <a class="text-white" href="http://upaebvirtual.edu.ve/web/"> Uptaeb</a>
            </div>
            <!-- Copyright -->
            
            '
        );
    }
}

?>