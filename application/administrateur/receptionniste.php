 <?php
    {
        if (isset($_POST['receptionniste_nom'],$_POST['adresse'],$_POST['rec_mobile_num'],$_POST['email'],$_POST['password']))
        {
            $pass=md5($_POST['password']);
            $requete = $bdd->prepare('INSERT INTO receptionniste(NOM_R,ADRESSE_R,MOBILE_R,EMAIL_R,PASSWORD_R) VALUES(?,?,?,?,?)');
            $requete->execute(array($_POST['receptionniste_nom'],$_POST['adresse'],$_POST['rec_mobile_num'],$_POST['email'],$pass));
        }
    }
    ?>

<button class="btn" style="float: right;" data-toggle="modal" data-target="#myModal" href="#">
        Ajouter Récéptionniste</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter Infirmière</h4>
        </div>
        <div class="modal-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Nom</label>
                        <div class="col-sm-5">
                            <input type="text" name="receptionniste_nom" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Email</label>

                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Mot de passe</label>

                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Adresse</label>
                        <div class="col-sm-5"><textarea name="adresse" class="form-control wysihtml5" id="field-ta" style="width: 218px;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Mobile</label>

                        <div class="col-sm-5">
                            <input type="number" name="rec_mobile_num" class="form-control" id="field-1" style="
    width: 218px;
" maxlength="10">
                        </div>
                    </div>
                                    
                    <div class="btn">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                    
                </form>
   
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
        <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Image: activate to sort column descending" style="width: 84px;">Image</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Nom</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Email</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Adresse</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Mobile</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 263px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
        $c=1;
		$requete = $bdd->query('SELECT * FROM receptionniste');
		while($donnees = $requete->fetch())
		{$verf=1;}

		$requete = $bdd->query('SELECT * FROM receptionniste');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'>
                <td class='' sorting_1'>
                    <img src='../assets/images/rec.png' class='img-circle' width='40px' height='40px'>
                </td>
                <td>"  . $donnees['NOM_R'].       	"</td>
                <td>"  . $donnees['EMAIL_R'].             	"</td>
                <td>"  . $donnees['ADRESSE_R'].        "</td>
                <td>"  . $donnees['MOBILE_R'].                 "</td>
                <td>
                	<form action='' method='post'>
                    <button name='edit' class='btn btn-default btn-sm btn-icon icon-left' data-toggle='modal' data-target='#myModal2'><i class='entypo-pencil' style='color:#fff;'></i>Editer</button>
                    <button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['RECEPTION_ID']. "><i class='entypo-cancel'></i>Supprimer</button>
                	</form>
                </td>
    			</tr>";
                include("editer_rec.php");
                if ($c==0) header("Location: ../administrateur/index.php?p=receptionniste");
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM receptionniste WHERE RECEPTION_ID=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../administrateur/index.php?p=receptionniste");
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
                