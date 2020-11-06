<?php
// Inicia a Session
session_start();

// 1. Cadastrar
if (isset($_POST['cadastrar'])) {
    cadastrarContato();

// 2. Buscar
} elseif (isset($_POST['buscarContato'])) {
    buscarContato();

// 3. Editar
} elseif (isset($_POST['editarContato'])) {
    editarContato();

// 4. Excluir
} elseif (isset($_POST['excluir'])) {
    excluirContato();

// 5. Login
} elseif (isset($_POST['login'])) {
    efetuarLogin();

// 6. Logout
} else if (isset($_POST['logout'])) {
    efetuarLogout();

// Se não veio de nenhum clique
} else {
    header("Location: ../View/home.php");
}

/* FUNCTIONS */

function cadastrarContato()
{
    // Retorno do JSON (validação)
    header('Content-Type: application/json');

    // Inclui os arquivos (Model)
    include_once "../Model/Contato.php";
    include_once "../Model/ContatoService.php";

    // Cria o objeto das classes Contato e ContatoService
    $contato = new Contato();
    $service = new ContatoService();

    // Guarda os dados informados no formulário
    $id  = $_POST['id'];
    $nome  = $_POST['nome'];
    $sobrenome  = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $contato->id  = $id;
    $contato->nome  = $nome;
    $contato->sobrenome = $sobrenome;
    $contato->email = $email;
    $contato->senha = $senha;
    
    // Envia o objeto para efetuar o Cadastro
    $response = $service->cadastrarContato($contato);
    
    // Verifica o tipo de retorno
    if ($response['sucesso']) {
        // Mostra a mensagem de Sucesso
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'codigo' => 1));
        exit();
    
    } else {
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'campo' => $response['campo'],
            'codigo' => 0));
        exit();
    }
}

function buscarContato()
{
    echo "buscarContato";
}

function editarContato()
{
    echo "editarContato";
}

function excluirContato()
{
// Retorno do JSON (validação)
header('Content-Type: application/json');

// Inclui os arquivos (Model)
include_once "../Model/Contato.php";
include_once "../Model/ContatoService.php";

// Cria o objeto das classes Contato e ContatoService
$contato = new Contato();
$service = new ContatoService();

// Guarda os dados informados no formulário
$id  = $_POST['id'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$contato->id  = $id;
$contato->email = $email;
$contato->senha = $senha;

// Envia o objeto para efetuar a Exclusão
$response = $service->excluirContato($contato);

// Verifica o tipo de retorno
if ($response['sucesso']) {
    // Mostra a mensagem de Sucesso
    print json_encode(array(
        'mensagem' => $response['mensagem'],
        'codigo' => 1));
        efetuarLogout();
        exit();

} else {
    print json_encode(array(
        'mensagem' => $response['mensagem'],
        'campo' => $response['campo'],
        'codigo' => 0));
    exit();
}
}

// Efetua Login no Sistema
function efetuarLogin()
{
    // Inclui os arquivos (Model)
    include_once "../Model/Contato.php";
    include_once "../Model/ContatoService.php";

    // Retorno do JSON (validação)
    header('Content-Type: application/json');

    // Guarda os dados informados no formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Cria o objeto das classes Contato e ContatoService
    $contato = new Contato();
    $service = new ContatoService();

    $contato->email = $email;
    $contato->senha = $senha;

    // Envia o objeto para efetuar o Login
    $response = $service->efetuarLogin($contato);

    // Verifica o tipo de retorno
    if ($response['sucesso']) {
        $resultado = $response['resultado'];

        // Guarda os dados na Session
        $_SESSION['id']     = $resultado['id'];
        $_SESSION['email']  = $resultado['email'];
        $_SESSION['nome']   = $resultado['nome'];

        // Mostra a mensagem de Sucesso
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'codigo' => 1));
        exit();
    
    // Mostra a mensagem de Erro
    } else {
        print json_encode(array(
            'mensagem' => $response['mensagem'],
            'campo' => $response['campo'],
            'codigo' => 0));
        exit();
    }
}

// Efetua Logout no Sistema
function efetuarLogout()
{
    session_destroy();
}