<button class="btn" style="float: right;" data-toggle="modal" data-target="#myModal" href="#">
        Ajouter Consultation</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter Consultation</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                     <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Patient</label>
                         <div class="col-sm-5">
                            <select name="patient" class="form-control" placeholder="Selectionner chambre" style="
    width: 218px;
">                          
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
">Infirmière</label>
                         <div class="col-sm-5">
                            <select name="inf" class="form-control" placeholder="Selectionner chambre" style="
    width: 218px;
">                          
                                <?php
                                  $requete_s = $bdd->query('SELECT * FROM infirmiere');
                                    while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['INFRMIERE_ID'] . "> " . $donnees_s['NOM_I'] . "</option>";}
                                ?>
                                                                
                            </select>
                        </div>
                        </div>
                    

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date</label>


                        <div class="btn">
                          <input type="date" name="c_date" class="form-control" id="field-1" style="
    width: 218px;
">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="description" class="form-control wysihtml5" id="field-ta" style="width: 218px;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>

                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['patient'],$_POST['inf'],$_POST['c_date'],$_POST['description']))
        {
            $requete = $bdd->prepare('INSERT INTO consultation(
                                                          PATIENT_ID,
                                                          INFRMIERE_ID,
                                                          DATE_C,
                                                          DESCRIPTION_C) 
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?
                                                          )
                                    ');
            $requete->execute(array($_POST['patient'],$_POST,$_POST['inf'],$_POST['c_date'],$_POST['description']));
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
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 90px;">Patient</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 90px;">Médecin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 90px;">Infirmière</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 90px;">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 90px;">DESCRIPTION</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
		$requete = $bdd->query('SELECT * FROM  consultation');
		while($donnees = $requete->fetch())
		{$verf=1;}

		$requete = $bdd->query('SELECT * FROM  consultation');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'>";
                $requete2 = $bdd->prepare('SELECT NOM_P FROM patient WHERE PATIENT_ID=?'); 
                $requete2->execute(array($donnees['PATIENT_ID']));
                while($donnees2 = $requete2->fetch()) { $nomp=$donnees2['NOM_P'];} 
                echo "<td>"  . $nomp .   "</td>";
                $requete3 = $bdd->prepare('SELECT NOM_M FROM medecin WHERE MEDECIN_ID=?'); 
                $requete3->execute(array($donnees['MEDECIN_ID']));
                while($donnees3 = $requete3->fetch()) { $nomm=$donnees3['NOM_M'];} 
                echo "<td>"  . $nomm .   "</td>";
                $requete4 = $bdd->prepare('SELECT NOM_I FROM infirmiere WHERE INFRMIERE_ID=?'); 
                $requete4->execute(array($donnees['INFRMIERE_ID']));
                while($donnees4 = $requete4->fetch()) { $nomi=$donnees4['NOM_I'];} 
                echo "<td>"  . $nomi .  "</td>
                <td>"  . $donnees['DATE_C'].        "</td>
                <td>"  . $donnees['DESCRIPTION_C'].             "</td>
                    </tr>";
        }
    	else{
				echo "<tr class='odd'><td colspan=8 style='background-color: rgba(50,50,50,0.1);'>Aucune donnée disponible !</td></tr>";
			}
    /*
    */
}?>
</tbody>
</table>    
           <!-- <div class="row"><div class="col-xs-9 col-right"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination pagination-sm"><li class="prev disabled"><a href="#"><i class="entypo-left-open"></i></a></li><li class="active"><a href="#">1</a></li><li class="next disabled"><a href="#"><i class="entypo-right-open"></i></a></li></ul></div></div></div>-->
        </div>
               