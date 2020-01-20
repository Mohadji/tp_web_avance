
<?php 
    session_start();
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
    
    if (isset($_POST['cnx'])) 
    {
        if (!empty($_POST['login']) AND !empty($_POST['mdp'])) 
        {
            $login = htmlspecialchars($_POST['login']);
            $mdp = htmlspecialchars($_POST['mdp']);

            $req = $pdo->prepare('SELECT * FROM user WHERE login_user=? AND password_user=? and statut=1');
            $req->execute(array($login,$mdp));

            $verification = $req->rowCount();
            if ($verification > 0) {
                
                $affichage = $req->fetch();

                //creation des variable session de controle 
                $_SESSION['id_user'] = $affichage['id_user'];
                $_SESSION['nom_user'] = $affichage['nom_user'];
                $_SESSION['prenom_user'] = $affichage['prenom_user'];
                $_SESSION['email_user'] = $affichage['email'];
                $_SESSION['login_user'] = $affichage['login_user'];

                // id du profil du user qui vien de se connecter dans la table user
                $_SESSION['id_profil'] = $affichage['id_profil'];

                $id_profil = $_SESSION['id_profil'];

                //**********récupération de la liste des actions du bloc congig*********************
                $sql = "SELECT g.id_group_action, g.libelle_group_action, a.id_action , a.libelle_Action,a.url_action FROM actions a , group_action g, profil_action p WHERE 
                    a.id_action = p.id_action AND a.id_group_action = g.id_group_action AND p.id_profil = $id_profil
                    AND g.bloc_menu = 'config' order by libelle_group_action asc, ordre_affichage_action asc";

                $resultat_donfig = $pdo->query($sql);

                //creation du tableau contenant les session 
                $_SESSION['bloc_config'] = array();
                $i = 0;
                foreach ($resultat_donfig as $row_config) {
                    $_SESSION['bloc_config'][$i] = array(
                            "id_group_action" => $row_config['id_group_action'],
                            "icon" => $row_config['icon'],
                            "id_action" => $row_config['id_action'],
                            "libelle_action" => $row_config['libelle_action'],
                            "url_action" => $row_config['url_action'],
                            "libelle_group_action" => $row_config['libelle_group_action'],
                    );
                    $i++;
                }


                //**********récupération de la liste des actions du bloc claire*********************
                $sql = "SELECT g.id_group_action, g.libelle_group_action, g.icon, a.id_action , a.libelle_action,a.url_action FROM actions a , group_action g, profil_action p WHERE 
                    a.id_action = p.id_action AND a.id_group_action = g.id_group_action AND p.id_profil = $id_profil
                    AND g.bloc_menu = 'claire' order by ordre_affichage asc, g.id_group_action,  ordre_affichage_action asc";

                $resultat_claire = $pdo->query($sql);

                //creation du tableau contenant les session 
                $_SESSION['bloc_claire'] = array();
                $i = 0;
                foreach ($resultat_claire as $row_claire) {
                    $_SESSION['bloc_claire'][$i] = array(
                            "id_group_action" => $row_claire['id_group_action'],
                            "libelle_group_action" => $row_claire['libelle_group_action'],
                            "icon" => $row_claire['icon'],
                            "id_action" => $row_claire['id_action'],
                            "libelle_action" => $row_claire['libelle_action'],
                            "url_action" => $row_claire['url_action'],
                    );
                    $i++;
                }
                /* redirection apres la connexion de l'utilisateur*/
                header('location:dashboard.php');
            }else{
                /* redirection en cas sur la page de connexion en cas d'erreur de mot de passe ou de login*/
                header("location:index.php?error_compte=Compte ou Mot de passe incorrecte"); 
            }
        }else {
            /*redirection sur la page de connexion dans le cas ou la personne n'as pas renseigner tous les champs lor de la connexion*/
            header("location:index.php?erreur_champ=desoler les champs doivent etre renseigner...");
        }   
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

                                <form action="" id="form" method="post">

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
                                        <button class="btn btn-primary btn-block" name="cnx" type="submit"> Connexion </button>
                                    </div>

                                </form>

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
