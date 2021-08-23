<?php

$mycomp=new COM("SAPbobsCOM.company") or die ("No connection");
$mycomp->Server="localhost";
$mycomp->DbServerType = 6; //SQL Server 2008 - https://biuan.com/Company/BoDataServerTypes
$mycomp->DbUserName = "sap";
$mycomp->DbPassword = "sap";
$mycomp->CompanyDB = "SBODemoBR";
$mycomp->username = "manager";
$mycomp->password = "1234";
$lRetCode = $mycomp->Connect();
if ($lRetCode == 0)
{
	echo "Conectado a : " . $mycomp->CompanyName ."<br>";	
	
	//Consultar un articulo
	$vItem = $mycomp->GetBusinessObject(4); //SAPbobsCOM.BoObjectTypes.oItems
	$vItem->GetByKey("A001");
	echo "cod: ".$vItem->ItemCode ." - name: ". $vItem->ItemName;	
	
	$vItem->ItemName="UpdateViaPHP";
    $vItem->Update;

	$vItem = $mycomp->GetBusinessObject(4); //SAPbobsCOM.BoObjectTypes.oItems
	$vItem->GetByKey("A001");
	echo "<br><br>AposUp...<br>cod: ".$vItem->ItemCode ." - name: ". $vItem->ItemName;

}
else
{	
	echo "Error de conexion: ". $mycomp->GetLastErrorCode() . " - " .$mycomp->GetLastErrorDescription();	 
}
$mycomp->Disconnect();
?>