<button class="btn" style="float: right;" data-toggle="modal" data-target="#myModal" href="#">
        Ajouter hospitalisation</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter hospitalisation</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Patient</label>
                         <div class="col-sm-5">
                            <select name="patient" class="form-control" style="
    width: 218px;
" required>                            <option value="">Selectionner patient</option>
                                <?php
                                  $requete_s = $bdd->query('SELECT * FROM Patient');
                                    while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['PATIENT_ID'] . "> " . $donnees_s['NOM_P'] . "</option>";}
                                ?>
                                                                
                            </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">N°Chambre</label>
                         <div class="col-sm-5">
                            <select name="chambre" class="form-control"  style="
    width: 218px;
" required>                          <option value="">Selectionner chambre</option>
                                <?php
                                  $requete_s = $bdd->query('SELECT * FROM chambre WHERE etat_ocupation="0"');
                                    while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['num_chambre'] . "> Chambre : " . $donnees_s['num_chambre']."  Etage :". $donnees_s['num_etage'] . "</option>";}
                                ?>                           
                            </select>
                    </div>
                    </div>
                    

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date debut</label>


                        <div class="btn">
                          <input type="date" name="date_debut" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date fin</label>


                        <div class="btn">
                          <input type="date" name="date_fin" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>
                       
                       
                    
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['patient'],$_POST['chambre'],$_POST['date_debut'],$_POST['date_fin']))
        {
           
            $requete = $bdd->prepare('INSERT INTO hospitalisation(
                                                          PATIENT_ID,
                                                          n_chambre,
                                                          date_debut,
                                                          date_fin
                                                          )
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?
                                                          )
                                    ');

            $requete->execute(array($_POST['patient'],$_POST['chambre'],$_POST['date_debut'],$_POST['date_fin']));
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
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Patient</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 123px;">N°Chambre - N°Etage</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 74px;">Date debut</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 129px;">Date fin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 263px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
    $nomp="";
    $etage="";
		$requete = $bdd->query('SELECT * FROM hospitalisation');
		while($donnees = $requete->fetch())
		{$verf=1;}


		$requete = $bdd->query('SELECT * FROM hospitalisation');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'>";
                $requete2 = $bdd->prepare('SELECT NOM_P FROM patient WHERE PATIENT_ID=?'); 
                $requete2->execute(array($donnees['PATIENT_ID']));
                while($donnees2 = $requete2->fetch()) { $nomp=$donnees2['NOM_P'];} 
                echo "<td>"  . $nomp .   "</td>";
                $requete_s = $bdd->query('SELECT * FROM chambre');
                while($donnees_s = $requete_s->fetch()){$etage=$donnees_s['num_etage'];}
                echo "<td>"  . $donnees['n_chambre']. " - ". $etage .	"</td>
                <td>"  . $donnees['date_debut'] .              	"</td>
                <td>"  . $donnees['date_fin'].               	"</td>
                <td>
                	<form action='' method='post'>
                    
                    ";
                                        
                    echo "<button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['hospitalisation_id']. "><i class='entypo-cancel'></i>Supprimer</button>
                	</form>
                </td>
    			</tr>";
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM hospitalisation WHERE hospitalisation_id=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../medecin/index.php?p=hospitalisation");
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
                