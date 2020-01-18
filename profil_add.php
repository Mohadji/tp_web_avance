<?php
    //***page tableau de bord ***//
    session_start();

    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php');
    require_once('function_manager.php');

    /* requete de selection de tous les action avec les groupe d'action*/
    $affichage = select_toute_actions();


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
                                                                        <input type="text" class="form-control" id="profil_nom" name="profil_nom" placeholder="Entrer le profil">
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
                                                                    <h3 class="mt-0">Felicitation !</h3>

                                                                    <p class="w-75 mb-2 mx-auto">La derniere etape restante est de valider avec le bouton Enregister</p>
                                                                    <p class="w-75 mb-2 mx-auto">les privileges coché serons attribuer au profil</p>
                                                                    <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">
                                                                        <span class=".btn-label">
                                                                            <i class="mdi mdi-check-all"></i> 
                                                                            Enregistrer
                                                                        </span>
                                                                    </button>

                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);" class="btn btn-secondary">Precedent</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <a href="javascript: void(0);" class="btn btn-secondary" id="suivant">Suivant</a>
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
        <!-- js Lib -->
        <script src="assets/js/jquery.js"></script>
        <script>
            
            $(document).ready(function() {
                $('#progressbarwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
                        if(index==1) {
                            // Make sure we entered the name
                            if(!$('#profil_nom').val()) {
                                alert('le profil ne dois pas etre vide');
                                $('#profil_nom').focus();
                                return false;
                            }
                        }
             
                        // Set the name for the next tab
                        $('#tab3').html('Hello, ' + $('#name').val());
             
                    }, onTabShow: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index+1;
                        var $percent = ($current/$total) * 100;
                        $('<div id="progressbarwizard"></div> .progress-bar').css({width:$percent+'%'});
                    }});
            });

        </script>


    <!-- *************** MODAL *************** -->

  

<?php include_once('pages/pied_page.php') ?>