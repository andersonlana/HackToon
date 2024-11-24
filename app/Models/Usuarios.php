<?php

namespace App\Models;

use App\Conf\Database;
use Exception;

class Usuarios
{
    private $conn; // Conexão com o banco

    // Construtor para inicializar a conexão
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect(); // Estabelece a conexão com o banco
    }

    /**
     * Retorna todos os usuários com os dados relacionados.
     * @return array
     * @throws Exception
     */
    public function RetornaUsuarios()
    {
        try {
            // Query para buscar os dados dos usuários
            $sql = "SELECT 
            u.id,
            u.name AS nome,
            u.email,
            p.Telefone,
            p.Especialidade,
            p.Endereco,
            p.Cidade,
            p.Estado,
            c.Telefone AS TelefoneCliente,
            u.id_perfil -- Inclua o campo tipo
        FROM users u
        LEFT JOIN profissionais p ON u.id = p.IdProfissional
        LEFT JOIN clientes c ON u.id = c.IdCliente;";

            $stmt = $this->conn->prepare($sql); // Prepara a query

            if ($stmt->execute()) {
                $result = $stmt->get_result(); // Obtém os resultados
                $dados = $result->fetch_all(MYSQLI_ASSOC); // Armazena os dados em formato associativo
                $stmt->close(); // Fecha o statement
                return $dados; // Retorna os dados
            } else {
                throw new Exception("Erro ao executar a consulta: " . $this->conn->error);
            }
        } catch (Exception $e) {
            // Lança o erro para ser tratado pelo chamador
            throw $e;
        }
    }

    /**
     * Retorna todas as especialidades.
     * @return array
     * @throws Exception
     */
    public function RetornaEspecialidades()
    {
        try {
            // Query para buscar as especialidades
            $sql = "SELECT IdEspecialidades, Descricao FROM especialidades;";
            $stmt = $this->conn->prepare($sql); // Prepara a query

            if ($stmt->execute()) {
                $result = $stmt->get_result(); // Obtém os resultados
                $especialidades = $result->fetch_all(MYSQLI_ASSOC); // Armazena os dados em formato associativo
                $stmt->close(); // Fecha o statement
                return $especialidades; // Retorna as especialidades
            } else {
                throw new Exception("Erro ao executar a consulta: " . $this->conn->error);
            }
        } catch (Exception $e) {
            // Lança o erro para ser tratado pelo chamador
            throw $e;
        }
    }

    public function cadastrar($nome, $email, $senha, $tipo)
    {
        try {


            // Query de inserção
            $query = "INSERT INTO users (name, email, password, perfil) VALUES (?, ?, ?, ?)";

            // Prepara a query para evitar SQL Injection
            $stmt = $this->conn->prepare($query);

            if (!$stmt) {
                throw new Exception("Erro ao preparar a consulta: " . $this->conn->error);
            }

            // Criptografar a senha
            $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

            // Bind dos parâmetros
            $stmt->bind_param("ssss", $nome, $email, $senhaCriptografada, $tipo);

            // Executa a query
            if ($stmt->execute()) {
                return true; // Sucesso

            } else {
                throw new Exception("Erro ao executar a consulta: " . $stmt->error);
            }

        } catch (Exception $e) {
            // Tratamento de erros
            return "Erro: " . $e->getMessage();
        }
    }


    public function AtualizarUser($id, $nome, $email, $telefone, $especialidade, $endereco, $cidade, $estado)
    {
        try {
            // Query de atualização
            $sql = "UPDATE users 
                    SET name = ?, email = ?, telefone = ?, especialidade = ?, endereco = ?, cidade = ?, estado = ?
                    WHERE id = ?";

            // Prepara a query para evitar SQL Injection
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Erro ao preparar a query: " . $this->conn->error);
            }

            // Associa os parâmetros
            $stmt->bind_param("sssssssi", $nome, $email, $telefone, $especialidade, $endereco, $cidade, $estado, $id);

            // Executa a query
            if (!$stmt->execute()) {
                throw new Exception("Erro ao executar a query: " . $stmt->error);
            }

            return true; // Retorna sucesso
        } catch (Exception $e) {
            return "Erro ao atualizar usuário: " . $e->getMessage();
        }
    }



    function buscarUsuariosPorEstado($estado)
{
    // Conexão com o banco (substitua pelos seus dados de conexão)

    $conn = $this->conn;

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Query SQL com placeholder
    $sql = "
        SELECT 
            u.id,
            u.name AS nome,
            u.email,
            s.Estado
        FROM 
            users u
        LEFT JOIN 
            servicosprofissionais s 
        ON 
            u.id = s.idUser
        WHERE 
            s.Estado LIKE ?
    ";

    // Prepara a query
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }

    // Adiciona o parâmetro na query
    $estadoComCuringa = "%" . $estado . "%";
    $stmt->bind_param("s", $estadoComCuringa);

    // Executa a query
    if (!$stmt->execute()) {
        die("Erro ao executar a consulta: " . $stmt->error);
    }

    // Obtém os resultados
    $result = $stmt->get_result();
    $usuarios = $result->fetch_all(MYSQLI_ASSOC);

    // Fecha a conexão
    $stmt->close();
    $conn->close();

    return $usuarios;
}


    public function CacelarAgendamento($id)
    {
    $id = intval($id);
    $novoStatus = 3;

    // Criar a query SQL
    $sql = "UPDATE agendamentos SET IdStatus = ? WHERE IdAgendamento = ?";

    $conn = $this->conn;
    // Preparar a consulta
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincular os parâmetros
    $stmt->bind_param("ii", $novoStatus, $id);

    // Executar a consulta
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Status do agendamento atualizado com sucesso!";
        } else {
            echo "Nenhum registro encontrado com o ID fornecido.";
        }
    } else {
        echo "Erro ao atualizar o status: " . $stmt->error;
    }

    // Fechar o statement
    $stmt->close();    
    }
 

    public function CacelarServico($id)
   {
    $id = intval($id);
    $novoStatus = 3;

    // Criar a query SQL
    $sql = "UPDATE servicosprofissionais SET IdStatus = ? WHERE IdServicosProfissionais = ?";

    $conn = $this->conn;
    // Preparar a consulta
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincular os parâmetros
    $stmt->bind_param("ii", $novoStatus, $id);

    // Executar a consulta
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Status do agendamento atualizado com sucesso!";
        } else {
            echo "Nenhum registro encontrado com o ID fornecido.";
        }
    } else {
        echo "Erro ao atualizar o status: " . $stmt->error;
    }

    // Fechar o statement
    $stmt->close();    
   }




}

?>
