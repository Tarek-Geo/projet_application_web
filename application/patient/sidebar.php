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
                <img src="../assets/images/pat.png" alt="" class="img-circle" style="height:44px;">

                <span style="">Bonjour,</span>
                <strong style="">        <?php echo $_SESSION['name'];     ?>        </strong>
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
       
        <!-- ACCOUNT -->
        <li class="<?php if ($page=="profile") echo "active";?> root-level">
            <a href="?p=profile">
                <i class="entypo-lock"></i>
                <span style="">Profile</span>
            </a>
        </li>



    </ul>

</div>