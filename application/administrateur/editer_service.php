<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter Infirmière</h4>
        </div>
        <div class="modal-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Nom</label>

                        <div class="col-sm-5">
                            <input type="text" name="service_nom2" value="<?php echo $donnees['NOM_S']; ?>" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="desription"  class="form-control wysihtml5" id="field-ta" style="width: 218px;"><?php echo $donnees['DESCRIPTION_S']; ?></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
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
        if (isset($_POST['NOM_S'],$_POST['DESCRIPTION_S']))
        {
            $requete = $bdd->prepare('UPDATE service set NOM_S=?, where SERVICE_ID=? ');
            $requete->execute(array($_POST['NOM_S'],$_POST['DESCRIPTION_S'],$donnees['SERVICE_ID']));
            $c=0;
        }
    }
    ?>

  </div>