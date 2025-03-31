<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editer Réceptionniste</h4>
        </div>
        <div class="modal-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Nom</label>

                        <div class="col-sm-5">
                            <input type="text" name="receptionniste_nom2" value="<?php echo $donnees['NOM_R']; ?>" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Email</label>

                        <div class="col-sm-5">
                            <input type="email" name="email2" value="<?php echo $donnees['EMAIL_R']; ?>" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Adresse</label>
                        <div class="col-sm-5"><textarea name="adresse2"  class="form-control wysihtml5" id="field-ta" style="width: 218px;"><?php echo $donnees['ADRESSE_R']; ?></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Mobile</label>
                        <div class="col-sm-5">
                            <input type="number" name="rec_mobile_num2"  value="<?php echo $donnees['MOBILE_R']; ?>" class="form-control" id="field-1" style="
    width: 218px;
" maxlength="10">
                        </div>
                    </div>
<br><hr>                                   
                    <div class="btn">
                        <input type="submit" class="btn btn-success" value="Editer">
                    </div>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>

 <?php
    {
        if (isset($_POST['receptionniste_nom2'],$_POST['adresse2'],$_POST['rec_mobile_num2'],$_POST['email2']))
        {
            $requete = $bdd->prepare('UPDATE receptionniste set NOM_R=?,ADRESSE_R=?,MOBILE_R=?,EMAIL_R=? where RECEPTION_ID=? ');
            $requete->execute(array($_POST['receptionniste_nom2'],$_POST['adresse2'],$_POST['rec_mobile_num2'],$_POST['email2'],$donnees['RECEPTION_ID']));
            $c=0;
        }
    }
    ?>

  </div>