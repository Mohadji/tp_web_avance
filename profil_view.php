<?php
    //***page de liste des profil ***//
    require_once('Connexion_bd/bdd.php');
    require_once('pages/controle.php');

     $title = "GSCHOOL || PROFIL";

    if (!isset($_GET['msg'])) {$msg='';}else{$msg = $_GET['msg'];}

    /*requette de recuperation des donnee des profiles*/
    $aff_profil = $pdo->query("SELECT * FROM profil ORDER BY libelle_profil");

    /*function de selection des prileges d'un profil*/
    function select_profil_action($id_profil){
    $pdo = $GLOBALS['connexion'];
    $select = $pdo->query("SELECT a.id_group_action, libelle_group_action, pa.id_action, libelle_action, description_action
                            FROM profil_action pa,actions a, group_action g
                            WHERE pa.id_action=a.id_action and a.id_group_action=g.id_group_action and id_profil=$id_profil order by libelle_group_action");
        return $select;
    }//fin fonction select_action

/*function de selection des prileges d'un profil*/
    function select_profil_checked($id_profil){
    $pdo = $GLOBALS['connexion'];
    $select = $pdo->query("SELECT a.id_group_action, libelle_group_action, pa.id_action, libelle_action, description_action
                            FROM profil_action pa,actions a, group_action g
                            WHERE pa.id_action=a.id_action and a.id_group_action=g.id_group_action and id_profil=$id_profil
                            order by libelle_group_action");
        return $select;
    }//fin fonction select_action

    function select_profil_not_checked($id_profil){
        $pdo = $GLOBALS['connexion'];
        $not_select = $pdo->query("SELECT g.id_group_action, libelle_group_action, a.id_action, libelle_action, description_action
                                         FROM actions a, group_action g
                                         WHERE a.id_group_action=g.id_group_action 
                                         and id_action NOT IN (SELECT id_action FROM profil_action WHERE id_profil=$id_profil)
                                         order by libelle_group_action");

        return $not_select;
    }//fin fonction select_profil_action


    //requette d'interdiction des au profil quel que privilege
    /*$id_profil_courant = $_SESSION['id_profil'];
    $alert = $pdo->prepare('SELECT g.id_group_action, a.id_action FROM group_action g, actions a, profil_action pa 
        WHERE pa.id_action=a.id_action AND pa.id_group_action=g.id_group_action AND id_action not in(SELECT id_action from profil_action WHERE id_profil=$id_profil_courant)');*/

    //button d'envoi des modifications des privileges 
    if (isset($_POST['envoi_choix'])) 
    {   
        // var_dump($_POST);
        // die();

        // die(var_dump($_POST));
        //recuperation du profil choisi
        $id_profil = $_POST['id_profil'];
        //recuperation de la liste des choix a modifier
        $liste_action1 = $_POST['liste_action_add'];
        //comptage des privilege choisi
        $liste_action2 = sizeof($liste_action1);
        
        //verification de l'utilisateur connecter
        $user_id = $_SESSION['user_id'];
        //prise en main de la date
        $date = date('Y-m-d H:i:s');

        //function d'in sertion des modification 
        //cette function fait l'enregistrement au complet ou annule en cas d'interruption lors
        // de la modification des donneer 
        
        try
        {
            //function qui debite la transaction 
            $pdo->beginTransaction();
            //suppression des anciens privileges avant d'insérer les nouveaux
            $pdo->exec("DELETE FROM profil_action WHERE id_profil=$id_profil");

            //on insere les nouveaux privileges definis
            for($i=0;$i<$liste_action2;$i++){
                $id_action = $liste_action1[$i];
                $pdo->exec("INSERT INTO profil_action(id_profil, id_action) VALUES ($id_profil, $id_action)");
            }//fin for

            $reque_modif = $pdo->prepare("UPDATE profil SET modified_by=? AND modified_at=?");
            $reque_modif->execute(array($user_id,$date));

            $pdo->commit();

            header("location:profil_view.php?msg=Enregistré avec succès.");

        }
        catch(Exception $e) //en cas d'erreur
        {
            //on annule la transation
            $pdo->rollback();

            header("location:profil_view.php?msg=Echec de l'enregistrement, veuillez reprendre svp.");
            //on arrête l'exécution s'il y a du code après
            exit();
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
                                        <?php if(!empty($msg)) {?>
                                            <?php echo $msg; ?>
                                        <?php } ?>
                                        <a href="profil_add.php" class="btn btn-success waves-effect waves-light" >
                                            <span class="btn-label"><i class=" mdi mdi-plus"></i></span>Nouvelle
                                        </a>
                                    </div>
                                    <h4 class="page-title"><i class="fe-user"></i> Profil / <i class="fe-file"> Consulter</i></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                       <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title">Listes et Operations sur les Facultés</h4>
                                    <br>
                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                            <th>
                                                <i class="">#</i>
                                                <span>Index</span>
                                            </th>
                                            <th>
                                                <i class="fe-user"></i>
                                                <span>Libellé du profil</span>
                                            </th>
                                            <th width="150px">
                                                <i class="fe-sittings"></i>
                                                <span>Action</span>
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php while($row = $aff_profil->fetch()){ ?>
                                                <tr>
                                                    <td><?= $row['id_profil'] ?></td>
                                                    <td><?= $row['libelle_profil'] ?></td>
                                                    <td>

                                                        <!-- ********************************************************************************** -->

                                                        <!-- Large modal -->
                                                        <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal<?= $row['id_profil']?>"><i class="fe-eye"></i></button>
                                                        <!-- Large modal -->
                                                        <div class="modal fade bs-example-modal<?= $row['id_profil']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="exampleModalScrollable" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myLargeModalLabel"><b>Details des privileges du profil : <?= $row['libelle_profil']?></b></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="color: white"><i class="fe-star"></i> Module</th>
                                                                                    <th style="color: white"><i class="fe-layers"></i> Libellé privilège</th>
                                                                                    <th style="color: white"><i class="fe-edit"></i> Description privilège</th>
                                                                                    <th style="color: white"><i class="fe-toggle-left"></i> Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php 
                                                                                $profil = $row['id_profil'];
                                                                                $cheked = select_profil_action($profil);
                                                                                while($row1 = $cheked->fetch()){
                                                                                 ?>
                                                                                    <tr>
                                                                                        <td><?php echo stripcslashes($row1['libelle_group_action']);?></td>
                                                                                        <td><?php echo stripcslashes($row1['libelle_action']);?></td>
                                                                                        <td><?php echo stripcslashes($row1['description_action']);?></td>
                                                                                        <td>
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <input type="checkbox" class="checkbox-info" id="" name="liste_action[]" value="<?php echo stripcslashes($row1['id_action']);?>" checked="checked" disabled>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->


                                                        <!-- ********************************************************************************** -->


                                                        <button type="button" class="btn btn-blue waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg<?= $row['id_profil']?>"><i class="mdi mdi-settings"></i></button>
                                                        <!-- debit Modal -->
                                                        <div class="modal fade bs-example-modal-lg<?= $row['id_profil']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="exampleModalScrollable" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myLargeModalLabel"><b>Modifications des privilege du profil : <?= $row['libelle_profil']?></b></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="color: white"><i class="fe-star"></i> Module</th>
                                                                                    <th style="color: white"><i class="fe-layers"></i> Libellé privilège</th>
                                                                                    <th style="color: white"><i class="fe-edit"></i> Description privilège</th>
                                                                                    <th style="color: white"><i class="fe-toggle-left"></i> Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <form method="post">
                                                                                 <input type="hidden" name="id_profil" value="<?= $row['id_profil']?>">
                                                                                <?php 
                                                                                $profil = stripcslashes($row['id_profil']);
                                                                                $affichage = select_profil_checked($profil);
                                                                                while($row2 = $affichage->fetch()){
                                                                                 ?>
                                                                                    <tr>
                                                                                        <td><?php echo stripcslashes($row2['libelle_group_action']);?></td>
                                                                                        <td><?php echo stripcslashes($row2['libelle_action']);?></td>
                                                                                        <td><?php echo stripcslashes($row2['description_action']);?></td>
                                                                                        <td>
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <input type="checkbox" id="" name="liste_action_add[]" value="<?php echo stripcslashes($row2['id_action']);?>" checked="">
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php }// fin while 2
                                                                                 ?>
                                                                                <?php 
                                                                                $profil = stripcslashes($row['id_profil']);
                                                                                $not_select = $pdo->query("SELECT g.id_group_action, libelle_group_action, a.id_action, libelle_action, description_action
                                                                                     FROM actions a, group_action g
                                                                                     WHERE a.id_group_action=g.id_group_action 
                                                                                     and id_action NOT IN (SELECT id_action FROM profil_action WHERE id_profil=$profil) order by libelle_group_action");
                                                                                while($row3 = $not_select->fetch()){
                                                                                 ?>
                                                                                    <tr>
                                                                                        <td><?php echo stripcslashes($row3['libelle_group_action']);?></td>
                                                                                        <td><?php echo stripcslashes($row3['libelle_action']);?></td>
                                                                                        <td><?php echo stripcslashes($row3['description_action']);?></td>
                                                                                        <td>
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <input type="checkbox" id="" name="liste_action_add[]" value="<?php echo stripcslashes($row3['id_action']);?>">
                                                                                        </td>
                                                                                    </tr>

                                                                                <?php } // fin while 3
                                                                                 ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-dismiss="modal">Fermé</button>
                                                                        <button type="submit" name="envoi_choix" class="btn btn-info btn-rounded waves-effect waves-light"> Enregistrer<span class="btn-label-right"><i class="fe-check"></i></span>
                                                                        </button>
                                                                    </div>
                                                                    </form>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    </td>
                                                </tr>
                                            <?php } //fin while 1
                                             ?>
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


        <!-- *************** MODAL *************** -->

<?php include_once('pages/pied_page.php') ?>