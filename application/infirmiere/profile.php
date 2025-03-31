            <?php 
                $bdd = new PDO('mysql:host=localhost;dbname=medical','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                 if (isset($_POST['nom']))
                {
                    $requete = $bdd->prepare('UPDATE infirmiere SET NOM_I=? where INFRMIERE_ID=?');
                    $requete->execute(array($_POST['nom'],$_SESSION['user_session']));
                    
                }
                if (isset($_POST['email']))
                {
                    $requete = $bdd->prepare('UPDATE infirmiere SET EMAIL_I=? where INFRMIERE_ID=?');
                    $requete->execute(array($_POST['email'],$_SESSION['user_session']));
                   
                }
                $requete_f = $bdd->prepare('SELECT NOM_I,EMAIL_I FROM infirmiere where INFRMIERE_ID=?');
                    $requete_f->execute(array($_SESSION['user_session']));
                while ($donnees_f = $requete_f->fetch()) {
                    $nom=$donnees_f['NOM_I'];
                    $email=$donnees_f['EMAIL_I'];
                }
            ?>

                <div class="panel panel-primary" style="border-color:#ccc;">
            <div class="panel-heading" style=" border-color: #ccc; color:#818da1;">
                <div class="panel-title">
                    Editer le profile                </div>
            </div>
            <div class="panel-body" >
                                    <form action="" method="post" accept-charset="utf-8" class="form-horizontal form-groups validate" target="_top" novalidate="novalidate">                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"  name="nom" value="<?php echo $nom;?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" value="<?php echo $email;?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-5">
                              <button type="submit" class="btn">Editer</button>
                          </div>
                            </div>
                    </form>
                                </div>
        </div>


        <div class="panel panel-primary" style="border-color:#ccc;">
            <div class="panel-heading" style="border-color: #ccc; color:#818da1;">
                <div class="panel-title">
                    Changer le mot de passe             </div>
            </div>
            <div class="panel-body" >
                                            <form action="" method="post" accept-charset="utf-8" class="form-horizontal form-groups validate" target="_top" novalidate="novalidate">                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mot de passe actuel</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control"  name="password" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">nouveau mot de passe</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control"  name="new_password" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirmez le mot de passe</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control"  name="confirm_new_password" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn">Editer</button>
                              </div>
                                </div>
                        </form>
                                    </div>
        </div>
     <?php
    {
        if(isset($_POST['password'],$_POST['new_password'],$_POST['confirm_new_password']))
        {
            $pass=md5($_POST['password']);
            $passnew=md5($_POST['new_password']);
            $passcofirmd=md5($_POST['confirm_new_password']);
            if ($_POST['new_password']==$_POST['confirm_new_password']) {
                $requete_s = $bdd->prepare('SELECT PASSWORD_I FROM infirmiere where INFRMIERE_ID=?');
                $requete_s->execute(array($_SESSION['user_session']));
                $donnees_s = $requete_s->fetch();
                    if($donnees_s['PASSWORD_I']==$pass) {
                        $requete = $bdd->prepare('UPDATE infirmiere SET PASSWORD_I =? where INFRMIERE_ID=?');
                        $requete->execute(array($passnew,$_SESSION['user_session']));
                     
                    }
                    else{
                        echo "Mot de passe actuel incorect";
                    }
            }
            else{
                echo "Confirmation de Mot de passe incorect";
            } 
        }
    }
    ?>
               