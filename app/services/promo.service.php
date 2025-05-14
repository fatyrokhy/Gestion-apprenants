<?php
require_once(PATH ."/app/model/model.php");
global $compter;
global $compterElementSpecifique;
function  listePromo($compter,$compterElementSpecifique)  {
    $apprenant=$compterElementSpecifique('users','role','APPRENANT');
    $promoActif=$compterElementSpecifique('promotion','statut','Actif');
    $ref=$compter('referentiel');
    $promo=$compter('promotion');
    renderView('admin','liste.promo',['apprenant'=>$apprenant,'promoActif'=>$promoActif,
                'ref'=>$ref,'promo'=>$promo,],'base.layout');   
};