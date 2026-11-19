<?php
require_once __DIR__ . "/../controllers/UsuarioController.php";

$rota = $_GET["rota"] ?? "";
$metodo = $_SERVER["REQUEST_METHOD"];

if ($rota === "usuario"){
    switch($metodo){
        case "POST":
            createUsuario($con);
            break;
        case "GET":
            readUsuario($con);
            break;
        case "PUT":
            updateUsuario($con);
        case "DELETE":
            deleteUsuario($con);
        default:
            teste();
    }
}

else if ($rota === "publicacoes") {

    switch($metodo){

        case "POST":
            createPublicacao($con);
            break;

        case "GET":
            readPublicacao($con);
            break;

        case "PUT":
            updatePublicacao($con);
            break;

        case "DELETE":
            deletePublicacao($con);
            break;

        default:
            http_response_code(405);
            echo json_encode(["mensagem" => "Método não permitido!"]);
    }


} else if ($rota === "curtidas") {

    switch($metodo){

        case "POST":
            createCurtida($con);
            break;

        case "GET":
            readCurtida($con);
            break;

        case "PUT":
            updateCurtida($con);
            break;

        case "DELETE":
            deleteCurtida($con);
            break;

        default:
            http_response_code(405);
            echo json_encode(["mensagem" => "Método não permitido!"]);
    }


} else {

    http_response_code(404);
    echo json_encode(["mensagem" => "Rota não encontrada!"]);

}