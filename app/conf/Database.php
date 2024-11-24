<?php

namespace app\conf;
use mysqli;
class Database {
    private $host = '193.203.175.91';
    private $port = '3306';
    private $dbname = 'u572677979_EVENTO_HACK';
    private $username = 'u572677979_HACKTON';
    private $password = 'IQ;&T5V+o8+o';
    private $connection;

    // Método para conectar ao banco de dados
    public function connect() {
        if ($this->connection === null) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);

            // Verifica se houve erro na conexão
            if ($this->connection->connect_error) {
                die("Erro ao conectar ao banco de dados: " . $this->connection->connect_error);
            }
        }
        return $this->connection;
    }

    // Método para desconectar (opcional)
    public function disconnect() {
        if ($this->connection !== null) {
            $this->connection->close();
            $this->connection = null;
        }
    }
}

