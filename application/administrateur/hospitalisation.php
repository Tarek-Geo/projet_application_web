    <div class="tab-content">
  <div id="med" class="tab-pane fade in active">

    <div class="col-md-12 col-xs-12">    
        <div class="panel panel-primary " data-collapsed="0">
          <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-doc-text-inv"></i>  Liste des hospitalisations </div>
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
                                                <span class="fc-text-arrow">Chambres</span>
                                            </span></a>
    </div>

            <div class="panel-body" style="padding:0px;">
            <div style="clear:both;"></div>
<br>

<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid"><table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">
    <thead>
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Patient</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">N°Chambre - N°Etage</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 74px;">Date debut</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 129px;">Date fin</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
    $verf=0;
    $nomp="";
    $nomm="";
        $requete = $bdd->query('SELECT * FROM hospitalisation');
    while($donnees = $requete->fetch())
    {$verf=1;}


    $requete = $bdd->query('SELECT * FROM hospitalisation');
    if($verf==1)
    while($donnees = $requete->fetch())
    {
        echo "<tr class='odd'>";
                $requete2 = $bdd->prepare('SELECT NOM_P FROM patient WHERE PATIENT_ID=?'); 
                $requete2->execute(array($donnees['PATIENT_ID']));
                while($donnees2 = $requete2->fetch()) { $nomp=$donnees2['NOM_P'];} 
                echo "<td>"  . $nomp .   "</td>";
                $requete_s = $bdd->query('SELECT * FROM chambre');
                while($donnees_s = $requete_s->fetch()){$etage=$donnees_s['num_etage'];}
                echo "<td>"  . $donnees['n_chambre']. " - ". $etage .	"</td>
                <td>"  . $donnees['date_debut'] .               "</td>
                <td>"  . $donnees['date_fin'].                "</td>
               
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
            
              </div> 
            </div>
        </div>
    </div> 
             
 <div id="inf" class="tab-pane fade">

    <div class="col-md-12 col-xs-12">    
        <div class="panel panel-primary " data-collapsed="0">
          <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-doc-text-inv"></i>    Liste des chambres         </div>
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
                                                <span class="fc-text-arrow">Hospitalisation</span>
                                            </span></a></div>
            
            <div class="panel-body" style="padding:0px;">
              <button class="fc-button fc-button-next fc-state-default fc-corner-right" style="border-radius: 0 3px 3px 0;
    background-clip: padding-box;
    border-right-width: 1px;
    display: inline-block;
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
    margin-right: 5px;" data-toggle="modal" data-target="#myModal" href="#">
        Ajouter chambre</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter chambre</h4>
        </div>
        <div class="modal-body">
         <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                                       
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">N°Chambre</label>
                        <div class="col-sm-5">
                            <input type="number" autocomplete="off" name="chambre" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div> 

                       <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">N°Etage</label>
                        <div class="col-sm-5">
                            <input type="number" autocomplete="off" name="etage" class="form-control" id="field-1" style="
    width: 218px;
" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="description" class="form-control wysihtml5" id="field-ta" style="width: 218px;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>

                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit" required>
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['chambre'],$_POST['etage'],$_POST['description']))
        {
           
            $requete = $bdd->prepare('INSERT INTO chambre(
                                                          num_chambre,
                                                          num_etage,
                                                          description
                                                          )
                                     VALUES(
                                                          ?,
                                                          ?,
                                                          ?
                                                          )
                                    ');

            $requete->execute(array($_POST['chambre'],$_POST['etage'],$_POST['description']));
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
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">N°Chambre</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">N°Etage</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 93px;">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 263px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
    $verf=0;
    $requete = $bdd->query('SELECT * FROM chambre');
    while($donnees = $requete->fetch())
    {$verf=1;}


    $requete = $bdd->query('SELECT * FROM chambre');
    if($verf==1)
    while($donnees = $requete->fetch())
    {
        echo "<tr class='odd'>
                <td>"  . $donnees['num_chambre'].          "</td>
                <td>"  . $donnees['num_etage'] .        "</td>
                <td>"  . $donnees['description'] .        "</td>
                <td>
                  <form action='' method='post'>
                   
                    ";
                                        
                    echo "<button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['chambre_id']. "><i class='entypo-cancel'></i>Supprimer</button>
                  </form>
                </td>
          </tr>";
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM chambre WHERE chambre_id=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../administrateur/index.php?p=hospitalisation");
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