<?php
    //***page de liste des profil ***//
    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php')

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
                                        <button type="button" class="btn btn-success waves-effect waves-light" 
                                                data-toggle="modal" data-target="#con-close-modal">
                                            <span class="btn-label"><i class=" mdi mdi-plus"></i></span>Nouvelle
                                        </button>
                                    </div>
                                    <h4 class="page-title">Tableau de Bord</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                       <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title">Listes et Operqtions sur les Facultés</h4>
                                    <br>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th>
                                                <i class="">#</i>
                                                <span>Index</span>
                                            </th>
                                            <th>
                                                <i class="fe-user"></i>
                                                <span>Libellé du profil</span>
                                            </th>
                                            <th>
                                                <i class="fe-sittings"></i>
                                                <span>Action</span>
                                            </th>
                                        </thead>
                                    </table>
                                    
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

        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <form action="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nouvelle Faculté</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Nom</label>
                                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom de la faculté">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Adresse E-mail</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Addresse Mail de la faculté">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Téléphone</label>
                                        <input type="number" name="tel" class="form-control" id="tel" placeholder="Numéro de la faculté">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Nombre des salles de cours</label>
                                        <input type="number" name="nb_salle" class="form-control" id="nb_salle" placeholder="Nombre de salle de cours ...">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group no-margin">
                                        <label for="field-7" class="control-label">Description</label>
                                        <textarea class="form-control" name="desc" id="desc" placeholder="Description de la faculté ..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fermé</button>
                            <button type="submit" name="envoi_fac" class="btn btn-info waves-effect waves-light">Enregistrer</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal -->
<?php include_once('pages/pied_page.php') ?>