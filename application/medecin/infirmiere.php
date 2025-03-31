
    
<div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
        <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Image: activate to sort column descending" style="width: 84px;">Image</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Nom</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Email</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 96px;">Adresse</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 96px;">Mobile</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
		$requete = $bdd->query('SELECT * FROM infirmiere');
		while($donnees = $requete->fetch())
		{$verf=1;}

		$requete = $bdd->query('SELECT * FROM infirmiere');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'>
                <td class='' sorting_1'>
                    <img src='../assets/images/inf.png' class='img-circle' width='40px' height='40px'>
                </td>
                <td>"  . $donnees['NOM_I'].       	"</td>
                <td>"  . $donnees['EMAIL_I'].             	"</td>
                <td>"  . $donnees['ADRESSE_I'].             "</td>
                <td>"  . $donnees['MOBILE_I'].             "</td>
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
               