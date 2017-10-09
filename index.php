<?php
/*
 * global $_DELETE = array();
 * global $_PUT = array();
 *
 * if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
 * parse_str(file_get_contents('php://input'), $_DELETE);
 * }
 * if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
 * parse_str(file_get_contents('php://input'), $_PUT);
 * }
 */
exibirParamentro(getParametro());
$url = explode ( "/", $_GET ['url'] );
$texto = $url [0];
echo "teste Get :" . isset ( $_GET );
echo "<br/>";
echo "teste Post :" . isset ( $_POST );
echo "<br/>";
echo $_GET ["nome"];
echo "<br/>";
echo $_PUT ["nome"];
echo "<br/>";
echo $_REQUEST ["nome"];

// exibirParamentro();
$contoller = strtoupper ( substr ( $texto, 0, 1 ) ) . substr ( $texto, 1 ) . "Controller";

// echo $contoller;
function exibirParamentro($param) {
	echo "<table border='1'>";
	foreach ( $param as $key => $value ) {
		echo "<tr>";
		echo "<td>" . $key . "<td/>";
		echo "<td>" . $value . "<td/>";
		echo "<tr>";
	}
	echo "<table/>";
}
function getParametro() {
	switch ($_SERVER ['REQUEST_METHOD']) {
		case "GET" :
			return $_GET;
			break;
		case "POST" :
			return $_POST;
			break;
		case "DELETE" :
			global $_DELETE;
			$_DELETE = array();
			parse_str(file_get_contents('php://input'), $_DELETE);
			return $_DELETE;
			break;
		case "PUT" :
			global $_PUT;
			$_PUT = array();
			parse_str(file_get_contents('php://input'), $_PUT);
			return $_POST;
			break;
	}
}