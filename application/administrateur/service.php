  <button type="button" class="btn" style="float: right;" data-toggle="modal" data-target="#myModal">Ajouter service</button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter service</h4>
        </div>
        <div class="modal-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Nom</label>

                        <div class="col-sm-5">
                            <input type="text" name="service_nom" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="description" class="form-control wysihtml5" id="field-ta" style="width: 218px;" required></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
                    <div class="btn">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['service_nom'],$_POST['description']))
        {
            $requete = $bdd->prepare('INSERT INTO service(NOM_S,DESCRIPTION_S) VALUES(?,?)');
            $requete->execute(array($_POST['service_nom'],$_POST['description']));
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
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Nom</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 263px;">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 93px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{

		$verf=0;
        $c=1;
		$requete = $bdd->query('SELECT * FROM service');
		while($donnees = $requete->fetch())
		{$verf=1;}
		$requete = $bdd->query('SELECT * FROM service');
		if($verf==1)
		while($donnees = $requete->fetch())
		{ 
				echo "<tr class='odd'>
                <td>"  . $donnees['NOM_S'].       	"</td>
                <td>"  . $donnees['DESCRIPTION_S'].   "</td>
                <td>
                	<form action='' method='post'>

                    <button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['NOM_S']. "><i class='entypo-cancel'></i>Supprimer</button>
                	</form>
                </td>
    			</tr>";
            include("editer_service.php");
            if ($c==0) header("Location: ../administrateur/?p=service");
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM service WHERE NOM_S=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../administrateur/?p=service");
        }
    		}
    	else{
				echo "<tr class='odd'><td colspan=8 style='background-color: rgba(50,50,50,0.1);'>Aucune donnée disponible !</td></tr>";
			}
}?>
</tbody>
</table>    
</div>
               
