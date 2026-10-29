<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sobre Nós - Infinity Jump Games</title>

    <style>
        /* CONFIGURAÇÕES GERAIS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00112e, #061e49);
            color: #ffffff;
            min-height: 100vh;
        }

        /* CABEÇALHO */
        .sobre-header {
            width: 100%;
            min-height: 90px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 35px;
            background: #061a3b;
            border-bottom: 3px solid #087cff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        }

        /* BOTÃO VOLTAR */
        .btn-voltar {
            display: inline-block;
            padding: 12px 20px;
            background: #0756c9;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #55aaff;
            border-radius: 12px;
            transition: 0.3s;
        }

        .btn-voltar:hover {
            background: #087cff;
            transform: scale(1.04);
        }

        /* LOGO */
        .sobre-logo {
            width: 75px;
            height: 75px;
            object-fit: contain;
            border-radius: 15px;
        }

        /* ÁREA PRINCIPAL */
        .sobre-container {
            width: 100%;
            padding: 25px 20px 40px;
            display: flex;
            justify-content: center;
        }

        /* CARD PRINCIPAL */
        .sobre-card {
            width: 100%;
            max-width: 1160px;
            padding: 35px;
            background: linear-gradient(145deg, #031b43, #001638);
            border: 5px solid #087cff;
            border-radius: 30px;
            box-shadow: 0 0 25px rgba(0, 123, 255, 0.25);
        }

        /* TÍTULO DO CARD */
        .sobre-titulo {
            text-align: center;
            font-size: 34px;
            font-weight: 900;
            text-transform: uppercase;
            margin-bottom: 35px;
            color: #ffffff;
            text-shadow: 0 0 12px rgba(0, 123, 255, 0.5);
        }

        .sobre-titulo span {
            display: block;
            color: #19baff;
            margin-top: 5px;
        }

        /* SEÇÕES */
        .sobre-secao {
            margin-bottom: 30px;
        }

        .sobre-secao h2 {
            color: #ffffff;
            font-size: 25px;
            margin-bottom: 15px;
        }

        .sobre-secao p {
            font-size: 17px;
            line-height: 1.65;
            margin-bottom: 12px;
            color: #e3edff;
        }

        /* LISTA DE VALORES */
        .sobre-lista {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .sobre-item h3 {
            color: #19baff;
            font-size: 18px;
            margin-bottom: 12px;
        }

        .sobre-item p {
            font-size: 16px;
            line-height: 1.6;
            color: #e3edff;
        }

        /* DESTAQUE DO NOME */
        .destaque {
            color: #19baff;
            font-weight: bold;
        }

        /* RESPONSIVIDADE PARA CELULARES */
        @media (max-width: 768px) {
            .sobre-header {
                padding: 10px 15px;
                min-height: 75px;
            }

            .sobre-logo {
                width: 60px;
                height: 60px;
            }

            .btn-voltar {
                padding: 10px 12px;
                font-size: 12px;
            }

            .sobre-container {
                padding: 18px 12px;
            }

            .sobre-card {
                padding: 22px 18px;
                border-width: 3px;
                border-radius: 20px;
            }

            .sobre-titulo {
                font-size: 25px;
            }

            .sobre-secao h2 {
                font-size: 21px;
            }

            .sobre-secao p {
                font-size: 15px;
            }

            .sobre-lista {
                grid-template-columns: 1fr;
                gap: 22px;
            }
        }
    </style>
</head>

<body>

    <!-- CABEÇALHO -->
    <header class="sobre-header">

        <a href="index.php" class="btn-voltar">
            ← VOLTAR AO JOGO
        </a>

        <img
            src="assets/logo.png"
            alt="Logo Infinity Jump Games"
            class="sobre-logo"
        >

    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="sobre-container">

        <!-- CARD SOBRE NÓS -->
        <section class="sobre-card">

            <h1 class="sobre-titulo">
                Sobre Nós –
                <span>Infinity Jump Games</span>
            </h1>

            <!-- A NOSSA HISTÓRIA -->
            <section class="sobre-secao">

                <h2>⭐ A Nossa História</h2>

                <p>
                    Fundada por apaixonados pela cultura
                    <em>gaming</em>, a
                    <strong>Infinity Jump Games</strong> nasceu
                    com uma missão simples, mas ambiciosa: criar
                    experiências marcantes que conectem jogadores
                    de todo o mundo através da diversão, do desafio
                    e do entretenimento puro.
                </p>

                <p>
                    O que começou como um pequeno estúdio independente
                    transformou-se num laboratório de ideias sem limites.
                    Criamos universos vibrantes onde diferentes personagens,
                    estilos de arte e dinâmicas de jogo se cruzam,
                    oferecendo aos nossos jogadores possibilidades
                    infinitas a cada clique e salto.
                </p>

            </section>

            <!-- O QUE NOS MOVE -->
            <section class="sobre-secao">

                <h2>🎮 O Que Nos Move</h2>

                <div class="sobre-lista">

                    <article class="sobre-item">

                        <h3>💡 Inovação &amp; Diversão</h3>

                        <p>
                            Acreditamos que a jogabilidade deve vir
                            sempre em primeiro lugar. Criamos jogos
                            dinâmicos, intuitivos e viciantes.
                        </p>

                    </article>

                    <article class="sobre-item">

                        <h3>⭐ Diversidade de Universos</h3>

                        <p>
                            Gostamos de misturar mundos! Os nossos
                            títulos reúnem universos e personagens
                            variados para que cada jogador encontre
                            o seu herói favorito.
                        </p>

                    </article>

                    <article class="sobre-item">

                        <h3>👥 Comunidade em Primeiro Lugar</h3>

                        <p>
                            Desenvolvemos jogos para os jogadores.
                            O <em>feedback</em> da nossa comunidade
                            é o combustível que faz a nossa equipa
                            evoluir diariamente.
                        </p>

                    </article>

                </div>

            </section>

            <!-- O NOSSO COMPROMISSO -->
            <section class="sobre-secao">

                <h2>🎯 O Nosso Compromisso</h2>

                <p>
                    Quer estejas a competir pelo topo do
                    <em>ranking</em>, a desbloquear novas conquistas
                    ou apenas a passar o tempo numa partida rápida,
                    a <strong class="destaque">Infinity Jump Games</strong>
                    garante jogos otimizados, acessíveis e cheios de energia.
                </p>

            </section>

        </section>

    </main>

</body>
</html>





















    

