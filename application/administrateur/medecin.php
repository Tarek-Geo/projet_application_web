
        <?php
    {
        if (isset($_POST['medecin_nom'],$_POST['service_id'],$_POST['adresse'],$_POST['medecin_mobile_num'],$_POST['email'],$_POST['password'],$_POST['profile']))
        {
            $pass=md5($_POST['password']);
            $requete = $bdd->prepare('INSERT INTO medecin(SERVICE_ID,NOM_M,ADRESSE_M,EMAIL_M,PASSWORD_M,MOBILE_M,profile) VALUES(?,?,?,?,?,?,?)');
            $requete->execute(array($_POST['service_id'],$_POST['medecin_nom'],$_POST['adresse'],$_POST['email'],$pass,$_POST['medecin_mobile_num'],$_POST['profile']));
        }
    }
    ?> 


          <button class="btn" style="float: right;" data-toggle="modal" data-target="#myModal" href="#">
        Ajouter Médecin</button>
         
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter Médecin</h4>
        </div>
        <div class="modal-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Nom</label>

                        <div class="col-sm-5">
                            <input type="text" name="medecin_nom" class="form-control" id="field-1" style="width: 218px;" required>
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
                            <input type="number" name="medecin_mobile_num" class="form-control" id="field-1" style="
    width: 218px;
" maxlength="10">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Service</label>

                        <div class="col-sm-5">
                            <select name="service_id" class="form-control" placeholder="Selectionner Service" style="
    width: 218px;
">                          
                                <?php
                                  $requete_s = $bdd->query('SELECT * FROM service');
                                    while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['NOM_S'] . "> " . $donnees_s['NOM_S'] . "</option>";}
                                ?>
                                                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Profile</label>
                        <div class="col-sm-5"><textarea name="profile" class="form-control wysihtml5" id="field-ta" style="width: 218px;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
                    
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit" >
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
        <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Image: activate to sort column descending" style="width: 84px;">Image</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Nom</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Email</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 96px;">Adresse</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 74px;">Mobile</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 129px;">Service</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Profile: activate to sort column ascending" style="width: 75px;">Profile</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 263px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
    $noms="";
        $verf=0;
         $c=1;
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
                <td>".  $donnees['ADRESSE_M'] .   "</td>
                <td>"   . $donnees['MOBILE_M'].  "</td>
                <td>";
                $requete2 = $bdd->prepare('SELECT NOM_S FROM service WHERE SERVICE_ID=?');
               $requete2->execute(array($donnees['SERVICE_ID']));
               while($donnees2 = $requete2->fetch()) { $noms=$donnees2['NOM_S'];}
                   echo $noms .  "</td>
                <td>".$donnees['profile']."</td>
                <td>
                    <form action='' method='post'>
                    <button class='btn btn-default btn-sm btn-icon icon-left' data-toggle='modal' data-target='#myModal2'><i class='entypo-pencil' style='color:#fff;'></i>Editer</button>
                    <button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['NOM_M']. "><i class='entypo-cancel'></i>Supprimer</button>
                    </form>
                </td>
                </tr>";
                include("editer_med.php");
                if ($c==0) header("Location: ../administrateur/index.php?p=medecin");
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM medecin WHERE NOM_M=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../administrateur/?p=medecin");
        }
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
               