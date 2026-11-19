/* =========================================================
   MJ SPORTS - HOME INTERATIVIDADE (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Inserir Logotipo MJ SPORTS na barra de navegacao caso nao exista
    const nav = document.querySelector('nav');
    if (nav && !nav.querySelector('.logo')) {
        const logoLink = document.createElement('a');
        logoLink.href = 'home.php';
        logoLink.className = 'logo';
        logoLink.innerHTML = 'MJ<span>SPORTS</span>';
        nav.insertBefore(logoLink, nav.firstChild);

        // Adicionar botao de sair no final do menu
        const ul = nav.querySelector('ul');
        if (ul && !ul.querySelector('.link-sair')) {
            const li = document.createElement('li');
            li.innerHTML = '<a href="index.php" class="link-sair">Sair</a>';
            ul.appendChild(li);
        }
    }

    // 2. Envolver subtitulo e introducao esportiva
    const h1 = document.querySelector('h1');
    if (h1 && !document.querySelector('.subtitulo')) {
        const subtitulo = document.createElement('span');
        subtitulo.className = 'subtitulo';
        subtitulo.textContent = 'SEU ESPORTE, SUA HISTORIA';
        h1.parentNode.insertBefore(subtitulo, h1);
    }

    // 3. Barra de Pesquisa em Tempo Real
    const filtrosContainer = document.querySelector('.filtros');
    if (filtrosContainer && !document.querySelector('.busca-container')) {
        const buscaDiv = document.createElement('div');
        buscaDiv.className = 'busca-container';
        buscaDiv.innerHTML = '<input type="text" class="busca-input" id="filtroBusca" placeholder="Pesquisar por competicao, cidade ou modalidade...">';
        filtrosContainer.parentNode.insertBefore(buscaDiv, filtrosContainer);

        const buscaInput = document.getElementById('filtroBusca');
        buscaInput.addEventListener('input', (e) => {
            const termo = e.target.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.cards .card');

            cards.forEach(card => {
                const texto = card.textContent.toLowerCase();
                if (texto.includes(termo)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // 4. Formatacao inteligente dos dados do Card
    const cards = document.querySelectorAll('.cards .card');
    cards.forEach(card => {
        const paragrafos = card.querySelectorAll('p');
        paragrafos.forEach(p => {
            const texto = p.textContent.trim();

            if (texto.startsWith('R$')) {
                p.classList.add('valor-tag');
            } else if (texto.includes('inscritos')) {
                p.innerHTML = '<strong>VAGAS:</strong> ' + texto;
            } else if (texto.match(/^\d{2}\/\d{2}\/\d{4}/)) {
                p.innerHTML = '<strong>DATA:</strong> ' + texto;
            } else if (texto.toLowerCase().includes('km') || texto.toLowerCase().includes('metros')) {
                p.innerHTML = '<strong>PERCURSO:</strong> ' + texto;
            } else if (!p.querySelector('strong') && !p.classList.contains('valor-tag')) {
                p.innerHTML = '<strong>LOCAL:</strong> ' + texto;
            }
        });

        // Efeito interativo de elevacao suave
        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.3s ease';
        });
    });

    // 5. Inserir Rodape padrao MJ SPORTS caso nao exista
    if (!document.querySelector('footer')) {
        const footer = document.createElement('footer');
        footer.innerHTML = '<p>&copy; 2026 MJ SPORTS | TODOS OS DIREITOS RESERVADOS</p>';
        document.body.appendChild(footer);
    }
});
