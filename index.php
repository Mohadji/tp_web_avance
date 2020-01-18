<?php 
    
    //connexion a la base de donnee
    require_once('Connexion_bd/bdd.php');

    //recuperation de la variable de controle 
    if (!isset($_GET['error_compte'])) {
        $error_compte = '';
    }else{
        $error_compte = $_GET['error_compte'];
    }

    if (!isset($_GET['erreur_champ'])) {
        $erreur_champ = "";
    }else {
        $erreur_champ = $_GET['erreur_champ'];
    }



 ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/dark/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2019 23:08:47 GMT -->
<head>
        <meta charset="utf-8" />
        <title>GSCHOOL || CONNEXION</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <?php if(!empty($erreur_champ)){ ?>
                            <div class="alert alert-danger">
                                <p align="center"><?= $erreur_champ ?></p>
                            </div>
                        <?php }else if(!empty($error_compte)){ ?>
                            <div class="alert alert-danger">
                                <p align="center"><?= $error_compte ?></p>
                            </div>
                        <?php } ?>
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.php">
                                        <span><img src="assets/images/logo-light1.png" alt="" height="22"></span>
                                    </a>
                                    <!-- <p class="text-muted mb-4 mt-3">Entrer votre Identifiant et Mot de passe pour acceder au Tableau de bord.</p> -->
                                </div>

                                <form action="Traitement/tr_connexion.php" id="form" method="post">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Identifiant</label>
                                        <input class="form-control" type="text" name="login" id="login" placeholder="Entrer votre identifiant">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Mot de passe</label>
                                        <input class="form-control" type="password" name="mdp" id="mdp" placeholder="Entrer votre mot de passe">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="souvenir" id="souvenir" class="custom-control-input" >
                                            <label class="custom-control-label" for="checkbox-signin">Se souvenir de moi</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Connexion </button>
                                    </div>

                                </form>

                                <!--< div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div> -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="" class="text-white-50 ml-1">Mot de passe oublié ?</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2019 - 2020 &copy; Gestion School <a href="#" class="text-white-50">M1 GL</a> 
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- JS lib -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        
    </body>



    <script type="text/javascript">
        // $(document).ready(function(){

        //     $('#form').on('submit', function(e){
        //         e.preventDefault();

        //         var login = $('#identifiant').val();
        //         var mdp = $('#mdp').val();

        //         if (checkData('#identifiant') && checkData('#mdp')) 
        //         {
        //             alert('cool');
        //             // $.ajax({
        //             //     url:'Traitement/tr_connexion.php',
        //             //     type: 'POST',
        //             //     data:{
        //             //         login : login,
        //             //         name : mdp,
        //             //     }
        //             // });
        //         }else {
        //             alert('alert');
        //         }
        //     });

        //     function checkData(caller){
        //         if (caller.val() == '') {
        //             caller.css('border', '1px solid white');
        //             return false;
        //         }else
        //             caller.css('border', '');

        //         return true;
        //     }
        // });
    </script>

<!-- Mirrored from coderthemes.com/ubold/layouts/dark/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2019 23:08:48 GMT -->
</html>