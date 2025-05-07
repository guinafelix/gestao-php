<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use PDOException;

class CreateDatabaseIfNotExists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:database-if-not-exists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria o banco de dados se não existir, compatível com containers Docker separados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Obtém as configurações do arquivo .env ou config
        $database = config('database.connections.mysql.database');
        $host = config('database.connections.mysql.host');
        $port = config('database.connections.mysql.port');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        $this->info("Tentando criar banco de dados '$database' em '$host:$port'");

        try {
            // Conexão PDO direta, sem usar o Laravel DB facade
            // Isso evita que o Laravel tente se conectar a um socket Unix
            $dsn = "mysql:host=$host;port=$port";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 30,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ];
            
            $pdo = new PDO($dsn, $username, $password, $options);
            $this->info("Conectado ao servidor MySQL com sucesso.");
            
            // Criar o banco de dados se não existir
            $statement = $pdo->prepare("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $statement->execute();
            
            $this->info("Banco de dados '$database' verificado ou criado com sucesso.");
            return 0;
            
        } catch (PDOException $e) {
            $this->error("Erro ao conectar ao MySQL ou criar o banco de dados:");
            $this->error($e->getMessage());
            
            $this->line("\nDetalhes da tentativa de conexão:");
            $this->line("Host: $host");
            $this->line("Porta: $port");
            $this->line("Usuário: $username");
            $this->line("Banco de dados: $database");
            
            $this->line("\nVerifique se:");
            $this->line("1. O container MySQL está em execução");
            $this->line("2. O MySQL está acessível pela rede Docker");
            $this->line("3. As configurações em .env estão corretas");
            $this->line("4. Há firewall ou restrições de acesso bloqueando a conexão");
            
            return 1;
        }
    }
}
