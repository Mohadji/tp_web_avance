<?php
    //***page tableau de bord ***//

    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php');
    require_once('faculte_db_manager.php');

    $title = "GSCHOOL || FACULTE";

    //recuperation de message s\il existe
    if (!isset($_GET['msg'])) {
         $msg='';
     } else{
        $msg=$_GET['msg'];
     }


    /*requette de traitement l'ajout d'une faculté ....*/
    if (isset($_POST['envoi_fac'])) 
    {
        // var_dump($_POST);
        // die();  
        if (!empty($_POST['nom_fac']) AND !empty($_POST['email_fac']) AND !empty($_POST['num_fac']) AND !empty($_POST['nb_salFac'])) 
        {
            $nom_fac = htmlspecialchars($_POST['nom_fac']);      
            $email_fac = htmlspecialchars($_POST['email_fac']);      
            $num_fac = htmlspecialchars($_POST['num_fac']);      
            $nb_salFac = htmlspecialchars($_POST['nb_salFac']);   

            insert_faculte($nom_fac,$email_fac,$num_fac,$nb_salFac);

            header('faculte_add.php?msg=Enregistrement effectuer ...');
        }  
    }

?>

<?php include_once('pages/entete_page.php'); ?>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include_once('pages/header.php'); ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include_once('pages/menu.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <?php //if (!empty($msg)) {?>
                                            <p style="color: green"><?php //echo $msg; ?></p>
                                        <?php //} ?>
                                        <a href="faculte_liste_view.php" class="btn btn-success waves-effect waves-light" >
                                            <span class="btn-label"><i class=" mdi mdi-plus"></i></span>Consulter
                                        </a>
                                    </div>
                                    <h4 class="page-title"><i class="fe-user"></i> Facultés / <i class="fe-plus-square"> Nouveau</i></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                       <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title"><i class="fe-plus-square"></i>Ajouter une Faclté</h4>
                                        <form class="needs-validation" novalidate method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group position-relative mb-3">
                                                                <label for="validationTooltip01">Nom de la faculté</label>
                                                                <input type="text" name="nom_fac" class="form-control" id="validationTooltip01" placeholder="Entrer le nom de la faculté" value="" required>
                                                                <div class="valid-tooltip">
                                                                     Cela semble correcte!
                                                                </div>
                                                                <div class="invalid-tooltip">
                                                                    Veuillez saisir le nom de la faculté.
                                                                </div>
                                                            </div>
                                                            <div class="form-group position-relative mb-3">
                                                                <label for="validationTooltipUsername">Adresse Email</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                                                    </div>
                                                                    <input type="email" name="email_fac" class="form-control" id="validationTooltipUsername" placeholder="Entrer l'adresse email" aria-describedby="validationTooltipUsernamePrepend"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Veuillez choisir un email unique et valide.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div> <!-- end col-->


                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group position-relative mb-3">
                                                                <label for="validationTooltip01">Numéro Télephone</label>
                                                                <input type="number" name="num_fac" class="form-control" id="validationTooltip01" placeholder="Entrer le Numéro telephone" value="" required>
                                                                <div class="valid-tooltip">
                                                                    Cela semble correcte!
                                                                </div>
                                                                <div class="invalid-tooltip">
                                                                   Veuillez saisir le Numéro Télephone de la faculté.
                                                                </div>
                                                            </div>
                                                            <div class="form-group position-relative mb-3">
                                                                <label for="validationTooltip02">Nombre de salle</label>
                                                                <input type="number" name="nb_salFac" class="form-control" id="validationTooltip02" placeholder="Entrer le nombre de salle" value="" required>
                                                                <div class="valid-tooltip">
                                                                     Cela semble correcte!
                                                                </div>
                                                                <div class="invalid-tooltip">
                                                                   Veuillez saisir le Nombre de salle de la faculté.
                                                                </div>
                                                            </div>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div> <!-- end col-->

                                                <div class="col-lg-3" style="margin-left: 38%">
                                                    <div class="card">
                                                        <button class="btn btn-primary" name="envoi_fac" type="submit">Submit form</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                            <!-- end row -->

                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include_once('pages/footer.php'); ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



<?php include_once('pages/pied_page.php') ?>