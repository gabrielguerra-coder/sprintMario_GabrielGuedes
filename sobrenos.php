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
        /* Área que organiza os cards na vertical */
        .sobre-container {
            width: 100%;
            padding: 25px 20px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
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
        /* CARD MULTIVERSE JUMP */
        .multiverse-card {
            width: 100%;
            max-width: 1160px;
            padding: 35px;
            background: linear-gradient(145deg, #031b43, #001638);
            border: 5px solid #087cff;
            border-radius: 30px;
            box-shadow: 0 0 25px rgba(0, 123, 255, 0.25);
            margin-top: 30px;
        }

        /* TÍTULO DO MULTIVERSE JUMP */
        .multiverse-titulo {
            text-align: center;
            font-size: 32px;
            font-weight: 900;
            text-transform: uppercase;
            color: #19baff;
            margin-bottom: 25px;
            text-shadow: 0 0 12px rgba(0, 123, 255, 0.5);
        }

        /* TEXTOS DO JOGO */
        .multiverse-card p {
            font-size: 17px;
            line-height: 1.7;
            color: #e3edff;
            margin-bottom: 18px;
        }

        /* TÍTULO DOS DESTAQUES */
        .multiverse-subtitulo {
            color: #ffffff;
            font-size: 24px;
            margin: 25px 0 20px;
        }

        /* LISTA DE DESTAQUES */
        .multiverse-lista {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .multiverse-lista li {
            color: #e3edff;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 15px;
            padding: 15px;
            background: rgba(8, 124, 255, 0.10);
            border-left: 4px solid #19baff;
            border-radius: 8px;
        }

        .multiverse-lista strong {
            color: #19baff;
        }

        /* FRASE FINAL */
        .multiverse-frase {
            margin-top: 25px;
            padding: 20px;
            background: rgba(8, 124, 255, 0.15);
            border: 2px solid #087cff;
            border-radius: 12px;
            text-align: center;
            color: #19baff !important;
            font-size: 19px !important;
            font-weight: bold;
            font-style: italic;
        }

        /* AJUSTES PARA CELULARES */
        @media (max-width: 768px) {
            .multiverse-card {
                padding: 22px 18px;
                border-width: 3px;
                border-radius: 20px;
            }

            .multiverse-titulo {
                font-size: 25px;
            }

            .multiverse-subtitulo {
                font-size: 21px;
            }

            .multiverse-card p,
            .multiverse-lista li {
                font-size: 15px;
            }

            .multiverse-frase {
                font-size: 16px !important;
            }
        }
        .requisitos-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 25px;
            margin-top: 25px;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .requisitos-titulo {
            color: #5dade2;
            font-size: 26px;
            margin-bottom: 20px;
            text-align: center;
        }

        .requisitos-lista {
            padding-left: 25px;
            margin: 0;
        }

        .requisitos-lista li {
            margin-bottom: 12px;
            line-height: 1.6;
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

        <!-- CARD MULTIVERSE JUMP -->
        <section class="multiverse-card">

            <h2 class="multiverse-titulo">
                🎮 Multiverse Jump
            </h2>

            <p>
                <strong class="destaque">Multiverse Jump</strong> é o jogo
                principal da <strong class="destaque">Infinity Jump Games</strong>,
                onde diferentes universos se encontram em um desafio de
                corrida e pulos sem fim!
            </p>

            <p>
                Em um único lugar, você pode jogar com os seus personagens
                favoritos dos games e da cultura pop. Escolha entre ícones
                lendários como <strong>Mario</strong>, <strong>Sonic</strong>,
                <strong>Shadow</strong>, <strong>Tails</strong>,
                <strong>Yoshi</strong> e até o intrépido
                <strong>Among Us</strong>! Cada corrida é uma nova oportunidade
                de testar seus reflexos, desviar de obstáculos dinâmicos,
                coletar moedas e diamantes valiosos e alcançar pontuações
                astronômicas.
            </p>

            <!-- DESTAQUES DO JOGO -->
            <h3 class="multiverse-subtitulo">
                ⭐ Destaques do Jogo
            </h3>

            <ul class="multiverse-lista">

                <li>
                    <strong>🎭 Elenco Multiverso:</strong>
                    Jogue com diversos personagens clássicos e modernos,
                    cada um com cenários e visuais personalizados
                    (como o chão lunar exclusivo do Among Us!).
                </li>

                <li>
                    <strong>⚡ Velocidade Progressiva:</strong>
                    Conforme você ganha mais pontos, a velocidade do jogo
                    aumenta, colocando a sua reação à prova.
                </li>

                <li>
                    <strong>💎 Coletáveis Mágicos:</strong>
                    Pegue moedas e diamantes ao longo da corrida para
                    alavancar sua pontuação.
                </li>

                <li>
                    <strong>🏆 Ranking Global TOP 10:</strong>
                    Dispute o topo da tabela com outros jogadores e prove
                    quem é o verdadeiro mestre dos pulos!
                </li>

            </ul>

            <!-- FRASE FINAL -->
            <p class="multiverse-frase">
                "Escolha seu herói, supere os obstáculos e conquiste o topo
                do Multiverso em <strong>Multiverse Jump</strong>!"
            </p>
            <!-- Card de Requisitos Funcionais -->

            <div class="requisitos-card">
                <h2 class="requisitos-titulo">Requisitos Funcionais</h2>

                <ul class="requisitos-lista">
                    <li>RF01 - Permitir que o jogador informe seu nome.</li>
                    <li>RF02 - Permitir que o jogador escolha um personagem.</li>
                    <li>RF03 - Salvar o personagem selecionado.</li>
                    <li>RF04 - Permitir iniciar o jogo.</li>
                    <li>RF05 - Permitir que o personagem pule durante a partida.</li>
                    <li>RF06 - Exibir obstáculos durante o jogo.</li>
                    <li>RF07 - Detectar colisões e encerrar a partida.</li>
                    <li>RF08 - Contabilizar a pontuação do jogador.</li>
                    <li>RF09 - Permitir coletar moedas para ganhar pontos.</li>
                    <li>RF10 - Permitir coletar diamantes para ganhar pontos.</li>
                    <li>RF11 - Aumentar a dificuldade conforme a pontuação.</li>
                    <li>RF12 - Exibir a tela de Game Over.</li>
                    <li>RF13 - Permitir reiniciar o jogo.</li>
                    <li>RF14 - Permitir alterar o nome do jogador.</li>
                    <li>RF15 - Permitir trocar de personagem.</li>
                    <li>RF16 - Salvar a pontuação e o nome no banco de dados.</li>
                    <li>RF17 - Exibir o ranking dos jogadores.</li>
                    <li>RF18 - Atualizar o ranking após uma partida.</li>
                    <li>RF19 - Reproduzir efeitos sonoros durante o jogo.</li>
                    <li>RF20 - Exibir informações sobre o jogo.</li>
                </ul>

                </div>

                <!-- Card de Requisitos Não Funcionais -->

                <div class="requisitos-card">
                    <h2 class="requisitos-titulo">Requisitos Não Funcionais</h2>

                    <ul class="requisitos-lista">
                        <li>RNF01 - O jogo deve ser fácil de utilizar.</li>
                        <li>RNF02 - O jogo deve carregar e responder rapidamente.</li>
                        <li>RNF03 - O sistema deve funcionar nos principais navegadores.</li>
                        <li>RNF04 - A interface deve se adaptar a diferentes tamanhos de tela.</li>
                        <li>RNF05 - O personagem selecionado deve ser mantido quando necessário.</li>
                        <li>RNF06 - Os dados do ranking devem ser armazenados corretamente.</li>
                        <li>RNF07 - O sistema deve validar os dados recebidos e proteger o banco de dados.</li>
                        <li>RNF08 - O código deve ser organizado e fácil de manter.</li>
                        <li>RNF09 - Os textos e controles devem ser legíveis e acessíveis.</li>
                        <li>RNF10 - O jogo deve funcionar de forma estável.</li>
                        <li>RNF11 - O sistema deve lidar adequadamente com falhas no armazenamento local.</li>
                        <li>RNF12 - A navegação entre as páginas deve ser clara.</li>
                    </ul>

                </div>

        </section>

    </main>

    

</body>
</html>





















    

