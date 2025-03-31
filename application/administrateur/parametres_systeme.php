            <?php 
                $bdd = new PDO('mysql:host=localhost;dbname=medical','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                 if (isset($_POST['nom']))
                {
                    $requete = $bdd->prepare('UPDATE system SET name_system=?');
                    $requete->execute(array($_POST['nom']));
                }
                if (isset($_POST['txt']))
                {
                    $requete = $bdd->prepare('UPDATE system SET txt_align=?');
                    $requete->execute(array($_POST['txt']));
                    header("Location: ../administrateur/index.php?p=parametres_systeme");
                }
                $requete_f = $bdd->query('SELECT name_system,txt_align FROM system');
                while ($donnees_f = $requete_f->fetch()) {
                    $nom=$donnees_f['name_system'];
                    $txt=$donnees_f['txt_align'];
                }
            ?>

                <div class="panel panel-primary" style="border-color:#ccc;">
            <div class="panel-heading" style=" border-color: #ccc; color:#818da1;">
                <div class="panel-title">
                    Editer le profile                </div>
            </div>
            <div class="panel-body" >
                                    <form action="" method="post" accept-charset="utf-8" class="form-horizontal form-groups validate" target="_top" novalidate="novalidate">                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nom du système</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"  name="nom" value="<?php echo $nom;?>">
                            </div>
                        </div>

                         <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Alignment du texte</label>

                        <div class="col-sm-5">
                            <select name="txt" class="form-control" placeholder="Selectionner Service" style="
    width: 218px;
">                          
                                <option value="left-to-right">left-to-right</option>

                                <option value="right-to-left">right-to-left</option>
                                ?>
                                                                
                            </select>
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