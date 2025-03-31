<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editer Médecin</h4>
        </div>
        <div class="modal-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Nom</label>

                        <div class="col-sm-5">
                            <input type="text" name="med_nom2" value="<?php echo $donnees['NOM_M']; ?>" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Email</label>

                        <div class="col-sm-5">
                            <input type="email" name="email2" value="<?php echo $donnees['EMAIL_M']; ?>" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Adresse</label>
                        <div class="col-sm-5"><textarea name="adresse2"  class="form-control wysihtml5" id="field-ta" style="width: 218px;"><?php echo $donnees['ADRESSE_M']; ?></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Mobile</label>
                        <div class="col-sm-5">
                            <input type="number" name="med_mobile_num2"  value="<?php echo $donnees['MOBILE_M']; ?>" class="form-control" id="field-1" style="
    width: 218px;
" maxlength="10">
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Service</label>

                        <div class="col-sm-5">
                            <select name="service_id" class="form-control" placeholder="Selectionner Service" style="
    width: 218px;
">                           <?php
                                  $requete_s = $bdd->query('SELECT * FROM service');
                                    while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['SERVICE_ID'] . "> " . $donnees_s['NOM_S'] . "</option>";}
                                ?>
                    
                            </select>
                        </div>
                    </div>
<br><hr>
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Profile</label>
                        <div class="col-sm-5"><textarea name="profile" value="<?php echo $donnees['profile']; ?>" class="form-control wysihtml5" id="field-ta" style="width: 218px;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
<br><hr>                
     <div style="float: right;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>                 
                    <div class="btn">
                        <input type="submit" class="btn btn-success" value="Editer">

                    </div>
                </form>
                
        </div>
        
      </div>
    </div>

 <?php
    {
        if (isset($_POST['med_nom2'],$_POST['adresse2'],$_POST['email2'],$_POST['med_mobile_num2'],$_POST['service_id'],$_POST['profile']))
        {
            $requete = $bdd->prepare('UPDATE medecin set NOM_M=?,ADRESSE_M=?,MOBILE_M=?,EMAIL_M=?,SERVICE_ID=?,profile=? where MEDECIN_ID=? ');
            $requete->execute(array($_POST['med_nom2'],$_POST['adresse2'],$_POST['med_mobile_num2'],$_POST['email2'],$_POST['service_id'],$_POST['profile'],$donnees['MEDECIN_ID']));
            $c=0;
        }
    }
    ?>

  </div>