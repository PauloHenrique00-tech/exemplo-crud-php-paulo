<?php
require_once "conecta.php";

/* Lógica/Funções para o CRUD de Fabricantes */

// listarFabricantes: usada pela página fabricantes/visualizar.php
function listarFabricantes(PDO $conexao):array {
    $sql = "SELECT * FROM fabricantes ORDER BY nome";

    try {
        /* Preparando o comando SQL ANTES de executar no servidor
        e guardando em memória (variável consulta ou query) */
        $consulta = $conexao->prepare($sql);
    
        /* Executando o comando no banco de dados */
        $consulta->execute();
    
        /* Busca/Retorna todos os dados provenientes da execução da consulta
        e os transforma em um array associativo */
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}


// inserirFabricante: usada pela página fabricantes/inserir.php
                                                        // void indica que não tem retorno
function inserirFabricante(PDO $conexao, string $nomeDoFabricante):void {
    /* :named parameter (parâmetro nomeado)
    Usamos este recurso do PDO para 'reservar' um espaço seguroem memória
    para colocação do dado. NUNCA passe de forma direta valores para comando SQL. */ 
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

    try {
        $consulta = $conexao->prepare($sql);

        /* bindValue() -> permite vicular o valor
        do parâmetro à consulta que será executada. É necessário indicar qual é o parâmetro (:nome), de onde vem o valor
        ($nomeDoFabricante) e de que tipo ele é (PDO:PARAM_STR) */
        $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);

        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}