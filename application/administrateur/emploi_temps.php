  <div class="tab-content">
  <div id="med" class="tab-pane fade in active">

    <div class="col-md-12 col-xs-12">    
        <div class="panel panel-primary " data-collapsed="0">
          <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    Médecin - emploi de temps              </div>
    <a data-toggle="tab" href="#inf" ><span class="fc-button fc-button-next fc-state-default fc-corner-right" style=" 
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
    margin-right: 5px;
    ">
                                                <span class="fc-text-arrow">Infirmière - emploi de temps</span>
                                            </span></a>
    <a data-toggle="tab" href="#rec" ><span class="fc-button fc-button-next fc-state-default fc-corner-right" style=" 
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
    margin-right: 5px;
    ">
                                                <span class="fc-text-arrow">Réceptionniste - emploi de temps </span>
                                            </span></a>
            </div>
            
            <div class="panel-body" style="padding:0px;">
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
        Ajouter</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    
        <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label" style="width: 130px;">Médecin</label>
                    <div class="col-sm-5">
                        <select name="med_nom" class="form-control" placeholder="Selectionner chambre" style="width: 218px;">                          
                        <?php
                            $requete_s = $bdd->query('SELECT * FROM medecin');
                            while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['NOM_M'] . "> " . $donnees_s['NOM_M'] . "</option>";}
                        ?>              
                        </select>
                    </div>
        </div>

       
                    
                     <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date</label>


                        <div class="btn">
                          <input type="date" name="date" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Temps debut</label>

                        <div class="col-sm-5">
                            <input type="time" autocomplete="off" name="tempsd" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="width: 130px;">Temps fin</label>

                        <div class="col-sm-5">
                            <input type="time" autocomplete="off" name="tempsf" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="descreption" class="form-control wysihtml5" id="field-ta" style="width: 218px;" required></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
                    
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['med_nom'],$_POST['service'],$_POST['date'],$_POST['tempsd'],$_POST['tempsf'],$_POST['descreption']))
        {
          
            $requete = $bdd->prepare('INSERT INTO med_emp(
                                                          NOM_M,
                                                          NOM_S,
                                                          DATE_emp,
                                                          TEMPS_d_emp,
                                                          TEMPS_f_emp,
                                                          DESCREPTION
                                                          )
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?)
                                    ');

            $requete->execute(array($_POST['med_nom'],$_POST['service'],$_POST['date'],$_POST['tempsd'],$_POST['tempsf'],$_POST['descreption']));

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

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info" style="margin-bottom: 5px;">
    <thead>
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Médecin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" >Service</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" >Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" >Temps debut</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" >Temps fin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
        $verf=0;
        $requete = $bdd->query('SELECT * FROM med_emp');
        while($donnees = $requete->fetch())
        {$verf=1;}


        $requete = $bdd->query('SELECT * FROM med_emp');
        if($verf==1)
        while($donnees = $requete->fetch())
        {
                echo "<tr class='odd'>
                
                <td>"  . $donnees['NOM_M'].         "</td>
                <td>"  . $donnees['NOM_S'].               "</td>
                <td>"  . $donnees['DATE_emp'].               "</td>
                <td>"  . $donnees['TEMPS_d_emp'].  "</td>
                <td>"  . $donnees['TEMPS_f_emp'].  "</td>
                <td>"  . $donnees['DESCREPTION'] .               "</td>
                <td>
                    <form action='' method='post'>
                    ";
                                        
                    echo "<button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['med_emp_id']. "><i class='entypo-cancel'></i>Supprimer</button>
                    </form>
                </td>
                </tr>";
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM med_emp WHERE med_emp_id=?');
            $requete->execute(array($_POST['supp']));
        header("Location: ../administrateur/index.php?p=emploi_temps");
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
               
            </div>
        </div>
    </div>                   
</div>
             
 <div id="inf" class="tab-pane fade">

    <div class="col-md-12 col-xs-12">    
        <div class="panel panel-primary " data-collapsed="0">
          <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    Infirmière - emploi de temps              </div>
    <a data-toggle="tab" href="#med" ><span class="fc-button fc-button-next fc-state-default fc-corner-right" style=" 
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
    margin-right: 5px;
    ">
                                                <span class="fc-text-arrow">Médecin - emploi de temps</span>
                                            </span></a>
    <a data-toggle="tab" href="#rec" ><span class="fc-button fc-button-next fc-state-default fc-corner-right" style=" 
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
    margin-right: 5px;
    ">
                                                <span class="fc-text-arrow">Réceptionniste - emploi de temps</span>
                                            </span></a>
            </div>
            
            <div class="panel-body" style="padding:0px;">
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
    " data-toggle="modal" data-target="#myModal2" href="#">
        Ajouter</button>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    
        <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label" style="width: 130px;">Infirmière</label>
                    <div class="col-sm-5">
                        <select name="inf_nom" class="form-control" placeholder="Selectionner chambre" style="width: 218px;">                          
                        <?php
                            $requete_s = $bdd->query('SELECT * FROM infirmiere');
                            while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['NOM_I'] . "> " . $donnees_s['NOM_I'] . "</option>";}
                        ?>              
                        </select>
                    </div>
        </div>
                    
                     <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date</label>


                        <div class="btn">
                          <input type="date" name="date" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Temps debut</label>

                        <div class="col-sm-5">
                            <input type="time" autocomplete="off" name="tempsd" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="width: 130px;">Temps fin</label>

                        <div class="col-sm-5">
                            <input type="time" autocomplete="off" name="tempsf" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="descreption" class="form-control wysihtml5" id="field-ta" style="width: 218px;" required></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
                    
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['inf_nom'],$_POST['date'],$_POST['tempsd'],$_POST['tempsf'],$_POST['descreption']))
        {
          
            $requete = $bdd->prepare('INSERT INTO inf_emp(
                                                          NOM_I,
                                                          DATE_emp,
                                                          TEMPS_d_emp,
                                                          TEMPS_f_emp,
                                                          DESCREPTION
                                                          )
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?)
                                    ');

            $requete->execute(array($_POST['inf_nom'],$_POST['date'],$_POST['tempsd'],$_POST['tempsf'],$_POST['descreption']));

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

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info" style="margin-bottom: 5px;">
    <thead>
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Infirmière</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" >Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" >Temps debut</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" >Temps fin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
        $verf=0;
        $requete = $bdd->query('SELECT * FROM inf_emp');
        while($donnees = $requete->fetch())
        {$verf=1;}


        $requete = $bdd->query('SELECT * FROM inf_emp');
        if($verf==1)
        while($donnees = $requete->fetch())
        {
                echo "<tr class='odd'>
                
                <td>"  . $donnees['NOM_I'].         "</td>
                <td>"  . $donnees['DATE_emp'].               "</td>
                <td>"  . $donnees['TEMPS_d_emp'].  "</td>
                <td>"  . $donnees['TEMPS_f_emp'].  "</td>
                <td>"  . $donnees['DESCREPTION'] .               "</td>
                <td>
                    <form action='' method='post'>
                   
                    ";
                                        
                    echo "<button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['inf_emp_id']. "><i class='entypo-cancel'></i>Supprimer</button>
                    </form>
                </td>
                </tr>";
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM inf_emp WHERE inf_emp_id=?');
            $requete->execute(array($_POST['supp']));
        header("Location: ../administrateur/index.php?p=emploi_temps");
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
                
            </div>
        </div>
    </div>                   
</div>

<div id="rec" class="tab-pane fade">
    <div class="col-md-12 col-xs-12">    
        <div class="panel panel-primary " data-collapsed="0">
          <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    Réceptionniste - emploi de temps             </div>
    <a data-toggle="tab" href="#med" ><span class="fc-button fc-button-next fc-state-default fc-corner-right" style=" 
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
    margin-right: 5px;
    ">
                                                <span class="fc-text-arrow">Médecin - emploi de temps</span>
                                            </span></a>
    <a data-toggle="tab" href="#inf" ><span class="fc-button fc-button-next fc-state-default fc-corner-right" style=" 
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
    margin-right: 5px;
    ">
                                                <span class="fc-text-arrow">Infirmière - emploi de temps</span>
                                            </span></a>
            </div>
            
            <div class="panel-body" style="padding:0px;">
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
    " data-toggle="modal" data-target="#myModal3" href="#">
        Ajouter</button>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                   
        <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label" style="width: 130px;">Réceptionniste</label>
                    <div class="col-sm-5">
                        <select name="rec_nom" class="form-control" placeholder="Selectionner chambre" style="width: 218px;">                          
                        <?php
                            $requete_s = $bdd->query('SELECT * FROM receptionniste');
                            while($donnees_s = $requete_s->fetch()){echo "<option value=". $donnees_s['NOM_R'] . "> " . $donnees_s['NOM_R'] . "</option>";}
                        ?>              
                        </select>
                    </div>
        </div>



                     <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Date</label>


                        <div class="btn">
                          <input type="date" name="date" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Temps debut</label>

                        <div class="col-sm-5">
                            <input type="time" autocomplete="off" name="tempsd" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="width: 130px;">Temps fin</label>

                        <div class="col-sm-5">
                            <input type="time" autocomplete="off" name="tempsf" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="descreption" class="form-control wysihtml5" id="field-ta" style="width: 218px;" required></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>
                    
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['rec_nom'],$_POST['date'],$_POST['tempsd'],$_POST['tempsf'],$_POST['descreption']))
        {
          
            $requete = $bdd->prepare('INSERT INTO rec_emp(
                                                          NOM_R,
                                                          DATE_emp,
                                                          TEMPS_d_emp,
                                                          TEMPS_f_emp,
                                                          DESCREPTION
                                                          )
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?,
                                                          ?)
                                    ');

            $requete->execute(array($_POST['rec_nom'],$_POST['date'],$_POST['tempsd'],$_POST['tempsf'],$_POST['descreption']));

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

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info" style="margin-bottom: 5px;">
    <thead>
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Réceptionniste</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" >Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" >Temps debut</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" >Temps fin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
        $verf=0;
        $requete = $bdd->query('SELECT * FROM rec_emp');
        while($donnees = $requete->fetch())
        {$verf=1;}

        $requete = $bdd->query('SELECT * FROM rec_emp');
        if($verf==1)
        while($donnees = $requete->fetch())
        {
                echo "<tr class='odd'>
                
                <td>"  . $donnees['NOM_R'].        "</td>
                <td>"  . $donnees['DATE_emp'].     "</td>
                <td>"  . $donnees['TEMPS_d_emp'].  "</td>
                <td>"  . $donnees['TEMPS_f_emp'].  "</td>
                <td>"  . $donnees['DESCREPTION'].  "</td>
                <td>
                    <form action='' method='post'>
                    
                    ";
                    echo "<button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['rec_emp_id']. "><i class='entypo-cancel'></i>Supprimer</button>
                    </form>
                </td>
                </tr>";
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM rec_emp WHERE rec_emp_id=?');
            $requete->execute(array($_POST['supp']));
        header("Location: ../administrateur/index.php?p=emploi_temps");
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
                
            </div>
        </div>
    </div>
</div>
  </div>