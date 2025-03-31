<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editer Patient</h4>
        </div>
        <div class="modal-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Nom</label>

                        <div class="col-sm-5">
                            <input type="text" name="pat_nom2" value="<?php echo $donnees['NOM_P']; ?>" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Email</label>

                        <div class="col-sm-5">
                            <input type="email" name="email2" value="<?php echo $donnees['EMAIL_P']; ?>" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>                    
<br><hr>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Mobile</label>
                        <div class="col-sm-5">
                            <input type="number" name="pat_mobile_num2"  value="<?php echo $donnees['MOBILE_P']; ?>" class="form-control" id="field-1" style="
    width: 218px;
" maxlength="10">
                        </div>
                    </div>
<br><hr>
                             
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Sexe</label>

                        <div class="col-sm-5">
                            <select name="sexe" class="form-control" placeholder="" style="
    width: 218px;
" required>                                    <option value="">Selectionner</option>                      
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                                                
                            </select>
                        </div>
                        </div>
                    
<br><hr>
 <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Date de naissances</label>

                        <div class="col-sm-5">
                            <input type="date" name="date_naiss" value="<?php echo $donnees['DATE_NAISSANCE']; ?>" class="form-control" id="field-1" style="width: 218px;" required>
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
        if (isset($_POST['pat_nom2'],$_POST['sexe'],$_POST['pat_mobile_num2'],$_POST['email2'],$_POST['date_naiss']))
        {
            $requete = $bdd->prepare('UPDATE patient set NOM_P=?,SEXE=?,MOBILE_P=?,EMAIL_P=?,DATE_NAISSANCE=? where PATIENT_ID=? ');
            $requete->execute(array($_POST['pat_nom2'],$_POST['sexe'],$_POST['pat_mobile_num2'],$_POST['email2'],$_POST['date_naiss'],$donnees['PATIENT_ID']));
            $c=0;
        }
    }
    ?>

  </div>