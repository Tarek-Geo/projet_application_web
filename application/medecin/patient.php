<div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
        <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Image: activate to sort column descending" style="width: 84px;">Image</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Nom</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Email</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 74px;">Mobile</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 129px;">N°Chambre - N°Etage</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 129px;">Date naissance</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Profile: activate to sort column ascending" style="width: 75px;">Sexe</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
		$chambre_num="";
		$etage="";
		$requete = $bdd->query('SELECT * FROM patient');
		while($donnees = $requete->fetch())
		{$verf=1;}


		$requete = $bdd->query('SELECT * FROM patient');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'>
                <td class='' sorting_1'>
                    <img src='../assets/images/pat.png' class='img-circle' width='40px' height='40px'>
                </td>
                <td>"  . $donnees['NOM_P'].       	"</td>";
                echo "<td>"  . $donnees['EMAIL_P'].       "</td>
                <td>"  . $donnees['MOBILE_P'].	"</td>";

                $requete_s = $bdd->prepare('SELECT * FROM hospitalisation where n_chambre=?');
                $requete_s->execute(array($chambre_num));
                while($donnees_s = $requete_s->fetch()){$chambre_num=$donnees_s['n_chambre'];}

                $requete_c = $bdd->query('SELECT * FROM chambre');
                while($donnees_c = $requete_c->fetch()){$chambre_num=$donnees_c['num_chambre'];
				$etage=$donnees_c['num_etage'];
            	}

                
 				echo "<td>"  . $chambre_num .       " - "  . $etage .	"</td>";
                echo "<td>"  . $donnees['DATE_NAISSANCE'] .              	"</td>
                <td>"  . $donnees['SEXE'].               	"</td>
                
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
   </div>
                