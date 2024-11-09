<?php

// Interface Cadastro com método cadastrar()
interface Cadastro {
    public function cadastrar();
}

// Classe Vaga que implementa Cadastro
class Vaga implements Cadastro {
    private $titulo;
    private $descricao;
    private $candidatos = [];

    public function __construct(string $titulo, string $descricao) {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
    }

    public function cadastrar() {
        echo "Vaga para '{$this->titulo}' cadastrada!\n";
    }

    // Método para adicionar candidato à vaga
    public function adicionarCandidato(Profissional $profissional) {
        $this->candidatos[] = $profissional;
        echo "Profissional {$profissional->getNome()} aplicado à vaga '{$this->titulo}'.\n";
    }

    // Exibe todos os candidatos aplicados à vaga
    public function exibirCandidatos() {
        echo "Candidatos aplicados para a vaga '{$this->titulo}':\n";
        foreach ($this->candidatos as $candidato) {
            $candidato->exibirInformacoes();
        }
    }
}

// Classe abstrata Pessoa com atributos protegidos
abstract class Pessoa {
    protected $nome;
    protected $idade;

    public function __construct(string $nome, int $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    // Método abstrato para exibir informações
    abstract public function exibirInformacoes();

    // Getter para o nome (usado na classe Vaga)
    public function getNome() {
        return $this->nome;
    }
}

// Classe Profissional que estende Pessoa
class Profissional extends Pessoa {
    public function exibirInformacoes() {
        echo "Nome: {$this->nome}, Idade: {$this->idade}\n";
    }

    // Método para aplicar em uma vaga
    public function aplicarVaga(Vaga $vaga) {
        $vaga->adicionarCandidato($this);
    }
}

// Exemplo de uso

// Cadastro de uma vaga
$vaga = new Vaga("Desenvolvedor Web", "Desenvolver e manter sistemas web");
$vaga->cadastrar();

// Cadastro de um profissional
$profissional = new Profissional("Maria Souza", 29);

// Aplicação do profissional na vaga
$profissional->aplicarVaga($vaga);

// Exibir candidatos para a vaga
$vaga->exibirCandidatos();
?>