  <div class="sidebar-menu" style="min-height: 643px;">
    <header class="logo-env" style="">

        <!-- logo -->
        <div class="logo" style="">
            <a href="#">
                <img src="../assets/images/logo.png" style="max-height:60px;">
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>
    <div class="sidebar-user-info">

        <div class="sui-normal">
            <a href="#" class="user-link">
                <img src="../assets/images/inf.png" alt="" class="img-circle" style="height:44px;">

                <span style="">Bonjour,</span>
                <strong style="">    <?php echo $_SESSION['name'];     ?>             </strong>
            </a>
        </div>

        <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->       
            <a href="?p=profile">
                <i class="entypo-pencil"></i>
                Editer profile            </a>

            <a href="?p=profile">
                <i class="entypo-lock"></i>
                Changer Mdp            </a>

            <span class="close-sui-popup">×</span><!-- this is mandatory -->      
        </div>
    </div>


    <div style="border-top:1px solid #0F6965;"></div> 
    <ul id="main-menu" class="" style="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page=="tableau_de_board") echo "active";;?> root-level">
            <a href="?p=tableau_de_board">
                <i class="fa fa-desktop"></i>
                <span style="">Tableau de bord</span>
            </a>
        </li>
        
        <li class="<?php if ($page=="patient") echo "active";?> root-level">
            <a href="?p=patient">
                <i class="fa fa-user"></i>
                <span style="">Patient</span>
            </a>
        </li>
        
        <li class="<?php if ($page=="receptionniste") echo "active";?> root-level">
            <a href="?p=receptionniste">
                <i class="fa fa-plus-square"></i>
                <span style="">Réceptioniste</span>
            </a>
        </li>
        <li class="<?php if (($page=="rdv_d") or ($page=="rdv_v")) echo "active";?> root-level has-sub">
            <a href="#">
                <i class="entypo-target"></i>
                <span style="">Rendez-vous</span>
            </a>
            <ul style="">
                
                <li class=" <?php if ($page=="rdv_d") echo "active";?> ">
                    <a href="?p=rdv_d">
                        <i class="entypo-dot"></i>
                        <span style="">Rendez-vous demandé</span>
                    </a>
                </li>
              
                <li class=" <?php if ($page=="rdv_v") echo "active";?> ">
                    <a href="?p=rdv_v">
                        <i class="entypo-dot"></i>
                        <span style="">Rendez-vous validé</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php if (($page=="consultation") or ($page=="rapport_operation") or ($page=="rapport_naissance") or ($page=="rapport_deces")) echo "active";?> root-level has-sub">
            <a href="#">
                <i class="entypo-target"></i>
                <span style="">Consultation et rapport</span>
            </a>
            <ul style="">
                
                <li class=" <?php if ($page=="consultation") echo "active";?> ">
                    <a href="?p=consultation">
                        <i class="entypo-dot"></i>
                        <span style="">Consultation</span>
                    </a>
                </li>
              
                <li class=" <?php if ($page=="rapport_operation") echo "active";?> ">
                    <a href="?p=rapport_operation">
                        <i class="entypo-dot"></i>
                        <span style="">Rapport d'oppération</span>
                    </a>
                </li>
                <li class=" <?php if ($page=="rapport_naissance") echo "active";?> ">
                    <a href="?p=rapport_naissance">
                        <i class="entypo-dot"></i>
                        <span style="">Rapport de naissance</span>
                    </a>
                </li>
                <li class=" <?php if ($page=="rapport_deces") echo "active";?> ">
                    <a href="?p=rapport_deces">
                        <i class="entypo-dot"></i>
                        <span style="">Rapport décès</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="<?php if ($page=="hospitalisation") echo "active";?> root-level">
            <a href="?p=hospitalisation">
                <i class="entypo-doc-text-inv"></i>
                <span style="">hospitalisation</span>
            </a>
        </li>

        <li class="<?php if ($page=="emploi_temps") echo "active";?> root-level">
            <a href="?p=emploi_temps">
                <i class="entypo-doc-text-inv"></i>
                <span style="">Emploi de temps </span>
            </a>
        </li>
        
        <li class="<?php if ($page=="notification") echo "active";?> root-level">
            <a href="?p=notification">
                <i class="entypo-doc-text-inv"></i>
                <span style="">Notification</span>
            </a>
        </li>

        <!-- ACCOUNT -->
        <li class="<?php if ($page=="profile") echo "active";?> root-level">
            <a href="?p=profile">
                <i class="entypo-lock"></i>
                <span style="">Profile</span>
            </a>
        </li>



    </ul>

</div>