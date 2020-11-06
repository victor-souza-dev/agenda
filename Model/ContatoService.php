<?php
class ContatoService
{
    public function cadastrarContato($contato)
    {
        // Verifica se o campo Nome foi preenchido
        if (strcmp($contato->nome, "") == 0) {
            $response = array (
                "mensagem" => "Preencha o campo Nome",
                "campo" => "#nome",
                "sucesso" => false
            );
            return $response;
        }

        // Criptografa a Senha
        $contato->senha = $this->criptografarSHA256($contato->senha);

        // inclui o arquivo ContatoDAO
        include_once "ContatoDAO.php";  // PSR (Clean Code)

        // Cria o objeto da classe ContatoDAO
        $dao = new ContatoDAO();

        $dao->cadastrarContatoDAO($contato);

        return array (
            "mensagem" => "Cadastro efetuado com sucesso!",
            "sucesso" => true
        );
    }

    // Exclusão
    public function excluirContato($contato) {
         // Verifica se o campo Email foi preenchido
         if (strcmp($contato->email, "") == 0) {
            $response = array (
                "mensagem" => "Preencha o campo E-mail",
                "campo" => "#email",
                "sucesso" => false
            );
            return $response;
        }
         // Verifica se o campo Nome foi preenchido
         if (strcmp($contato->senha, "") == 0) {
            $response = array (
                "mensagem" => "Preencha o campo Senha",
                "campo" => "#senha",
                "sucesso" => false
            );
            return $response;
        }

     // inclui o arquivo ContatoDAO
     include_once "ContatoDAO.php";  // PSR (Clean Code)

     // Cria o objeto da classe ContatoDAO
     $dao = new ContatoDAO();

     $dao->excluirContatoDAO($contato);

     return array (
         "mensagem" => "Contato excluído com sucesso!",
         "sucesso" => true
     );
    }

    public function efetuarLogin($contato)
    {
        // Verifica se o campo E-mail foi preenchido
        if (strcmp($contato->email, "") == 0) {
            $response = array (
                "mensagem" => "Preencha o campo E-mail",
                "campo" => "#email",
                "sucesso" => false
            );
            return $response;
        }

        // Verifica se o campo Senha foi preenchido
        if (strcmp($contato->senha, "") == 0) {
            $response = array (
                "mensagem" => "Preencha o campo Senha",
                "campo" => "#senha",
                "sucesso" => false
            );
            return $response;
        }

        // Busca o Contato pelo E-mail informado
        $resultado = $this->buscarContato($contato);

        // Se houver resultado na busca
        if ($resultado != null) {
            // Recebe os valores vindos do DB
            $emailDB = $resultado['email'];
            $senhaDB = $resultado['senha'];

            // Converte para MD5 (Criptografia)
            //$contato->senha = $this->criptografarMD5($contato->senha);
            $contato->senha = $this->criptografarSHA256($contato->senha);

            // Compara o valor informado com o valor do DB
            if (strcmp($contato->email, $emailDB) == 0 && strcmp($contato->senha, $senhaDB) == 0) {
                $response = array (
                    "mensagem" => "Login efetuado com sucesso!",
                    "resultado" => $resultado,
                    "sucesso" => true
                );
                return $response;
            }
        }

        // Se NÃO houver resultado na busca
        $response = array (
            "mensagem" => "E-mail ou Senha inválidos.",
            "campo" => "",
            "sucesso" => false
        );
        return $response;
    }

    private function buscarContato($contato)
    {
        // inclui o arquivo ContatoDAO
        include_once "ContatoDAO.php";  // PSR (Clean Code)

        // Cria o objeto da classe ContatoDAO
        $dao = new ContatoDAO();

        return $dao->buscarContatoDAO($contato);
    }

    private function criptografarMD5($valor)
    {
        return md5($valor);
    }

    private function criptografarSHA256($valor)
    {
        $senha  = hash('sha256', $valor);
        $salt   = hash('sha256', "Desenv. Web 2");
        $senha  = hash('sha256', $senha.$salt);

        return $senha;
        //return hash('sha256', $valor);
    }
}