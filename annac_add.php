<?php
    //***page tableau de bord ***//

    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php');
    require_once('annac_db_manager.php');

    /*titre de la page est variant avec le template vouli*/
    $title = "GSCHOOL || ANNEE ACADEMIQUE";


    /*requette d'insertion d'une annee academique*/
    if (isset($_POST['envoi_annac'])) 
    {
        if (!empty($_POST['nom_annac']) AND !empty($_POST['nb_annac'])) 
        {

            $nom_annac = htmlspecialchars($_POST['nom_annac']);
            $nb_annac = htmlspecialchars($_POST['nb_annac']);  

            // die(var_dump($nom_annac,$nb_annac));
            insert_annac($nom_annac,$nb_annac);

            header("location:annac_add.php?msg=Ajout effectuer ...");        
        }  
    }

?>

<?php include_once('pages/entete_page.php') ?>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include_once('pages/header.php') ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include_once('pages/menu.php') ?>
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
                                        <?php if(!empty($msg)){ ?>
                                            <span style="color: white; font-weight: bold; margin-right: 20px"><?= $msg; ?></span>
                                        <?php } ?>
                                        <a href="annac_liste_view.php" class="btn btn-success waves-effect waves-light" >
                                            <span class="btn-label"><i class=" mdi mdi-plus"></i></span>Consulter
                                        </a>
                                    </div>
                                    <h4 class="page-title"><i class="fe-star"></i> Annee Academique / <i class="fe-plus-square"> Nouveau</i></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                       <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title"><i class="fe-plus"></i> Ajout d'une Annee Academique</h4>
                                        <form class="needs-validation" novalidate method="post" action="">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">Nom de l'année Academique</label>
                                                                    <input type="text" name="nom_annac" class="form-control" placeholder="Nom annee Academique (Ex:2019-20)" value="" required>
                                                                    <div class="valid-feedback">
                                                                        Information valide !
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">Plafon d'inscription</label>
                                                                    <input type="number" name="nb_annac" class="form-control" id="validationCustom01" placeholder="Entrer le nombre maximum d'inscription possible de l'annee academique" value="" required>
                                                                    <div class="valid-feedback">
                                                                        Information valide !
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit" name="envoi_annac" style="margin-left: 38%; width: 25%">Enregistrer</button>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->
                                            </div> <!-- end col-->
                                        </form>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include_once('pages/footer.php') ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- *************** MODAL *************** -->

<?php include_once('pages/pied_page.php') ?>