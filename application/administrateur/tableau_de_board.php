             

    <?php
        $n_m = 0;
        $n_p = 0;
        $n_i = 0;
        $n_r = 0;
        $n_mort = 0;
        $n_nais = 0;
        $n_opp = 0;
        $n_cons=0;
        $requete_m = $bdd->query('SELECT * FROM medecin');
        while($donnees_m = $requete_m->fetch()){ $n_m++; }
        $requete_p = $bdd->query('SELECT * FROM patient');
        while($donnees_p = $requete_p->fetch()){ $n_p++; }
        $requete_r = $bdd->query('SELECT * FROM receptionniste');
        while($donnees_r = $requete_r->fetch()){ $n_r++; }
        $requete_i = $bdd->query('SELECT * FROM infirmiere');
        while($donnees_i = $requete_i->fetch()){ $n_i++; }
        $requete_nais = $bdd->query('SELECT * FROM rapport Where Type="naissance"');
        while($donnees_nais = $requete_nais->fetch()){ $n_nais++; }
        $requete_mort = $bdd->query('SELECT * FROM rapport Where Type="décès"');
        while($donnees_mort = $requete_mort->fetch()){ $n_mort++; }
        $requete_opp = $bdd->query('SELECT * FROM rapport Where Type="oppération"');
        while($donnees_opp = $requete_opp->fetch()){ $n_opp++; }
        $requete_cons = $bdd->query('SELECT * FROM consultation ');
        while($donnees_cons = $requete_cons->fetch()){ $n_cons++; }
        
    ?>
    <div class="row">
    <div class="col-sm-3">
        <a href="?p=medecin" >
            <div class="tile-stats tile-white tile-white-primary">
                <div class="icon"><i class="fa fa-user-md"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_m; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Médecin</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="?p=patient">
            <div class="tile-stats tile-white-red">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_p; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Patient</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="?p=infirmiere">
            <div class="tile-stats tile-white-aqua">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_i; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Infirmière</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="?p=receptionniste">
            <div class="tile-stats tile-white-blue">
                <div class="icon"><i class="fa fa-list-alt"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_r; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Récéptionniste</h3>
            </div>
        </a>
    </div>
</div>

 <div class="row">
    <div class="col-sm-3">
        <a href="?p=rapport_operation">
            <div class="tile-stats tile-white-purple">
                <div class="icon"><i class="fa fa-user-md"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_opp; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Rapport d'oppération</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="?p=rapport_deces">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_mort; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Rapport de décès</h3>
            </div>
        </a>
    </div>

    

    <div class="col-sm-3">
        <a href="?p=rapport_naissance">
            <div class="tile-stats tile-white-green">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_nais; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Rapport de naissance</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="?p=consultation">
            <div class="tile-stats tile-white-red">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $n_cons; ?>" data-duration="200" data-delay="0">0</div>
                <h3>Consultation</h3>
            </div>
        </a>
    </div>
</div>            


