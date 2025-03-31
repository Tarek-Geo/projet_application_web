
<div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
          <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 90px;">Médecin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 90px;">Patient</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 120px;">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 163px;">Description</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
        $verf=0;
        $nomp="";
        $nomm="";
        $requete = $bdd->query('SELECT * FROM rapport WHERE type="naissance"');
        while($donnees = $requete->fetch())
        {$verf=1;}

        $requete = $bdd->query('SELECT * FROM rapport WHERE type="naissance"');
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
                