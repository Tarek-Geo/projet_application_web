<div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Nom</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 263px;">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Temps début</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Temps fin</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
        $desc="";
        $nomm="";
        $temps_d="";
        $date_emp="";
        $temps_f="";
		$requete = $bdd->query('SELECT * FROM rec_emp');
		while($donnees = $requete->fetch())
		{$verf=1;}

		$requete = $bdd->query('SELECT * FROM rec_emp');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'><td>";
                echo $donnees['NOM_R'].   "</td>
                <td>";
                echo $donnees['DESCREPTION']. 	"</td>";
                echo "<td>"  . $donnees['DATE_emp'].   "</td>";
                echo "<td>"  . $donnees['TEMPS_d_emp'] .   "</td>";
                echo "<td>"  . $donnees['TEMPS_f_emp'] .      "</td>
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
    
            
              