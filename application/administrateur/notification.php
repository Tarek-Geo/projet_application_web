                <button class="btn" style="float: right;" data-toggle="modal" data-target="#myModal" href="#">
        Ajouter notification</button>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter notification</h4>
        </div>
        <div class="modal-body">

            <form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Titre</label>

                        <div class="col-sm-5">
                            <input type="text" name="titre" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label" style="
    width: 130px;
">Description</label>
                        <div class="col-sm-5"><textarea name="description" class="form-control wysihtml5" id="field-ta" style="width: 218px;" required></textarea><input type="hidden" name="_wysihtml5_mode" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Date de départ</label>

                        <div class="col-sm-5">
                            <input type="date" name="depart" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label" style="
    width: 130px;
">Date de fin</label>

                        <div class="col-sm-5">
                            <input type="date" name="fin" class="form-control" id="field-1" style="width: 218px;" required>
                        </div>
                    </div>
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
    <?php
    {
        if (isset($_POST['titre'],$_POST['description'],$_POST['depart'],$_POST['fin']))
        {
            $requete = $bdd->prepare('INSERT INTO notification(titre,description,date_depart,date_fin) VALUES(?,?,?,?)');
            $requete->execute(array($_POST['titre'],$_POST['description'],$_POST['depart'],$_POST['fin']));
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
        <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Titre</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 163px;">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Date de départ</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Date de fin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 183px;">Options</th></tr>
    </thead>

    
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
{
		$verf=0;
		$requete = $bdd->query('SELECT * FROM notification');
		while($donnees = $requete->fetch())
		{$verf=1;}

		$requete = $bdd->query('SELECT * FROM notification');
		if($verf==1)
		while($donnees = $requete->fetch())
		{
				echo "<tr class='odd'>
                <td>"  . $donnees['titre'].       	"</td>
                <td>"  . $donnees['description'].   "</td>
                <td>"  . $donnees['date_depart'].   "</td>
                <td>"  . $donnees['date_fin'].      "</td>
                <td>
                	<form action='' method='post'>
                    
                    <button name='supp' class='btn btn-danger btn-sm btn-icon icon-left' value=". $donnees['notification_id']. "><i class='entypo-cancel'></i>Supprimer</button>
                	</form>
                </td>
    			</tr>";
                if (isset($_POST['supp']))
        {
            $requete = $bdd->prepare('DELETE FROM notification WHERE notification_id=?');
            $requete->execute(array($_POST['supp']));
            header("Location: ../administrateur/index.php?p=notification");
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


<br>



                <hr style="border: 0;
                height: 1px;
                background: #333;
                opacity: 0.3;
                background-image: linear-gradient(to right, #ccc, #367799, #ccc);" />


<br>




            <div class="col-md-12 col-xs-12">    
        <div class="panel panel-primary " data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    Calendrier des événements                </div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body">
                        <div id="notice_calendar" class="fc fc-ltr">
                            <table class="fc-header" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td class="fc-header-left">
                                            <span class="fc-header-title">
                                                <h2>Mai 2016</h2>
                                            </span>
                                        </td>
                                        <td class="fc-header-center"></td>
                                      
                                    </tr>
                                </tbody>
                            </table>
                            <div class="fc-content" style="position: relative;">
                                <div class="fc-view fc-view-month fc-grid" style="position:relative" unselectable="on">
                                    <?php
                                    $nomp="";
                                    $bdd = new PDO('mysql:host=localhost;dbname=medical','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                    $q="SELECT * FROM notification";
                                    $requete = $bdd->query($q);
                                    while($donnees = $requete->fetch())
                                    {
                                    if(($donnees['date_depart'] != "" ) || ($donnees['date_fin'] !="" )){
                                    echo "<div class='fc-event-container' style='position:absolute;z-index:8;top:0;left:0'>
                                        <div class='fc-event fc-event-hori fc-event-start fc-event-end' style='position: absolute; 
                                       ";
                                       $debut=$donnees['date_depart'];
                                       $fin=$donnees['date_fin'];

                                       if ($donnees['date_depart']=="2016-04-25") echo "left: 0px; width: 123px; top: 60px";
                                       if ($donnees['date_depart']=="2016-04-26") echo "left: 123px; width: 123px; top: 60px";
                                       if ($donnees['date_depart']=="2016-04-27") echo "left: 247px; width: 123px; top: 60px";
                                       if ($donnees['date_depart']=="2016-04-28") echo "left: 370px; width: 123px; top: 60px";
                                       if ($donnees['date_depart']=="2016-04-29") echo "left: 493px; width: 123px; top: 60px";
                                       if ($donnees['date_depart']=="2016-04-30") echo "left: 616px; width: 123px; top: 60px";
                                       if ($donnees['date_depart']=="2016-05-01") echo "left: 739px; width: 138px; top: 60px";

                                       if ($donnees['date_depart']=="2016-05-02") echo "left: 0px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-05-03") echo "left: 123px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-05-04") echo "left: 247px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-05-05") echo "left: 370px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-05-06") echo "left: 493px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-05-07") echo "left: 616px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-05-08") echo "left: 739px; width: 123px; top: 140px";

                                       if ($donnees['date_depart']=="2016-05-09") echo "left: 0px; width: 123px; top: 220px";
                                       if ($donnees['date_depart']=="2016-05-10") echo "left: 123px; width: 123px; top: 220px";
                                       if ($donnees['date_depart']=="2016-05-11") echo "left: 247px; width: 123px; top: 220px";
                                       if ($donnees['date_depart']=="2016-05-12") echo "left: 370px; width: 123px; top: 220px";
                                       if ($donnees['date_depart']=="2016-05-13") echo "left: 493px; width: 123px; top: 220px";
                                       if ($donnees['date_depart']=="2016-05-14") echo "left: 616px; width: 123px; top: 220px";
                                       if ($donnees['date_depart']=="2016-05-15") echo "left: 739px; width: 123px; top: 220px";

                                       if ($donnees['date_depart']=="2016-05-16") echo "left: 0px; width: 123px; top: 300px";
                                       if ($donnees['date_depart']=="2016-05-17") echo "left: 123px; width: 123px; top: 300px";
                                       if ($donnees['date_depart']=="2016-05-18") echo "left: 247px; width: 123px; top: 300px";
                                       if ($donnees['date_depart']=="2016-05-19") echo "left: 370px; width: 123px; top: 300px";
                                       if ($donnees['date_depart']=="2016-05-20") echo "left: 493px; width: 123px; top: 300px";
                                       if ($donnees['date_depart']=="2016-05-21") echo "left: 616px; width: 123px; top: 300px";
                                       if ($donnees['date_depart']=="2016-05-22") echo "left: 739px; width: 123px; top: 300px";

                                       if ($donnees['date_depart']=="2016-05-23") echo "left: 0px; width: 123px; top: 380px";
                                       if ($donnees['date_depart']=="2016-05-24") echo "left: 123px; width: 123px; top: 380px";
                                       if ($donnees['date_depart']=="2016-05-25") echo "left: 247px; width: 123px; top: 380px";
                                       if ($donnees['date_depart']=="2016-05-26") echo "left: 370px; width: 123px; top: 380px";
                                       if ($donnees['date_depart']=="2016-05-27") echo "left: 493px; width: 123px; top: 380px";
                                       if ($donnees['date_depart']=="2016-05-28") echo "left: 616px; width: 123px; top: 380px";
                                       if ($donnees['date_depart']=="2016-05-29") echo "left: 739px; width: 123px; top: 380px";

                                       if ($donnees['date_depart']=="2016-05-30") echo "left: 0px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-05-31") echo "left: 123px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-06-01") echo "left: 247px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-06-02") echo "left: 370px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-06-03") echo "left: 493px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-06-04") echo "left: 616px; width: 123px; top: 140px";
                                       if ($donnees['date_depart']=="2016-06-05") echo "left: 739px; width: 123px; top: 140px";


                                       //--------------------------------------------------------------------------------

                                       if ($donnees['date_fin']=="2016-04-25") echo "left: 0px; width: 123px; top: 60px";
                                       if ($donnees['date_fin']=="2016-04-26") echo "left: 123px; width: 123px; top: 60px";
                                       if ($donnees['date_fin']=="2016-04-27") echo "left: 247px; width: 123px; top: 60px";
                                       if ($donnees['date_fin']=="2016-04-28") echo "left: 370px; width: 123px; top: 60px";
                                       if ($donnees['date_fin']=="2016-04-29") echo "left: 493px; width: 123px; top: 60px";
                                       if ($donnees['date_fin']=="2016-04-30") echo "left: 616px; width: 123px; top: 60px";
                                       if ($donnees['date_fin']=="2016-05-01") echo "left: 739px; width: 138px; top: 60px";

                                       if ($donnees['date_fin']=="2016-05-02") echo "left: 0px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-05-03") echo "left: 123px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-05-04") echo "left: 247px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-05-05") echo "left: 370px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-05-06") echo "left: 493px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-05-07") echo "left: 616px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-05-08") echo "left: 739px; width: 123px; top: 140px";

                                       if ($donnees['date_fin']=="2016-05-09") echo "left: 0px; width: 123px; top: 220px";
                                       if ($donnees['date_fin']=="2016-05-10") echo "left: 123px; width: 123px; top: 220px";
                                       if ($donnees['date_fin']=="2016-05-11") echo "left: 247px; width: 123px; top: 220px";
                                       if ($donnees['date_fin']=="2016-05-12") echo "left: 370px; width: 123px; top: 220px";
                                       if ($donnees['date_fin']=="2016-05-13") echo "left: 493px; width: 123px; top: 220px";
                                       if ($donnees['date_fin']=="2016-05-14") echo "left: 616px; width: 123px; top: 220px";
                                       if ($donnees['date_fin']=="2016-05-15") echo "left: 739px; width: 123px; top: 220px";

                                       if ($donnees['date_fin']=="2016-05-16") echo "left: 0px; width: 123px; top: 300px";
                                       if ($donnees['date_fin']=="2016-05-17") echo "left: 123px; width: 123px; top: 300px";
                                       if ($donnees['date_fin']=="2016-05-18") echo "left: 247px; width: 123px; top: 300px";
                                       if ($donnees['date_fin']=="2016-05-19") echo "left: 370px; width: 123px; top: 300px";
                                       if ($donnees['date_fin']=="2016-05-20") echo "left: 493px; width: 123px; top: 300px";
                                       if ($donnees['date_fin']=="2016-05-21") echo "left: 616px; width: 123px; top: 300px";
                                       if ($donnees['date_fin']=="2016-05-22") echo "left: 739px; width: 123px; top: 300px";

                                       if ($donnees['date_fin']=="2016-05-23") echo "left: 0px; width: 123px; top: 380px";
                                       if ($donnees['date_fin']=="2016-05-24") echo "left: 123px; width: 123px; top: 380px";
                                       if ($donnees['date_fin']=="2016-05-25") echo "left: 247px; width: 123px; top: 380px";
                                       if ($donnees['date_fin']=="2016-05-26") echo "left: 370px; width: 123px; top: 380px";
                                       if ($donnees['date_fin']=="2016-05-27") echo "left: 493px; width: 123px; top: 380px";
                                       if ($donnees['date_fin']=="2016-05-28") echo "left: 616px; width: 123px; top: 380px";
                                       if ($donnees['date_fin']=="2016-05-29") echo "left: 739px; width: 123px; top: 380px";

                                       if ($donnees['date_fin']=="2016-05-30") echo "left: 0px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-05-31") echo "left: 123px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-06-01") echo "left: 247px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-06-02") echo "left: 370px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-06-03") echo "left: 493px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-06-04") echo "left: 616px; width: 123px; top: 140px";
                                       if ($donnees['date_fin']=="2016-06-05") echo "left: 739px; width: 123px; top: 140px";

                                       echo ";'>
                                            <a href='#' style='color: white;'><div class='fc-event-inner'>
                                                <span class='fc-event-title'>"; 
                                                echo $donnees['titre'] ." - ". $donnees['description'] ."</span>
                                            </div></a>
                                        </div>
                                        </div>";
                                    }}
                                  
                                    ?>
                                    

                                    <table class="fc-border-separate" style="width:100%" cellspacing="0"><thead>
                                        <tr class="fc-first fc-last">
                                            <th class="fc-day-header fc-mon fc-widget-header fc-first" style="width: 124px;">Lundi</th>
                                            <th class="fc-day-header fc-tue fc-widget-header" style="width: 124px;">Mardi</th>
                                            <th class="fc-day-header fc-wed fc-widget-header" style="width: 124px;">Mercredi</th>
                                            <th class="fc-day-header fc-thu fc-widget-header" style="width: 124px;">Jeudi</th>
                                            <th class="fc-day-header fc-fri fc-widget-header" style="width: 124px;">Vendredi</th>
                                            <th class="fc-day-header fc-sat fc-widget-header" style="width: 124px;">Samedi</th>
                                            <th class="fc-day-header fc-sun fc-widget-header fc-last">Dimanche</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="fc-week fc-first">
                                            <td class="fc-day fc-mon fc-widget-content fc-other-month fc-past fc-first" data-date="2016-04-25">
                                                <div style="min-height: 71px;">
                                                    <div class="fc-day-number">25</div>
                                                    <div class="fc-day-content">
                                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fc-day fc-tue fc-widget-content fc-other-month fc-past" data-date="2016-04-26"><div>
                                                <div class="fc-day-number">26</div>
                                                <div class="fc-day-content">
                                                    <div style="position: relative; height: 0px;">&nbsp;</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="fc-day fc-wed fc-widget-content fc-other-month fc-past" data-date="2016-04-27"><div>
                                            <div class="fc-day-number">27</div>
                                            <div class="fc-day-content">
                                                <div style="position: relative; height: 0px;">&nbsp;</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fc-day fc-thu fc-widget-content fc-other-month fc-past" data-date="2016-04-28"><div>
                                        <div class="fc-day-number">28</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-fri fc-widget-content fc-other-month fc-past" data-date="2016-04-29">
                                    <div>
                                        <div class="fc-day-number">29</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-sat fc-widget-content fc-other-month fc-past" data-date="2016-04-30">
                                    <div>
                                        <div class="fc-day-number">30</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-sun fc-widget-content <?php if(date('d')=="01") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-01">
                                    <div>
                                        <div class="fc-day-number">1</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="fc-week">
                                <td class="fc-day fc-mon fc-widget-content <?php if(date('d')=="02") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-02">
                                    <div style="min-height: 71px;">
                                        <div class="fc-day-number">2</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 23px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-tue fc-widget-content <?php if(date('d')=="03") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-03">
                                    <div>
                                        <div class="fc-day-number">3</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 23px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-wed fc-widget-content <?php if(date('d')=="04") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-04">
                                    <div>
                                        <div class="fc-day-number">4</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 23px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-thu fc-widget-content <?php if(date('d')=="05") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-05">
                                    <div>
                                        <div class="fc-day-number">5</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 23px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-fri fc-widget-content <?php if(date('d')=="06") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-06">
                                    <div>
                                        <div class="fc-day-number">6</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 23px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-sat fc-widget-content <?php if(date('d')=="07") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-07">
                                    <div>
                                        <div class="fc-day-number">7</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 23px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-sun fc-widget-content <?php if(date('d')=="08") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-08">
                                    <div>
                                        <div class="fc-day-number">8</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 23px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="fc-week">
                                <td class="fc-day fc-mon fc-widget-content <?php if(date('d')=="09") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-09">
                                    <div style="min-height: 71px;">
                                        <div class="fc-day-number">9</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-tue fc-widget-content <?php if(date('d')=="10") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-10">
                                    <div>
                                        <div class="fc-day-number">10</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-wed fc-widget-content <?php if(date('d')=="11") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-11">
                                    <div>
                                        <div class="fc-day-number">11</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-thu fc-widget-content <?php if(date('d')=="12") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-12">
                                    <div>
                                        <div class="fc-day-number">12</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-fri fc-widget-content <?php if(date('d')=="13") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-13">
                                    <div>
                                        <div class="fc-day-number">13</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-sat fc-widget-content <?php if(date('d')=="14") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-14">
                                    <div>
                                        <div class="fc-day-number">14</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-sun fc-widget-content <?php if(date('d')=="15") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-15">
                                    <div>
                                        <div class="fc-day-number">15</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="fc-week">
                                <td class="fc-day fc-mon fc-widget-content <?php if(date('d')=="16") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-16">
                                    <div style="min-height: 71px;">
                                        <div class="fc-day-number">16</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-tue fc-widget-content <?php if(date('d')=="17") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-17">
                                    <div>
                                        <div class="fc-day-number">17</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-wed fc-widget-content <?php if(date('d')=="18") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-18">
                                    <div>
                                        <div class="fc-day-number">18</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-thu fc-widget-content <?php if(date('d')=="19") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-19">
                                    <div>
                                        <div class="fc-day-number">19</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-fri fc-widget-content <?php if(date('d')=="20") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-20">
                                    <div>
                                        <div class="fc-day-number">20</div>
                                        <div class="fc-day-content">
                                            <div style="position: relative; height: 0px;">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fc-day fc-sat fc-widget-content <?php if(date('d')=="21") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-21"><div>
                                    <div class="fc-day-number">21</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-sun fc-widget-content <?php if(date('d')=="22") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-22">
                                <div>
                                    <div class="fc-day-number">22</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="fc-week">
                            <td class="fc-day fc-mon fc-widget-content <?php if(date('d')=="23") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-23">
                                <div style="min-height: 71px;">
                                    <div class="fc-day-number">23</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-tue fc-widget-content <?php if(date('d')=="24") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-24">
                                <div>
                                    <div class="fc-day-number">24</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-wed fc-widget-content <?php if(date('d')=="25") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-25">
                                <div>
                                    <div class="fc-day-number">25</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-thu fc-widget-content <?php if(date('d')=="26") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-26">
                                <div>
                                    <div class="fc-day-number">26</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-fri fc-widget-content <?php if(date('d')=="27") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-27">
                                <div>
                                    <div class="fc-day-number">27</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-sat fc-widget-content <?php if(date('d')=="28") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-28">
                                <div>
                                    <div class="fc-day-number">28</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-sun fc-widget-content <?php if(date('d')=="29") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-29">
                                <div>
                                    <div class="fc-day-number">29</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="fc-week fc-last">
                            <td class="fc-day fc-mon fc-widget-content <?php if(date('d')=="30") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-30">
                                <div style="min-height: 71px;">
                                    <div class="fc-day-number">30</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-tue fc-widget-content <?php if(date('d')=="31") echo 'fc-today fc-state-highlight fc-last'; else echo "fc-state-highlight fc-past"; ?>" data-date="2016-05-31">
                                <div>
                                    <div class="fc-day-number">31</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-wed fc-widget-content fc-other-month fc-future" data-date="2016-06-01">
                                <div>
                                    <div class="fc-day-number">1</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-thu fc-widget-content fc-other-month fc-future" data-date="2016-06-02">
                                <div>
                                    <div class="fc-day-number">2</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-fri fc-widget-content fc-other-month fc-future" data-date="2016-06-03">
                                <div>
                                    <div class="fc-day-number">3</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-sat fc-widget-content fc-other-month fc-future" data-date="2016-06-04">
                                <div>
                                    <div class="fc-day-number">4</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="fc-day fc-sun fc-widget-content fc-other-month fc-future fc-last" data-date="2016-06-05">
                                <div>
                                    <div class="fc-day-number">5</div>
                                    <div class="fc-day-content">
                                        <div style="position: relative; height: 0px;">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    
            
              