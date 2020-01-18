<?php
    //***page tableau de bord ***//
    session_start();

    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php');
    require_once('function_manager.php');

    /* requete de selection de tous les action avec les groupe d'action*/
    $affichage = $pdo->query("SELECT a.id_action as id_action,libelle_action,description_action, g.id_group_action as id_group_action,libelle_group_action FROM actions a, group_action g WHERE a.id_group_action = g.id_group_action ORDER BY libelle_group_action");



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
                                </div>
                                <h4 class="page-title"><i class="fe-user"></i> Profil / <i class="fe-plus-square"> Nouveau</i></h4>
                            </div>
                        </div>
                    </div>     
                    <!-- end page title --> 

                   <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title"> <i class="fe-plus-circle"></i> Nouveau profil</h4>

                                 <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <form>
                                            <div id="progressbarwizard">

                                                <ul class="nav nav-pills bg-secondary nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item">
                                                        <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-account-circle mr-1"></i>
                                                            <span class="d-none d-sm-inline">Profil</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#profile-tab-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-face-profile mr-1"></i>
                                                            <span class="d-none d-sm-inline">Privilege</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                                            <span class="d-none d-sm-inline">Finalisation</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            
                                                <div class="tab-content b-0 mb-0">
                                            
                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                    </div>
                                            
                                                    <div class="tab-pane" id="account-2">
                                                        <div class="row">
                                                            <div class="col-6" style="margin-left: 300px">
                                                                <div class="form-group row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="profil_nom">Nom Profil</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" id="profil_nom" name="userName1" placeholder="Entrer le profil">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="profile-tab-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><i class="fe-star"></i> Module</th>
                                                                            <th><i class="fe-clipboard"></i> Libellé privilège</th>
                                                                            <th><i class="fe-edit-1"></i> Description privilège</th>
                                                                            <th><i class="fe-settings"></i> Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php while($aff = $affichage->fetch()){ ?>
                                                                            <tr>
                                                                                <td style="color: white; font-weight: bold;">
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <?php echo htmlentities(stripcslashes($aff['libelle_group_action']));?>
                                                                                </td>
                                                                                <td>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <?php echo htmlentities(stripcslashes($aff['libelle_action']));?>
                                                                                </td>
                                                                                <td>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <?php echo htmlentities(stripcslashes($aff['description_action']));?>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="checkbox-primary" type="checkbox"
                                                                                        value="<?php echo htmlentities(stripcslashes($aff['id_action']));?>"
                                                                                        name="liste_action[]">
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="finish-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="text-center">
                                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                                    <h3 class="mt-0">Thank you !</h3>

                                                                    <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                        mattis dictum aliquet.</p>

                                                                    <div class="mb-3">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                            <label class="custom-control-label" for="customCheck3">I agree with the Terms and Conditions</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);" class="btn btn-secondary">Precedent</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <a href="javascript: void(0);" class="btn btn-secondary">Suivant</a>
                                                        </li>
                                                    </ul>

                                                </div> <!-- tab-content -->
                                            </div> <!-- end #progressbarwizard-->
                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                        </div> 
                        <!-- end row -->
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

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0 text-white">Settings</h5>
        </div>
        <div class="slimscroll-menu">
            <!-- User box -->
            <div class="user-box">
                <div class="user-img">
                    <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                </div>
        
                <h5><a href="javascript: void(0);">Geneva Kennedy</a> </h5>
                <p class="text-muted mb-0"><small>Admin Head</small></p>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h5 class="pl-3">Basic Settings</h5>
            <hr class="mb-0" />

            <div class="p-3">
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox1" type="checkbox" checked>
                    <label for="Rcheckbox1">
                        Notifications
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox2" type="checkbox" checked>
                    <label for="Rcheckbox2">
                        API Access
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox3" type="checkbox">
                    <label for="Rcheckbox3">
                        Auto Updates
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox4" type="checkbox" checked>
                    <label for="Rcheckbox4">
                        Online Status
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-0">
                    <input id="Rcheckbox5" type="checkbox" checked>
                    <label for="Rcheckbox5">
                        Auto Payout
                    </label>
                </div>
            </div>

            <!-- Timeline -->
            <hr class="mt-0" />
            <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
            <hr class="mb-0" />
            <div class="p-3">
                <div class="inbox-widget">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-light">Tomaslau</a></p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-light">Stillnotdavid</a></p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-light">Kurafire</a></p>
                        <p class="inbox-item-text">Nice to meet you</p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-light">Shahedk</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-light">Adhamdannaway</a></p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                    </div>
                </div> <!-- end inbox-widget -->
            </div> <!-- end .p-3-->

        </div> <!-- end slimscroll-menu-->
    </div>


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