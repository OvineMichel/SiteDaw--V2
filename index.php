<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,369;1,369&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header style="display: flex; justify-content: center; align-items: center;">
        <h1 id="titulo">Boutique Elegance</h1>
    </header>
    <div id="div-conteudo">
        <div id="div-conteudo-filho">
            <h1>Bem Vindo A boutique Elegance</h1>
            <p>O seu portal online de moda e acessórios, onde elegância e sofisticação se encontram ao alcance de um clique. Em nossa loja virtual, oferecemos uma experiência de compra exclusiva, dedicada aos amantes da moda que buscam peças únicas e atemporais sem sair de casa.<br><br>
A "Boutique Elegance" é mais do que um e-commerce; é um espaço cuidadosamente curado que reflete as últimas tendências e o melhor do design de moda mundial. Nossa seleção abrange desde roupas que definem a estação até acessórios que são verdadeiras declarações de estilo, garantindo que cada cliente encontre exatamente o que procura para expressar sua individualidade e elegância.</p>
            <a href="usuarios/login.php" class="btn-op">Login</a>
            <a href="usuarios/cadastro_usuario.php" class="btn-op">Cadastro</a>
            <div style="display: flex; justify-content:center;">
            <?php if(isset($_GET['cadastrarok']))
                    echo "<p style='font-family: roboto condensed; text-align:center; color:white;  background-color: green; width:180px; margin: 4px; margin-top: 20px; padding:4px; border-radius: 10px;'>Cadastro realizado com sucesso</p>";?>
            </div>
            <div style="display: flex; justify-content:center;">
            <?php if(isset($_GET['loginok']))
                    echo "<p style='font-family: roboto condensed; text-align:center; color:white;  background-color: green; width:180px; margin: 4px; margin-top: 20px; padding:4px; border-radius: 10px;'>Login realizado com sucesso</p>";?>
            </div>
            </div>
        </div>
</body>
</html>