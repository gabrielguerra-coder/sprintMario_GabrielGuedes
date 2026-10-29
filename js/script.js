/**
 * Super Mario Jump - Lógica do Jogo e Integração com Ranking MySQL (Laragon)
 */

document.addEventListener('DOMContentLoaded', () => {
    // Elementos do Jogo
    const tails = document.querySelector('.tails');
    const pipe = document.querySelector('.pipe');
    const coin = document.getElementById('coin');
    const explosionSound = new Audio('assets/som-explosao.mp3');
    explosionSound.preload = 'auto';
    // Som tocado quando o personagem pula
    const jumpSound = new Audio('assets/som-pulo.mp3');
    jumpSound.preload = 'auto';
    // Som tocado quando o jogador coleta uma moeda
    const coinSound = new Audio('assets/som-moeda.mp3');
    coinSound.preload = 'auto';
    const diamond = document.getElementById('diamond');
    let diamondLoop = null;

    // Recupera o personagem escolhido na página personagem.php
    const personagemEscolhido =
    localStorage.getItem('personagemImagem') || 'assets/tails.gif';

    const nomePersonagem =
    localStorage.getItem('personagemNome') || 'Tails';

    // Exibe o personagem selecionado
    tails.src = personagemEscolhido;
    tails.alt = nomePersonagem;
    const gameBoard = document.getElementById('game-board');
    const personagemImagem =
        localStorage.getItem('personagemImagem') || 'assets/tails.gif';

    const personagemNome =
        localStorage.getItem('personagemNome') || 'Tails';
    const hudPlayerName = document.getElementById('hud-player-name');
    const scoreDisplay = document.getElementById('score-display');
    const jumpTip = document.getElementById('jump-tip');

    // Modais e Telas
    const startModal = document.getElementById('start-modal');
    const startForm = document.getElementById('start-form');
    const playerInput = document.getElementById('player-input');
    const btnViewRanking = document.getElementById('btn-view-ranking');

    const gameoverModal = document.getElementById('gameover-modal');
    const finalScoreValue = document.getElementById('final-score-value');
    const saveStatusMsg = document.getElementById('save-status-msg');
    const rankingBody = document.getElementById('ranking-body');
    const btnRestart = document.getElementById('btn-restart');
    const btnChangePlayer = document.getElementById('btn-change-player');

    // Variáveis de Estado
    let currentPlayer = '';
    let score = 0;
    let isPlaying = false;
    let currentSpeedLevel = 0;
    let gameLoop = null;
    let scoreLoop = null;
    let isSpeedPause = false;
    let speedPauseTimeout = null;

    // Recupera último nome utilizado caso exista
    const savedName = localStorage.getItem('tails_jump_player');
    if (savedName && playerInput) {
        playerInput.value = savedName;
    }

    /**
     * Inicia uma nova rodada
     */
    function updateGameSpeed() {
        let speed;
        let newSpeedLevel;

        if (score >= 600) {
            speed = 0.7;
            newSpeedLevel = 3;
        } else if (score >= 300) {
            speed = 1.0;
            newSpeedLevel = 2;
        }else if (score >= 100) {
            speed = 1.3;
            newSpeedLevel = 1;
        } else {
            speed = 1.6;
            newSpeedLevel = 0;
        }

        gameBoard.style.setProperty('--pipe-speed', `${speed}s`);

        if (newSpeedLevel > currentSpeedLevel && isPlaying) {
            currentSpeedLevel = newSpeedLevel;
            pauseForSpeedChange();
        } else {
            currentSpeedLevel = newSpeedLevel;
        }
    }
    function pauseForSpeedChange() {
        if (!isPlaying) return;

        isSpeedPause = true;
        gameBoard.classList.add('speed-paused');
        coin.style.display = 'none';
        pipe.style.visibility = 'hidden';
        // Esconde a moeda.
        coin.style.display = 'none';
        diamond.style.display = 'none';

        // Esconde o obstáculo.
        pipe.style.visibility = 'hidden';
        pipe.style.animation = 'none';
        pipe.style.left = '';
        pipe.style.right = '';

        // Para os obstáculos.
        pipe.style.animationPlayState = 'paused';

        // Cria o aviso na tela.
        let warning = document.getElementById('speed-warning');

        if (!warning) {
            warning = document.createElement('div');
            warning.id = 'speed-warning';
            gameBoard.appendChild(warning);
        }

        warning.textContent =
            'PREPARE-SE! A VELOCIDADE VAI AUMENTAR!';

        Object.assign(warning.style, {
            display: 'block',
            position: 'absolute',
            top: '35%',
            left: '50%',
            transform: 'translate(-50%, -50%)',
            width: '80%',
            padding: '18px',
            background: '#111422',
            color: '#7dd3fc',
            border: '3px solid #38bdf8',
            borderRadius: '12px',
            textAlign: 'center',
            fontSize: '24px',
            fontWeight: 'bold',
            zIndex: '10'
        });

        clearTimeout(speedPauseTimeout);

        speedPauseTimeout = setTimeout(() => {
            warning.style.display = 'none';
            isSpeedPause = false;
            gameBoard.classList.remove('speed-paused');

            if (isPlaying) {
                // Prepara o obstáculo para começar da direita.
                pipe.style.animation = 'none';
                pipe.style.left = '';
                pipe.style.right = '';
                pipe.style.visibility = 'visible';

                // Prepara a moeda para começar novamente.
                coin.style.display = 'none';
                coin.style.animation = 'none';

                // Reinicia as animações.
                void pipe.offsetWidth;
                void coin.offsetWidth;

                pipe.style.animation = '';
                coin.style.animation = '';
                coin.style.display = 'block';
            }
        }, 1000);
    }



    function startGame() {
        // Limpa loops anteriores se existirem
        clearInterval(gameLoop);
        clearInterval(scoreLoop);
        clearTimeout(speedPauseTimeout);
        isSpeedPause = false;

        // Reseta posições e visuais
        resetElements();

        isPlaying = true;
        // Esconde o diamante no começo da partida.
        diamond.style.display = 'none';

        // Para o temporizador anterior.
        clearInterval(diamondLoop);

        // Faz aparecer um diamante a cada 10 segundos.
        diamondLoop = setInterval(() => {
            if (isPlaying && !isSpeedPause) {
                diamond.style.display = 'block';
                diamond.style.animation = 'none';

                // Faz a animação começar novamente.
                void diamond.offsetWidth;

                diamond.style.animation = '';
            }
        }, 8000);
        score = 0;
        scoreDisplay.textContent = '0';
        currentSpeedLevel = 0;
        updateGameSpeed();
        coin.style.display = 'block';
        coin.style.animation = 'none';

        void coin.offsetWidth;

        coin.style.animation = '';
        hudPlayerName.textContent = currentPlayer || 'Jogador';

        // Ativa animações CSS do jogo
        gameBoard.classList.add('running');

        // Loop de pontuação progressiva (1 ponto a cada 100ms)
        scoreLoop = setInterval(() => {
            if (isPlaying) {
                score += 1;
                scoreDisplay.textContent = score;

                updateGameSpeed();
            }
        }, 100);

        // Loop de colisão
        gameLoop = setInterval(checkCollision, 10);
    }


    function resetElements() {
        // Reseta cano
        pipe.style.animation = '';
        pipe.style.animationPlayState = 'running';
        pipe.style.left = '';
        tails.src = personagemImagem;
        tails.alt = personagemNome;
        tails.style.display = 'block';
        tails.style.width = '150px';
        tails.style.marginLeft = '0px';
        tails.classList.remove('jump');

        // Identifica o personagem escolhido
        const nome = personagemNome.toLowerCase().trim();
        // Ajusta cada personagem
        tails.classList.toggle('character-sonic', nome === 'sonic');
        tails.classList.toggle('character-luffy', nome === 'luffy');
        tails.classList.toggle('character-shadow', nome === 'shadow');
        tails.classList.toggle('character-tails', nome === 'tails');
        

        // Remove os cenários anteriores
        gameBoard.classList.remove(
            'sonic-world',
            'tails-world',
            'shadow-world',
            'luffy-world',
            'espaco-world'
        );

        // Ativa o cenário correto
        if (nome === 'sonic' || nome === 'tails') {
            gameBoard.classList.add('sonic-world');
        }
        else if (nome === 'shadow') {
            gameBoard.classList.add('shadow-world');
        }
        else if (nome === 'luffy') {
            gameBoard.classList.add('luffy-world');
        }
        else if (nome === 'among') {
            gameBoard.classList.add('espaco-world');
        }

        // Reseta Mario
        // Restaura o personagem escolhido
        tails.src = personagemEscolhido;
        tails.alt = nomePersonagem;
        tails.style.animation = '';
        tails.style.bottom = '0px';
        tails.style.width = '';
        tails.style.marginLeft = '';
        // Ajusta a posição do Shadow
        if (personagemNome.toLowerCase().trim() === 'shadow') {
            tails.style.width = '150px';
            tails.style.height = 'auto';
            tails.style.bottom = '-12px';
        }
        tails.classList.remove('jump');

        if (jumpTip) {
            jumpTip.style.opacity = '1';
        }
    }

    function jump() {
        if (!isPlaying) return;
        if (tails.classList.contains('jump')) return;

        // Toca o som do pulo
        jumpSound.currentTime = 0;
        jumpSound.play().catch(erro => {
            console.log('Não foi possível tocar o som do pulo:', erro);
        });

        tails.classList.add('jump');

        if (jumpTip) {
            jumpTip.style.opacity = '0';
        }

        setTimeout(() => {
            tails.classList.remove('jump');
        }, 500);

    }

    function checkCollision() {
        if (!isPlaying) return;

        const pipePosition = pipe.offsetLeft;
        const tailsPosition = parseFloat(
        window.getComputedStyle(tails).bottom
        );

        // Verifica se bateu no obstáculo
        if (
            pipePosition <= 120 &&
            pipePosition > 0 &&
            tailsPosition < 80
        ) {
            triggerGameOver(pipePosition, tailsPosition);
            return;
        }

        // Verifica se pegou a moeda
        const personagemRect = tails.getBoundingClientRect();
        const moedaRect = coin.getBoundingClientRect();

        if (
            coin.style.display !== 'none' &&
            personagemRect.left < moedaRect.right &&
            personagemRect.right > moedaRect.left &&
            personagemRect.top < moedaRect.bottom &&
            personagemRect.bottom > moedaRect.top
        ) {
            // Adiciona os pontos
            score += 15;
            scoreDisplay.textContent = score;

            // Toca o som da moeda
            coinSound.currentTime = 0;
            coinSound.play().catch(erro => {
                console.log('Não foi possível tocar o som:', erro);
            });

            // Esconde a moeda coletada
            coin.style.display = 'none';

            setTimeout(() => {
                if (isPlaying) {
                    coin.style.display = 'block';
                    coin.style.animation = 'none';
                    void coin.offsetWidth;
                    coin.style.animation = '';
                }
            }, 1000);
    }

    // Verifica se pegou o diamante
    if (diamond.style.display !== 'none') {
        const personagemRect = tails.getBoundingClientRect();
        const diamondRect = diamond.getBoundingClientRect();

        if (
            personagemRect.left < diamondRect.right &&
            personagemRect.right > diamondRect.left &&
            personagemRect.top < diamondRect.bottom &&
            personagemRect.bottom > diamondRect.top
        ) {
            score += 50;
            scoreDisplay.textContent = score;
            diamond.style.display = 'none';
        }
    }
}

    function triggerGameOver(pipePosition, tailsPosition) {
        isPlaying = false;
        clearInterval(gameLoop);
        clearInterval(scoreLoop);
        clearInterval(diamondLoop);
        diamond.style.display = 'none';

        gameBoard.classList.remove('running');

        // Congela o obstáculo no local da colisão
        pipe.style.animation = 'none';
        pipe.style.left = `${pipePosition}px`;
        pipe.style.right = 'auto';

        // Mostra a explosão no lugar do personagem
        tails.style.animation = 'none';
        tails.style.bottom = `${tailsPosition}px`;
        tails.src = 'assets/explosao.gif';
        tails.style.width = '150px';
        tails.style.marginLeft = '0px';
        tails.classList.remove('jump');

        explosionSound.pause();
        explosionSound.currentTime = 0;

        explosionSound.play().catch((erro) => {
            console.error('Erro ao tocar o som da explosão:', erro);
    });

        // Aguarda a explosão antes de abrir o Game Over
        setTimeout(() => {
            tails.style.display = 'none';

            // Atualiza a tela de Game Over
            finalScoreValue.textContent = score;
            saveStatusMsg.textContent = 'Salvando pontuação no banco...';
            saveStatusMsg.style.color = '#ffcc00';

            gameoverModal.classList.add('active');

            // Salva a pontuação
            saveScore(currentPlayer, score);
        }, 800);
    }


    function saveScore(playerName, finalScore) {
        fetch('salvar_ranking.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nome: playerName,
                pontos: finalScore
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                saveStatusMsg.textContent = 'Pontuação registrada no banco!';
                saveStatusMsg.style.color = '#10b981';
                if (data.ranking) {
                    renderRanking(data.ranking, playerName, finalScore);
                }
            } else {
                saveStatusMsg.textContent = '⚠️ ' + (data.message || 'Erro ao registrar.');
                saveStatusMsg.style.color = '#ef4444';
            }
        })
        .catch(err => {
            console.error('Erro na requisição:', err);
            saveStatusMsg.textContent = '⚠️ Erro ao conectar ao servidor Laragon.';
            saveStatusMsg.style.color = '#ef4444';
        });
    }

    /**
     * Busca o ranking atualizado no banco
     */
    function fetchRanking() {
        fetch('obter_ranking.php')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success' && data.ranking) {
                    renderRanking(data.ranking);
                }
            })
            .catch(err => console.error('Erro ao buscar ranking:', err));
    }

    /**
     * Atualiza a tabela HTML do ranking
     */
    function renderRanking(list, highlightName = null, highlightScore = null) {
        if (!rankingBody) return;
        rankingBody.innerHTML = '';

        if (!list || list.length === 0) {
            rankingBody.innerHTML = '<tr><td colspan="3" class="loading-cell">Nenhuma pontuação gravada ainda. Jogue para ser o 1º!</td></tr>';
            return;
        }

        let highlighted = false;

        list.forEach((item, index) => {
            const tr = document.createElement('tr');

            // Destaca a pontuação atual recém-salva se coincidir
            if (!highlighted && highlightName && item.nome === highlightName && parseInt(item.pontos, 10) === highlightScore) {
                tr.classList.add('highlight-current');
                highlighted = true;
            }

            let medal = `${index + 1}º`;
            if (index === 0) medal = '🥇 1º';
            else if (index === 1) medal = '🥈 2º';
            else if (index === 2) medal = '🥉 3º';

            tr.innerHTML = `
                <td class="ranking-pos">${medal}</td>
                <td><strong>${escapeHtml(item.nome)}</strong></td>
                <td>${parseInt(item.pontos, 10)} pts</td>
            `;

            rankingBody.appendChild(tr);
        });
    }

    /**
     * Função auxiliar para sanitizar strings no HTML
     */
    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    // Submit do Formulário de Início (INICIAR JOGO)
    startForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Impede o recarregamento da página

        const nameValue = playerInput.value.trim();
        if (!nameValue) {
            playerInput.focus();
            return;
        }

        currentPlayer = nameValue;
        localStorage.setItem('tails_jump_player', currentPlayer);

        // Fecha tela de início e começa o jogo
        startModal.classList.remove('active');
        startGame();
    });

    // Botão "VER RANKING" na tela inicial
    btnViewRanking.addEventListener('click', () => {
        fetchRanking();
        finalScoreValue.textContent = '---';
        saveStatusMsg.textContent = '';
        startModal.classList.remove('active');
        gameoverModal.classList.add('active');
    });

    // Botão "JOGAR NOVAMENTE" no Game Over
    btnRestart.addEventListener('click', () => {
        gameoverModal.classList.remove('active');
        if (!currentPlayer) {
            startModal.classList.add('active');
            playerInput.focus();
        } else {
            startGame();
        }
    });

    // 4. Botão "TROCAR JOGADOR" no Game Over
    btnChangePlayer.addEventListener('click', () => {
        gameoverModal.classList.remove('active');
        resetElements();
        startModal.classList.add('active');
        playerInput.value = '';
        playerInput.focus();
    });

    // 5. Controle do Pulo por Teclado (Espaço ou Seta para Cima)
    document.addEventListener('keydown', (e) => {
        if (e.code === 'Space' || e.key === ' ' || e.code === 'ArrowUp') {
            if (isPlaying) {
                e.preventDefault();
                jump();
            }
        }
    });
});