<div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Patient</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Médecin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 96px;">Temps</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 96px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
        $verf=0;
        $nomp="";
        $nomm="";
        $requete = $bdd->query('SELECT * FROM rendez_vous');
        while($donnees = $requete->fetch())
        {$verf=1;}

        $requete = $bdd->query('SELECT * FROM rendez_vous');
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
                <td>
                    <form action='' method='post'>
                    <button name='valid' class='btn btn-default btn-sm btn-icon icon-left' value=". $donnees['ID_REND_VOUS']. " '><i class='entypo-pencil' style='color:#fff;'></i>Valider</button>
                    <button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['ID_REND_VOUS']. "><i class='entypo-cancel'></i>Supprimer</button>
                    </form>
                </td>
                </tr>";
                  if (isset($_POST['valid']))
        {
            $requete = $bdd->prepare('UPDATE rendez_vous SET ETAT="accepter" WHERE ID_REND_VOUS=?');
            $requete->execute(array($_POST['valid']));
            header("Location: ../receptionniste/index.php?p=rdv_d");
        }



                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM rendez_vous WHERE ID_REND_VOUS=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../receptionniste/index.php?p=rdv_d");
        }
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
               