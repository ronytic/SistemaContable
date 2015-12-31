<?php
include_once("bd.php");
class menu extends bd{
	var $tabla="menu";
	function mostrar($Nivel,$Posicion=""){
		$this->campos=array('CodMenu','Nombre','Url','SubMenu','Imagen');
		$Posicion=(!empty($Posicion))?" and Posicion='$Posicion'":"";
		switch($Nivel){
			case "1":{return $this->getRecords(" Admin=1 and Activo=1 $Posicion","Orden");}break;
			case "2":{return $this->getRecords(" Gerente=1 and Activo=1 $Posicion","Orden");}break;
			case "3":{return $this->getRecords(" Contador=1 and Activo=1 $Posicion","Orden");}break;
			case "4":{return $this->getRecords(" Auxiliar=1 and Activo=1 $Posicion","Orden");}break;
			case "5":{return $this->getRecords(" Secretaria=1 and Activo=1 $Posicion","Orden");}break;
		}
	}
	function verificar($Directorio,$Nivel){
		switch($Nivel){
			case "1":{return $this->getRecords("Url='$Directorio' and Admin=1 and Activo=1","Orden");}break;
			case "2":{return $this->getRecords("Url='$Directorio' and  Gerente=1 and Activo=1","Orden");}break;
			case "3":{return $this->getRecords("Url='$Directorio' and  Contador=1 and Activo=1","Orden");}break;
			case "4":{return $this->getRecords("Url='$Directorio' and  Auxiliar=1 and Activo=1","Orden");}break;
			case "5":{return $this->getRecords("Url='$Directorio' and  Secretaria=1 and Activo=1","Orden");}break;
		}
	}
	function mostrarMenuUrl($Url=""){
		$this->campos=array('CodMenu','Nombre','Url','SubMenu','Imagen');
		$Posicion=(!empty($Posicion))?" and Posicion='$Posicion'":"";
		return $this->getRecords(" Url='$Url' and Activo=1 $Posicion","Orden");
	}
}
?>