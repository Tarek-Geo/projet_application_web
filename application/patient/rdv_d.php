
<button class="btn" style="float: right;" data-toggle="modal" data-target="#myModal" href="#">
        Ajouter RDV</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter RDV</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                     <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Médecin</label>

                        <div class="col-sm-5">
                            <select name="med_id" class="form-control" style="
    width: 218px;
" required>                          <option value="">Selectionner médecin</option>
                                <?php
                                  $requete_s = $bdd->query('SELECT * FROM medecin');
                                    while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['MEDECIN_ID'] . "> " . $donnees_s['NOM_M'] . "</option>";}
                                ?>
                                                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date</label>


                        <div class="btn">
                          <input type="date" name="date" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Temps</label>


                        <div class="btn">
                          <input type="time" name="temps" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>
                    
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                    <br>
                </form>
    <?php
    {
        $etat="demander";
        if (isset($_POST['med_id'],$_POST['date'],$_POST['temps']))
        {
           
            $requete = $bdd->prepare('INSERT INTO rendez_vous(
                                                          MEDECIN_ID,
                                                          PATIENT_ID,
                                                          ETAT,
                                                          DATE,
                                                          TEMPS
                                                          ) 
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?
                                                          )
                                    ');

            $requete->execute(array($_POST['med_id'],$user_id,$etat,$_POST['date'],$_POST['temps']));
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


<div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Patient</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Médecin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 96px;">Temps</th>></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
        $verf=0;
        $nomp="";
        $nomm="";
        $requete = $bdd->prepare('SELECT * FROM rendez_vous WHERE PATIENT_ID=?');
        $requete->execute(array($_SESSION['user_session']));
        while($donnees = $requete->fetch())
        {$verf=1;}

        $requete = $bdd->prepare('SELECT * FROM rendez_vous WHERE PATIENT_ID=?');
        $requete->execute(array($_SESSION['user_session']));
        if($verf==1)
        while($donnees = $requete->fetch())
        {
                if($donnees['ETAT']=="demander"){
                echo "<tr class='odd'>";                
                $requete2 = $bdd->prepare('SELECT NOM_P FROM patient WHERE PATIENT_ID=?'); 
                $requete2->execute(array($donnees['PATIENT_ID']));
                while($donnees2 = $requete2->fetch()) { $nomp=$donnees2['NOM_P'];} 
                echo "<td>"  . $nomp .          "</td>";
                $requete3 = $bdd->prepare('SELECT NOM_M FROM medecin WHERE MEDECIN_ID=?'); 
                $requete3->execute(array($donnees['MEDECIN_ID']));
                while($donnees3 = $requete3->fetch()) { $nomm=$donnees3['NOM_M'];} 
                echo "<td>"  . $nomm .          "</td>
                <td>"  . $donnees['DATE'].              "</td>
                <td>"  . $donnees['TEMPS'].             "</td>
                
                </tr>";
                
         }
         } 
           else{
                echo "<tr class='odd'><td colspan=8 style='background-color: rgba(50,50,50,0.1);'>Aucune donnée disponible !</td></tr>";
            }  
       
    /*
    */
}?>
</tbody>
</table>    
      </div>
               