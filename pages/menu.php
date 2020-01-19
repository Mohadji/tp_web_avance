<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Menu Principale</li>
                
            <?php 
                $id_courant = 0;
                $tab_claire = sizeof($_SESSION['bloc_claire']);
                // var_dump($tab_claire);
                // die();
                for($i=0; $i<$tab_claire; $i++)
                {
                    $tab_claire = $_SESSION['bloc_claire'][$i];
                    // var_dump($tab_claire);
                    // die();
                    if( $id_courant != $tab_claire['id_group_action']){
                    // if($id_courant > 0)
                    //    echo '</ul> </li>'; //fermeture du groupe precedent
                ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="<?= $tab_claire['icon'] ?>"></i>
                        <span> <?= $tab_claire['libelle_group_action']  ?></span>
                        <span class="menu-arrow"></span>
                    </a>
                    <?php
                     }//fin if condition d'ouverture
                    ?>
                    <?php if(!empty($tab_claire['libelle_action'])): ?>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="<?= $tab_claire['url_action'] ?>"><?= $tab_claire['libelle_action'] ?></a>
                        </li>
                    </ul>
                    <?php endif;?>
                </li>
                <?php
                    $id_courant = $tab_claire['id_group_action'];
                    }//fin for
                ?>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>