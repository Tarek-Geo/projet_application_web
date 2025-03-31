<button class="btn" style=" 
    border-radius: 0 3px 3px 0;
    background-clip: padding-box;
    border-right-width: 1px;
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 12px;
    line-height: 1.42857143;
    background-color: #ffffff;
    border-color: #ebebeb;
    float: right;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-right: 5px;
    " data-toggle="modal" data-target="#myModal" href="#">
        Ajouter rapport décès</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter rapport décès</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label" style="
width: 130px;
">Consultation par date</label>
                    <div class="col-sm-5">
                        <select name="consul" class="form-control" placeholder="Selectionner chambre" style="width: 218px;">                          
                        <?php
                            $requete_s = $bdd->query('SELECT * FROM consultation');
                            while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['ID_CONSULTATION'] . "> " . $donnees_s['DATE_C'] . "</option>";}
                        ?>
                        </select>
                    </div>
                     </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date rapport</label>


                        <div class="btn">
                          <input type="date" name="date" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="description" class="form-control wysihtml5" id="field-ta" style="width: 218px;" required></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
                    
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        $type="deces";
        if (isset($_POST['consul'],$_POST['date'],$_POST['description']))
        {
           

            $requete = $bdd->prepare('INSERT INTO rapport(
                                                          ID_CONSULTATION,
                                                          TYPE,
                                                          DATE_RAPPORT,
                                                          DESCRIPTION_R
                                                          )
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?
                                                          )
                                    ');

            $requete->execute(array($_POST['consul'],$type,$_POST['date'],$_POST['description']));
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
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 90px;">Médecin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 90px;">Patient</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 120px;">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 163px;">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 263px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
        $nomp="";
        $nomm="";
		$requete = $bdd->query('SELECT * FROM rapport WHERE type="deces"');
		while($donnees = $requete->fetch())
		{$verf=1;}

		$requete = $bdd->query('SELECT * FROM rapport WHERE type="deces"');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'>";

                $requete4 = $bdd->prepare('SELECT MEDECIN_ID FROM consultation WHERE ID_CONSULTATION=?'); 
                $requete4->execute(array($donnees['ID_CONSULTATION']));
                while($donnees4 = $requete4->fetch()) { $idm=$donnees4['MEDECIN_ID'];} 
                $requete5 = $bdd->prepare('SELECT NOM_M FROM medecin WHERE MEDECIN_ID=?'); 
                $requete5->execute(array($idm));
                while($donnees5 = $requete5->fetch()) { $nomm=$donnees5['NOM_M'];} 
                echo "<td>"  . $nomm .       "</td>";

                $requete2 = $bdd->prepare('SELECT PATIENT_ID FROM consultation WHERE ID_CONSULTATION=?'); 
                $requete2->execute(array($donnees['ID_CONSULTATION']));
                while($donnees2 = $requete2->fetch()) { $idp=$donnees2['PATIENT_ID'];} 
                $requete3 = $bdd->prepare('SELECT NOM_P FROM patient WHERE PATIENT_ID=?'); 
                $requete3->execute(array($idp));
                while($donnees3 = $requete3->fetch()) { $nomp=$donnees3['NOM_P'];} 
                echo "<td>"  . $nomp .             "</td>";
                echo "<td>"  . $donnees['DATE_RAPPORT'].                    "</td>";
                echo "<td>"  . $donnees['DESCRIPTION_R'].              "</td>
                <td>
                    <form action='' method='post'>
                    
                    <button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['ID_RAPPORT']. "><i class='entypo-cancel'></i>Supprimer</button>
                    </form>
                </td>
                    </tr>";
                       if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM rapport WHERE ID_RAPPORT=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../medecin/index.php?p=rapport_deces");
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
           <!-- <div class="row"><div class="col-xs-9 col-right"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination pagination-sm"><li class="prev disabled"><a href="#"><i class="entypo-left-open"></i></a></li><li class="active"><a href="#">1</a></li><li class="next disabled"><a href="#"><i class="entypo-right-open"></i></a></li></ul></div></div></div>-->
        </div>
               