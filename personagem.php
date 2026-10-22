
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Personagem - Mario Jump</title>

    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #101b3d;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .selecao {
            width: 90%;
            max-width: 800px;
            text-align: center;
            padding: 30px 15px;
        }

        .personagens {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 30px 0;
        }

        .personagem {
            width: 190px;
            min-height: 200px;
            background: #23345f;
            border: 3px solid transparent;
            border-radius: 15px;
            color: white;
            cursor: pointer;
            padding: 15px;
            transition: 0.2s;
        }

        .personagem:hover {
            border-color: #58c7ff;
            transform: translateY(-5px);
        }

        .personagem img {
            width: 130px;
            height: 130px;
            object-fit: contain;
            image-rendering: pixelated;
        }
        .personagem h2 {
            font-size: 20px;
        }

        .voltar {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 22px;
            border-radius: 8px;
            background: #465d91;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <main class="selecao">
        <h1>ESCOLHA SEU PERSONAGEM</h1>
        <p>Clique no personagem que você quer usar no jogo!</p>

        <div class="personagens">

            <!-- Tails -->
        <button class="personagem" type="button"
            onclick="escolherPersonagem('Tails', 'assets/tails.gif')">
            <img src="assets/tails.gif" alt="Tails">
            <h2>Tails</h2>
        </button>

        <!-- Mario -->
        <button class="personagem" type="button"
            onclick="escolherPersonagem('Mario', 'assets/mario.gif')">
            <img src="assets/mario.gif" alt="Mario">
            <h2>Mario</h2>
        </button>

        <!-- Sonic -->
        <button class="personagem" type="button"
            onclick="escolherPersonagem('Sonic', 'assets/sonic.gif')">
            <img src="assets/sonic.gif" alt="Sonic">
            <h2>Sonic</h2>
        </button>

        <!-- Yoshi -->
        <button class="personagem" type="button"
            onclick="escolherPersonagem('Yoshi', 'assets/yoshi_dino.gif')">
            <img src="assets/yoshi_dino.gif" alt="Yoshi">
            <h2>Yoshi</h2>
        </button>

        <!-- Luffy -->
        <button class="personagem" type="button"
            onclick="escolherPersonagem('Luffy', 'assets/luffy (1).gif')">
            <img src="assets/luffy (1).gif" alt="Luffy">
            <h2>Luffy</h2>
        </button>

        <button class="personagem" type="button"
            onclick="escolherPersonagem('ete', 'assets/ete.gif')">
            <img src="assets/ete.gif" alt="ete">
            <h2>Ete</h2>
        </button>

        </div>

        <a class="voltar" href="index.php">Voltar sem escolher</a>
    </main>

    <script>
        function escolherPersonagem(nome, imagem) {
            localStorage.setItem('personagemNome', nome);
            localStorage.setItem('personagemImagem', imagem);

            window.location.href = 'index.php';
        }
    </script>
</body>
</html>





                    