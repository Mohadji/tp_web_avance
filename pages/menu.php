<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Menu Principale</li>
                
            <?php 
                $id_courant = 0;
                $bloc_claire = sizeof($_SESSION['bloc_claire']);
                foreach($_SESSION['bloc_claire'] as $key => $value){
                   // die(print_r($_SESSION['bloc_claire']));
                    $bloc_claire = $_SESSION['bloc_claire'][$key];
                    if( $id_courant != $bloc_claire['id_group_action']){
                ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="<?= $bloc_claire['icon'] ?>"></i>
                        <span> <?= $bloc_claire['libelle_group_action']  ?></span>
                        <span class="menu-arrow"></span>
                    </a>
                    <?php
                     }//fin if condition d'ouverture
                    ?>
                <ul class="nav-second-level" aria-expanded="false">
                    <?php if(!empty($bloc_claire['libelle_action'])){ ?>
                        <li>
                            <a href="<?= $bloc_claire['url_action'] ?>"><?= $bloc_claire['libelle_action'] ?></a>
                        </li>
                    <?php }?>
                    </ul>
                    <?php
                    $id_courant = $bloc_claire['id_group_action'];
                        }//fin for
                    ?>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>