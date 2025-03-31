
<?php //session_start(); ?>
<div id="page-wrapper" style="
    margin-right: 55px;
    margin-left: 55px;">
				<div class="row">
                    <div class="col-md-12">

                     <h2><i class="entypo-user" style="opacity: 0.7;"></i>
                    <?php
                        echo $_SESSION['compte'];
                       ?> 
                    </h2>   
                        <h5><a href="../logout.php?logout=true" style="float: right;">Se déconnecter<i class="entypo-logout right"></i></a></h5>
                    </div>
                </div>
                <hr style="border: 0;
   				height: 1px;
    			background: #333;
    			opacity: 0.3;
    			background-image: linear-gradient(to right, #ccc, #114466, #ccc);" />
</div>
