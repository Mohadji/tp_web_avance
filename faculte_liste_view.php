<?php
    //***page tableau de bord ***//

    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php');
    require_once('faculte_db_manager.php');

    $title = "GSCHOOL || CONSULTE";

    $requete = "SELECT * FROM faculte ORDER BY nom_fac";
    $affichage = $pdo->query($requete);

    $requete_active = $pdo->query("SELECT statut_fac FROM faculte");
    $aff_statut = $requete_active->fetch();

    //activation ou desactivation de compte
    if(isset($_GET['id_fac'])){
        $id_fac = htmlspecialchars($_GET['id_fac']);
        $statut = htmlspecialchars($_GET['statut']); 


        if($statut == 0){ $nouv_statut = 1;
        }else if($statut == 1){ $nouv_statut = 0;}

        try{
            
            $mdf = $pdo->prepare('UPDATE faculte SET statut_fac=? WHERE id_fac=?');
            $mdf->execute(array($nouv_statut,$id_fac));

        // die(var_dump($id_fac, $nouv_statut));
            header("location:faculte_liste_view.php?msg=Activation effectuer ...");
        }
        catch(EXCEPTION $e){
            header("location:faculte_liste_view.php?msg=Error survenu ...");
            
        }

    }//fin if isset


    if (isset($_POST['mdf_fac'])) 
    {
        if (!empty($_POST['id_fac']) AND !empty($_POST['nom_fac']) AND !empty($_POST['email_fac']) AND !empty($_POST['tel_fac']) AND !empty($_POST['nbr_salle'])) 
        {
            $nom_fac = htmlspecialchars($_POST['nom_fac']);      
            $email_fac = htmlspecialchars($_POST['email_fac']);      
            $tel_fac = htmlspecialchars($_POST['tel_fac']);      
            $nbr_salle = htmlspecialchars($_POST['nbr_salle']);
            $id_fac = htmlspecialchars($_POST['id_fac']);

            // die(var_dump($_POST));    
            modification_faculte($id_fac,$nom_fac,$email_fac,$tel_fac,$nbr_salle);

            header("location:faculte_liste_view.php?msg=Modification effectuer ...");
        }
    } // fin de la modification



    /*requette de traitement l'ajout d'une faculté par modal ....*/
    if (isset($_POST['envoi_fac'])) 
    {
        if (!empty($_POST['nom_fac']) AND !empty($_POST['email_fac']) AND !empty($_POST['num_fac']) AND !empty($_POST['nb_salFac'])) 
        {
        // die(var_dump($_POST));  
            $nom_fac = htmlspecialchars($_POST['nom_fac']);      
            $email_fac = htmlspecialchars($_POST['email_fac']);      
            $num_fac = htmlspecialchars($_POST['num_fac']);      
            $nb_salFac = htmlspecialchars($_POST['nb_salFac']); 

            // die(var_dump($_POST));  

            insert_faculte_modal($nom_fac,$email_fac,$num_fac,$nb_salFac);
             $requete = "SELECT * FROM faculte ORDER BY nom_fac";
            $affichage = $pdo->query($requete);

        }  
    } //fin de l'ajout 
?>

<?php include_once('pages/entete_page.php'); ?>

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
                                    <h4 class="page-title"><i class="fe-home"></i> Facultés / <i class="fe-file"> Consulte</i></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                       <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title">Listes et Operations sur les Facultés</h4>

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <th>N° ID</th>
                                            <th>Nom de la Faculté</th>
                                            <th>Email de la Faculté</th>
                                            <th>Numéro de la Faculté</th>
                                            <th>Nombre de salle de la Faculté</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </thead> 
                                        <tbody>
                                            <?php $i=1;
                                            while($row = $affichage->fetch()){
                                             ?>
                                                <tr>
                                                    <td><?= $i++ ; ?></td>
                                                    <td><?=  $row['nom_fac']; ?></td>
                                                    <td><?=  $row['email_fac']; ?></td>
                                                    <td><?=  $row['tel_fac']; ?></td>
                                                    <td><?=  $row['nbr_salle']; ?></td>
                                                    <td>
                                                        <a href="faculte_liste_view.php?id_fac=<?php echo $row['id_fac'];?>&statut=<?php echo $row['statut_fac'];?>"
                                                          style="align-content: center">
                                                          <?php if($row['statut_fac'] == 1):?>
                                                            <button class="btn btn-success waves-effect waves-light" type="button">
                                                                <span class="fe-shield" style="color:#FFFFFF"></span>
                                                            </button>
                                                          <?php else: ?>
                                                          <button class="btn btn-danger waves-effect waves-light" type="button">
                                                              <span class="fe-shield-off" style="color:#FFFFFF"></span>
                                                          </button>
                                                          <?php endif;?>
                                                        </a>
                                                    </td>
                                                    <td>

                                                        <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal<?= $row['id_fac'] ?>"><i class="fe-eye"></i></button>
                                                        <!-- debit Modal -->
                                                        <div id="con-close-modal<?= $row['id_fac'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Infos : <?= $row['nom_fac'] ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body p-4">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-borderless mb-0">
                                                                                <thead class="thead-light">
                                                                                <tr>
                                                                                    <th>Nom Faculté</th>
                                                                                    <th>Email Faculté</th>
                                                                                    <th>Numéro Telephone</th>
                                                                                    <th>Nombre de salle</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td><?= $row['nom_fac'] ?></td>
                                                                                    <td><?= $row['email_fac'] ?></td>
                                                                                    <td><?= $row['tel_fac'] ?></td>
                                                                                    <td><?= $row['nbr_salle']; ?></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div> <!-- end table-responsive-->
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fermé</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->
                                                        <!-- fin modal -->
                                                        <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#mdf-close-modal<?= $row['id_fac'] ?>"><i class="fe-settings "></i></button>
                                                        <!-- debit Modal -->
                                                        <div id="mdf-close-modal<?= $row['id_fac'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Modifications des Infos :<?= $row['nom_fac'] ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="needs-validation" action="" method="POST" novalidate>
                                                                        <input type="hidden" name="id_fac" value="<?= $row['id_fac'] ?>">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group position-relative mb-3">
                                                                                    <label for="validationTooltip01">Nom de la faculté</label>
                                                                                    <input type="text" name="nom_fac" class="form-control" id="validationTooltip01" placeholder="First name" value="<?= $row['nom_fac'] ?>" required>
                                                                                    <div class="valid-tooltip">
                                                                                        Infos Valide !
                                                                                    </div>
                                                                                    <div class="invalid-tooltip">
                                                                                        Desoler ce champ doit etre renseigner et valide !.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group position-relative mb-3">
                                                                                    <label for="validationTooltip02">Email de la faculté</label>
                                                                                    <input type="email" name="email_fac" class="form-control" id="validationTooltip02" value="<?= $row['email_fac'] ?>" required>
                                                                                    <div class="valid-tooltip">
                                                                                        Infos Valide !
                                                                                    </div>
                                                                                    <div class="invalid-tooltip">
                                                                                        Desoler ce champ doit etre renseigner et valide !.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group position-relative mb-3">
                                                                                    <label for="validationTooltip01">Telephone de la Faculté</label>
                                                                                    <input type="number" name="tel_fac" class="form-control" id="validationTooltip01" placeholder="First name" value="<?= $row['tel_fac'] ?>" required>
                                                                                    <div class="valid-tooltip">
                                                                                        Infos Valide !
                                                                                    </div>
                                                                                    <div class="invalid-tooltip">
                                                                                        Desoler ce champ doit etre renseigner et valide !.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group position-relative mb-3">
                                                                                    <label for="validationTooltip02">Nombre de salle de la Faculté</label>
                                                                                    <input type="number" name="nbr_salle" class="form-control" id="validationTooltip02" placeholder="Last name" value="<?= $row['nbr_salle'] ?>" required>
                                                                                    <div class="valid-tooltip">
                                                                                        Infos Valide !
                                                                                    </div>
                                                                                    <div class="invalid-tooltip">
                                                                                        Desoler ce champ doit etre renseigner et valide !.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fermé</button>
                                                                    <button type="submit" name="mdf_fac" class="btn btn-info waves-effect waves-light">Enregister</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal -->
                                                        <!-- fin Modal -->
                                                    </td>
                                                </tr>
                                            <?php  } ?>
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
        
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Nouvelle Faculté</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate method="post">
                            <div class="row">
                                <div class="col-lg-6">
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
                                </div> <!-- end col-->


                                <div class="col-lg-6">
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
                                </div> <!-- end col-->

                                <div class="col-lg-6" style="margin-left: 25%">
                                    <div class="card">
                                        <button class="btn btn-primary" name="envoi_fac" type="submit">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>    
                    </div>
            </div>
        </div><!-- /.modal -->

        <!-- *************** MODAL *************** -->

<?php include_once('pages/pied_page.php'); ?>