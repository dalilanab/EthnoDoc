<?php
require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "donneesraddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");
// Edited musical note transfert query
// 19/05/2015, 24 056 insert on 24 056 edited musical note from the raddo database
$sql = "insert into ethnodoc.spokenarchivenote_keyword (spokenarchivenote_id, keyword_id)
                
        select ethnodoc.spokenarchivenote.spokenarchivenote_id, donneesraddo.document_global_mot_cle.cle_mot
		
		from ((donneesraddo.document_global
			left join donneesraddo.document_global_mot_cle on donneesraddo.document_global_mot_cle.cle_document_global = donneesraddo.document_global.cle_document_global)
			left join ethnodoc.spokenarchivenote on donneesraddo.document_global.cle_document_global = ethnodoc.spokenarchivenote.cle_reel)

		WHERE donneesraddo.document_global.cle_document = 4
        OR donneesraddo.document_global.cle_document = 5
        OR donneesraddo.document_global.cle_document = 6";
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help