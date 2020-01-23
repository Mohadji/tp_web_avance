<?php
    //***page tableau de bord ***//
    session_start();

    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php')

?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2019 23:07:54 GMT -->
<head>
        <meta charset="utf-8" />
        <title>GSCHOOL || ACCUEIL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Plugins css -->
        <link href="assets/libs/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />


    </head>

    <body>

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

                                    <table data-toggle="table"
                                           data-search="true"
                                           data-show-refresh="true"
                                           data-sort-name="id"
                                           data-page-list="[5, 10, 20]"
                                           data-page-size="5"
                                           data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                                        <thead class="thead-light">
                                        <tr>
                                            <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">N° ID</th>
                                            <th data-field="name" data-sortable="true">Nom</th>
                                            <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Email</th>
                                            <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Téléphone</th>
                                            <th data-field="salle" data-align="center" data-sortable="true" data-sorter="priceSorter">Nombre de salle</th>
                                            <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Statut</th>
                                            <th data-field="" data-align="center" data-sortable="true" data-formatter="statusFormatter">Action</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td>UB-1609</td>
                                            <td>Boudreaux</td>
                                            <td>sycours@gmail.com</td>
                                            <td>+227 80 00 00 00</td>
                                            <td>25</td>
                                            <td>Unpaid</td>
                                            <td>
                                                <button type="button" class="btn btn-info width-xs waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="fe-settings"></span> <i class="mdi mdi-chevron-down"></i> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Voir</a>
                                                        <a class="dropdown-item" href="#">Modifier</a>
                                                        <a class="dropdown-item" href="#">Supprimer</a>
                                                    </div>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light"><i class="fe-shield-off"></i></button>
                                            </td>
                                        </tbody>
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

        <!-- Plugins js-->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Bootstrap Tables js -->
        <script src="assets/libs/bootstrap-table/bootstrap-table.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/bootstrap-tables.init.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2019 23:08:00 GMT -->
</html>