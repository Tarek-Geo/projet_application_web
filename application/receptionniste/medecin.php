
<div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
        <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Image: activate to sort column descending" style="width: 84px;">Image</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Nom</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Email</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 96px;">Adresse</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 74px;">Mobile</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 129px;">Service</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Profile: activate to sort column ascending" style="width: 75px;">Profile</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
    $noms="";
        $verf=0;
        $requete = $bdd->query('SELECT * FROM medecin');
        while($donnees = $requete->fetch())
        {$verf=1;}


        $requete = $bdd->query('SELECT * FROM medecin');
        if($verf==1)
        while($donnees = $requete->fetch())
        {

                echo "<tr class='odd'>
                <td class='' sorting_1'>
                    <img src='../assets/images/med.png' class='img-circle' width='40px' height='40px'>
                </td>
                <td>"   . $donnees['NOM_M'].       "</td>
                <td>"   . $donnees['EMAIL_M'].     "</td>
                <td>"   . $donnees['ADRESSE_M'].   "</td>
                <td>"   . $donnees['MOBILE_M'].    "</td>
                <td>";
                $requete2 = $bdd->prepare('SELECT NOM_S FROM service WHERE SERVICE_ID=?');
               $requete2->execute(array($donnees['SERVICE_ID']));
               while($donnees2 = $requete2->fetch()) { $noms=$donnees2['NOM_S'];}
                   echo $noms .  "</td>
                <td>".$donnees['profile']."</td>
                </tr>";
            }
        else{
                echo "<tr class='odd'>
                <td colspan=8 style='background-color: rgba(50,50,50,0.1); '>Aucune donnée disponible !</td></tr>";
            }

      $requete = $bdd->query('SELECT * FROM medecin');
        while($donnees = $requete->fetch())
        {
        if (isset($_POST['medecin_nom_e'],$_POST['service_nom_e'],$_POST['medecin_mobile_num_e'],$_POST['email_e'],$_POST['password_e']))
        {
            $requete = $bdd->prepare('UPDATE medecin set NOM_M=?,service_nom=?,MOBILE_M=?,EMAIL_M=?,PASSWORD_M=? where MEDECIN_ID=?');
            $requete->execute(array($_POST['medecin_nom_e'],$_POST['service_nom_e'],$_POST['medecin_mobile_num_e'],$_POST['email_e'],$_POST['password_e'],$donnees['MEDECIN_ID']));
        }
    }
    /*
    */
}?>
</tbody>
</table>    
           </div>
               