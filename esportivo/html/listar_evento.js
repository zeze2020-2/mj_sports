/* =========================================================
   MJ SPORTS - LISTA DE EVENTOS (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // Detectar se esta na pasta /evento/ ou /html/
    const isSubdir = window.location.pathname.includes('/evento/');
    const basePath = isSubdir ? '../' : '';

    // 1. Extrair os dados brutos dos eventos impressos pelo PHP
    const eventos = [];
    const h3Elements = document.querySelectorAll('body > h3');

    h3Elements.forEach(h3 => {
        const nome = h3.textContent.trim();
        let el = h3.nextElementSibling;
        let data = '';
        let local = '';
        let modalidade = '';
        let inscritos = '';
        let valor = '';
        let distancia = '';
        let imgSrc = '';

        while (el && el.tagName !== 'H3') {
            if (el.tagName === 'P') {
                const t = el.textContent.trim();
                if (t.startsWith('Data:')) data = t.replace('Data:', '').trim();
                else if (t.startsWith('Local:')) local = t.replace('Local:', '').trim();
                else if (t.startsWith('Modalidade:')) modalidade = t.replace('Modalidade:', '').trim();
                else if (t.startsWith('Inscritos:')) inscritos = t.replace('Inscritos:', '').trim();
                else if (t.startsWith('Valor:')) valor = t.replace('Valor:', '').trim();
                else if (t.startsWith('Distância:')) distancia = t.replace('Distância:', '').trim();
            } else if (el.tagName === 'IMG') {
                imgSrc = el.getAttribute('src');
                // Ajustar caminho da imagem se necessario
                if (!isSubdir && imgSrc && !imgSrc.startsWith('evento/') && !imgSrc.startsWith('http')) {
                    imgSrc = 'evento/' + imgSrc;
                }
            }
            el = el.nextElementSibling;
        }

        if (nome) {
            eventos.push({
                nome,
                data,
                local,
                modalidade: modalidade || 'Competicao',
                inscritos,
                valor,
                distancia,
                imgSrc
            });
        }
    });

    // 2. Limpar o body e construir a interface MJ SPORTS
    document.body.innerHTML = '';

    // Barra de Navegacao
    const nav = document.createElement('nav');
    nav.className = 'lista-nav';
    nav.innerHTML = `
        <a href="${basePath}home.php" class="logo">MJ<span>SPORTS</span></a>
        <ul>
            <li><a href="${basePath}home.php">Inicio</a></li>
            <li><a href="${isSubdir ? 'listar_evento.php' : 'listar_evento.php'}" class="ativo">Ver Eventos</a></li>
            <li><a href="${isSubdir ? 'cad_eventos.php' : 'evento/cad_eventos.php'}">Criar Evento</a></li>
            <li><a href="${basePath}perfil.php">Meu Perfil</a></li>
            <li><a href="${basePath}index.php">Sair</a></li>
        </ul>
    `;
    document.body.appendChild(nav);

    // Hero Header
    const hero = document.createElement('div');
    hero.className = 'lista-hero';
    hero.innerHTML = `
        <span class="subtitulo">PROGRAMACAO OFICIAL</span>
        <h1>TODOS OS <span>EVENTOS</span></h1>
        <p>Confira todas as competicoes, corridas e maratonas disponiveis na plataforma.</p>
    `;
    document.body.appendChild(hero);

    // Barra de Busca
    const buscaContainer = document.createElement('div');
    buscaContainer.className = 'busca-container';
    buscaContainer.innerHTML = '<input type="text" class="busca-input" id="buscaEventos" placeholder="Pesquisar por evento, cidade ou modalidade...">';
    document.body.appendChild(buscaContainer);

    // Grid de Cards
    const cardsGrid = document.createElement('div');
    cardsGrid.className = 'cards-grid';

    if (eventos.length > 0) {
        eventos.forEach(ev => {
            const card = document.createElement('div');
            card.className = 'card-evento';

            const imagemHtml = ev.imgSrc 
                ? `<img src="${ev.imgSrc}" alt="${ev.nome}" onerror="this.style.display='none'">`
                : '';

            card.innerHTML = `
                <span class="badge-modalidade">${ev.modalidade}</span>
                ${imagemHtml}
                <h2>${ev.nome}</h2>
                <div class="detalhes-lista">
                    ${ev.data ? `<div class="detalhe-item"><strong>DATA:</strong> ${ev.data}</div>` : ''}
                    ${ev.local ? `<div class="detalhe-item"><strong>LOCAL:</strong> ${ev.local}</div>` : ''}
                    ${ev.distancia ? `<div class="detalhe-item"><strong>PERCURSO:</strong> ${ev.distancia}</div>` : ''}
                    ${ev.inscritos ? `<div class="detalhe-item"><strong>VAGAS:</strong> ${ev.inscritos} participantes</div>` : ''}
                    ${ev.valor ? `<div class="detalhe-item detalhe-valor-preco">${ev.valor}</div>` : ''}
                </div>
                <a href="${basePath}home.php" class="botao">VER NO INICIO</a>
            `;
            cardsGrid.appendChild(card);
        });
    } else {
        cardsGrid.innerHTML = '<p style="color:#888; text-align:center; width:100%; padding:40px;">Nenhum evento cadastrado no momento.</p>';
    }

    document.body.appendChild(cardsGrid);

    // Rodape
    const footer = document.createElement('footer');
    footer.innerHTML = '<p>&copy; 2026 MJ SPORTS | TODOS OS DIREITOS RESERVADOS</p>';
    document.body.appendChild(footer);

    // Interatividade da Barra de Busca
    const buscaInput = document.getElementById('buscaEventos');
    if (buscaInput) {
        buscaInput.addEventListener('input', (e) => {
            const termo = e.target.value.toLowerCase().trim();
            const cards = cardsGrid.querySelectorAll('.card-evento');
            cards.forEach(c => {
                const texto = c.textContent.toLowerCase();
                c.style.display = texto.includes(termo) ? 'flex' : 'none';
            });
        });
    }
});
