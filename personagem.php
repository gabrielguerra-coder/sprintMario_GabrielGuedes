
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
                background: #111422;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                box-sizing: border-box;
            }

            .selecao {
                width: 90%;
                max-width: 900px;
                text-align: center;
                padding: 25px 15px;
                box-sizing: border-box;
            }

            .selecao h1 {
                color: #7dd3fc;
                font-size: 30px;
                text-shadow: 0 0 10px rgba(56, 189, 248, 0.35);
            }

            .selecao p {
                color: #dbeafe;
                font-size: 16px;
            }

            .personagens {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 18px;
                margin: 25px 0;
            }

            .personagem {
                width: 190px;
                min-height: 200px;
                background: #1f2438;
                border: 2px solid #164e75;
                border-radius: 12px;
                color: #ffffff;
                cursor: pointer;
                padding: 15px;
                transition: 0.2s;
                box-sizing: border-box;
            }

            .personagem:hover {
                border-color: #38bdf8;
                background: #263653;
                transform: translateY(-5px);
                box-shadow: 0 0 12px rgba(56, 189, 248, 0.25);
            }

            .personagem img {
                width: 130px;
                height: 130px;
                object-fit: contain;
                image-rendering: pixelated;
            }

            .personagem h2 {
                color: #7dd3fc;
                font-size: 20px;
                margin-bottom: 5px;
            }

            .voltar {
                display: inline-block;
                margin-top: 10px;
                padding: 12px 22px;
                border: 2px solid #164e75;
                border-radius: 8px;
                background: #1f2438;
                color: #7dd3fc;
                text-decoration: none;
                font-weight: bold;
                transition: 0.2s;
            }

            .voltar:hover {
                background: #263653;
                border-color: #38bdf8;
            }

            @media (max-width: 600px) {
                .selecao h1 {
                    font-size: 24px;
                }

                .personagens {
                    gap: 12px;
                }

                .personagem {
                    width: 145px;
                    min-height: 170px;
                    padding: 10px;
                }

                .personagem img {
                    width: 100px;
                    height: 100px;
                }
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
            onclick="escolherPersonagem('among', 'assets/amongus.gif')">
            <img src="assets/amongus.gif" alt="among">
            <h2>Among us</h2>
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





                    