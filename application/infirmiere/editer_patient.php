
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter patient</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label" style="width: 130px;">Nom</label>
                  <div class="col-sm-5">
                    <input type="text" name="patient_nom" class="form-control" id="field-1" value="<?php echo $donnees['NOM_P']; ?>" style="width: 218px;">
                  </div>
            </div>

                    <hr>
 
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label" style="width: 130px;">Email</label>
                  <div class="col-sm-5">
                    <input type="email" name="email" class="form-control" id="field-1" value="<?php echo $donnees['EMAIL_P']; ?>" style="width: 218px;">
                  </div>
            </div>
                    
                    <hr>
      
            <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label" style="width: 130px;">Mobile</label>
                      <div class="col-sm-5">
                        <input type="number" name="patient_mobile_num" class="form-control" id="field-1" value="<?php echo $donnees['MOBILE_P']; ?>" style="width: 218px;">
                      </div>
            </div>
                    
                    <hr>

            <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label" style="width: 130px;">Date naissance</label>
                      <div class="col-sm-5">
                        <input type="text" name="patient_date_naissance" class="form-control" id="field-1"  style="width: 218px;"value="<?php echo $donnees['DATE_NAISSANCE']; ?>">
                      </div>
            </div>
                    
                    <hr>
                    
            <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label" style="width: 130px;">Sexe</label>
                      <div class="col-sm-5">
                        <select name="patient_sexe" class="form-control" placeholder="Selectionner Service" value="<?php echo $donnees['SEXE']; ?>" style="width: 218px;">                                                          
                                    <option value="male">male</option>
                                    <option value="female">female</option>                                                                
                        </select>
                      </div>
            </div>

                    <hr>
 
            <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label" style="width: 130px;">Chambre</label>
                      <div class="col-sm-5">
                        <select name="chambre" class="form-control" placeholder="Selectionner chambre" value="<?php echo $donnees['NUM_CHAMBRE']; ?>" style="width: 218px;">                          
                                <?php
                                  $requete_s = $bdd->query('SELECT * FROM chambre');
                                    while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['NUM_CHAMBRE'] . "> " . $donnees_s['NUM_CHAMBRE'] . "</option>";}
                                ?>
                                                                
                        </select>
                      </div>
            </div>
                                        
                    <hr>
 
            <div class="col-sm-3 control-label col-sm-offset-2" style="float: right;">
                <input type="submit" class="btn"  value="Submit">
            </div>
            <br>
          </form>
    <?php
    {
        if (isset($_POST['patient_nom'],$_POST['chambre'],$_POST['patient_mobile_num'],$_POST['patient_sexe'],$_POST['email'],$_POST['password'],$_POST['patient_date_naissance']))
        {
           /* $DATE_DEBUT_H="0000-00-00";
            $DATE_FIN_H="0000-00-00";
            $neta="0";
            
            $requete = $bdd->query('INSERT INTO hospitatlisation(
                                                                DATE_DEBUT_H,
                                                                DATE_FIN_H) 
                                    VALUES(
                                                                $DATE_DEBUT_H,
                                                                $DATE_FIN_H)
                                    ');

            $requete = $bdd->query('INSERT INTO chambre(
                                                        ID_HOSPITALISATION,
                                                        NUM_ETAGE) 
                                    VALUES(
                                                        (select ID_HOSPITALISATION from hospitalisation where DATE_DEBUT_H = $DATE_DEBUT_H),
                                                        $neta)
                                    ');*/

            $requete = $bdd->prepare('UPDATE patient set 
                                                          NOM_P = ?,
                                                          NUM_CHAMBRE = ?,
                                                          MOBILE_P = ?,
                                                          SEXE = ?,
                                                          EMAIL_P = ?,
                                                          PASSWORD_P = ?,
                                                          DATE_NAISSANCE = ?,
                                      where NOM_P = ?
                                    ');

            $requete->execute(array($_POST['patient_nom'],$_POST['chambre'],$_POST['patient_mobile_num'],$_POST['patient_sexe'],$_POST['email'],$_POST['password'],$_POST['patient_date_naissance'],$donnees['NOM_P']));
        }
    }
    ?>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>