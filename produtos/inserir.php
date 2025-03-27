<?php
require_once '../src/funcoes-fabricantes.php';
require_once '../src/funcoes-produtos.php';
$listadeFabricantes = listarFabricantes($conexao);

if(isset($_POST["inserir"])) {
    // capturar/sanitizar os dados
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_NUMBER_FLOAT);
    // Chamar a função responsável por inserir o produto e passar os parâmetros
function inserirProduto($conexao, $nome, $preco, $quantidade, $idFabricante, $descricao)
    header("location:visualizar.php");
    exit;
    /* NÃO SE ESQUEÇA DE TERMINAR A FUNÇÃO inserirProduto() */

    // Por fim, redirecionar para visualização dos produtos
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-2 shadow-lg rounded pb-1">
        <h1><a class="btn btn-outline-dark" href="visualizar.php">&lt; Voltar</a> Produtos | INSERT</h1>
        <hr>

        <form action="" method="post" class="w-50">
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="preco">Preço:</label>
                <input class="form-control" type="number" min="10" max="10000" step="0.01" name="preco" id="preco" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="quantidade">Quantidade:</label>
                <input class="form-control" type="number" min="1" max="100" name="quantidade" id="quantidade" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="fabricante">Fabricante:</label>
                <select class="form-select" name="fabricante" id="fabricante" required>
                    <option value=""></option>

                <?php foreach($listadeFabricantes as $fabricante): ?>
                    <option value="<?=$fabricante["id"]?>"><?=$fabricante["nome"]?> </option>
                <?php endforeach; ?>    
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição:</label> <br>
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="3"></textarea>
            </div>
            <button class="btn btn-success" type="submit" name="inserir">Inserir produto</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>