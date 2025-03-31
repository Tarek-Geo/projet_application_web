<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('administrateur/index.php');
}
        
if(isset($_POST['btn-login']))
{
    $umail = strip_tags($_POST['txt_email']);
    
    $upass = strip_tags($_POST['txt_password']);
	
	$user ="";

    if($login->doLogin($umail,$upass,$user))
	{
		echo "h";
	}
	elseif($login->doLogin1($umail,$upass,$user))
	{
		echo "y";
	}
	elseif($login->doLogin2($umail,$upass,$user))
	{
		echo "c";
	}
	
else
    {
		echo "<center><h1><font color='red'>Email ou Mot De Pass invalid</font></h1><center>";
        $error = "Wrong Details !";
    }   
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>Medical</title>
        <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/neon-core.css">
        <link rel="stylesheet" href="assets/css/neon-theme.css">
        <link rel="stylesheet" href="assets/css/neon-forms.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <script src="assets/js/jquery-1.11.0.min.js"></script>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="assets/images/favicon.png">

    </head>
    <body class="page-body login-page login-form-fall" data-url="http://neon.dev">


        <div class="login-container">

            <div class="login-header login-caret" style="background-image=url('assets/images/hero.jpg'); ">

                <div class="login-content" style="width:100%;">

                    <a href="#" class="logo">
                        <img src="assets/images/logo.png" height="80" alt="" />
                    </a>
                    <p class="description">
                    <h2 style="color:#cacaca; font-weight:100;"><?php 
                    $bdd = new PDO('mysql:host=localhost;dbname=medical','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    $nom="";
                        $requete_f = $bdd->query('SELECT name_system,txt_align FROM system');
                    while ($donnees_f = $requete_f->fetch()) {
                    $nom=$donnees_f['name_system'];
                    }
                    echo $nom;

                    ?>
                    </h2>
                    </p>

                   
                    
                </div>

            </div>

            

            <div class="login-form">

                <div class="login-content">
                  <?php
                  if (isset($_GET['r'])) {
                    echo  "     <script>
                                    alert('Svp vérifier votre Email et mot de passe!');
                                </script>
                                ";
                  }
                  if (isset($_POST['password'])) {
                    if ($_POST['password']=="") {
                        echo  "<script>
                                    alert('Svp vérifier votre mot de passe!');
                                </script>";
                    }
                    else{
                        if (isset($_POST['email'])) {
                          if ($_POST['email']=="") {
                            echo  "<script>
                                    alert('Svp vérifier votre Email!');
                                </script>";
                         }
                          else{
                           // session_start();
                           // $_SESSION['email'] = $_POST['email'];
                           // $_SESSION['password'] = $_POST['password'];
                           // $page = $_SERVER['PHP_SELF'];
                            header("Refresh: 0; url=$page");
                            header('Location: examiner.php');
                         }
                        }
                    }
                  }
                       
                    ?>
                    <form method="post" role="form" id="fonnn">

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>

                                <input type="text" class="form-control" name="txt_email" id="email" placeholder="Email" autocomplete="off" data-mask="email" required/>
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>

                                <input type="password" class="form-control" name="txt_password" id="password" placeholder="Mot de passe" autocomplete="off" required/>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" name="btn-login" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                                Entrée
                            </button>
                        </div>

<?php 
    

?>
                    </form>



                </div>

            </div>

        </div>


        <!-- Bottom Scripts -->
        <script src="assets/js/gsap/main-gsap.js"></script>
        <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/neon-api.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/neon-login.js"></script>
        <script src="assets/js/neon-custom.js"></script>
        <script src="assets/js/neon-demo.js"></script>

    </body>
</html>