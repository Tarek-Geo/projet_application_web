<?php

	require_once("../session.php");
	
	require_once("../class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM admin WHERE ADMIN_ID=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Login | Administrateur</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
<?php
                
                $bdd = new PDO('mysql:host=localhost;dbname=medical','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $nom="Tableau de bord";
                $page="tableau_de_board";
                if (isset($_GET['p'])){
                    $page=$_GET['p'];
                    if ($page=="tableau_de_board") $nom="Tableau de bord";
                    if ($page=="service") $nom="Service";
                    if ($page=="receptionniste") $nom="Réceptionniste";
                    if ($page=="rapport_operation") $nom="Rapport d'opération";
                    if ($page=="rapport_naissance") $nom="Rapport de naissance";
                    if ($page=="rapport_deces") $nom="Rapport décès";
                    if ($page=="profile") $nom="Profile";
                    if ($page=="patient") $nom="Patient";
                    if ($page=="notification") $nom="Notification";
                    if ($page=="emploi_temps") $nom="Emploi de temps";
                    if ($page=="hospitalisation") $nom="hospitalisation";
                    if ($page=="medecin") $nom="Médecin";
                    if ($page=="consultation") $nom="Consultation";
                    if ($page=="infirmiere") $nom="Infirmière";
                    if ($page=="parametres_systeme") $nom="Parametres de système";

                } ?>
        <?php   include '../includes_top.php';
                $text="";
                $requete_f = $bdd->query('SELECT * FROM system');
                while ($donnees_f = $requete_f->fetch()) {
                    $text=$donnees_f['txt_align'];
                }

        ?>

    </head>
    <body class="page-body" >
        <div class="page-container <?php if ($text == 'right-to-left') echo 'right-sidebar'; ?>" >
            <?php include 'sidebar.php'; ?>

            <div class="main-content">
                
                <?php include("../header.php"); ?>
                    <div  style="min-height: 709px;
                        margin-right: 55px;
                        margin-left: 55px;">
                        <h3 style="margin:20px 0px; color:#818da1; font-weight:200;">
                    <i class="entypo-right-circled"></i>
                    <?php echo $nom; ?>             </h3>
               <?php include ($page.".php"); ?>
                <?php include("../footer.php"); ?>
            </div>
          </div>
          <?php include '../includes_bottom.php';?>
        </div>
        <?php include '../modal.php'; ?>
        

    </body>
</html>