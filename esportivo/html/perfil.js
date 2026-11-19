/* =========================================================
   MJ SPORTS - PERFIL DO ATLETA (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Extrair os dados brutos impressos pelo PHP no body
    const bodyText = document.body.innerText;

    // Funcao auxiliar para extrair valores por expressao regular
    const extrairCampo = (padrao) => {
        const match = bodyText.match(padrao);
        return match ? match[1].trim() : '';
    };

    const nome = extrairCampo(/Nome:\s*([^\n\r<]+)/i) || 'Atleta';
    let nascimento = extrairCampo(/Nascimento:\s*([^\n\r<]+)/i);
    if (nascimento && nascimento.includes('-')) {
        const partes = nascimento.split('-');
        if (partes.length === 3) {
            nascimento = `${partes[2]}/${partes[1]}/${partes[0]}`;
        }
    }
    const cpf = extrairCampo(/cpf:\s*([^\n\r<]+)/i);
    const senha = extrairCampo(/senha:\s*([^\n\r<]+)/i);
    const email = extrairCampo(/Email:\s*([^\n\r<]+)/i);
    const sexo = extrairCampo(/Sexo:\s*([^\n\r<]+)/i);

    // Extrair inscricoes existentes
    const inscricoes = [];
    const h3Elements = document.querySelectorAll('h3');
    h3Elements.forEach(h3 => {
        const nomeEvento = h3.textContent.trim();
        let el = h3.nextElementSibling;
        let dataEvento = '';
        let localEvento = '';

        while (el && el.tagName !== 'H3' && el.tagName !== 'HR') {
            const texto = el.textContent || '';
            if (texto.includes('Data:')) {
                dataEvento = texto.replace(/Data:\s*/i, '').trim();
            } else if (texto.includes('Local:')) {
                localEvento = texto.replace(/Local:\s*/i, '').trim();
            }
            el = el.nextElementSibling;
        }

        if (nomeEvento) {
            inscricoes.push({
                nome: nomeEvento,
                data: dataEvento || 'A definir',
                local: localEvento || 'A definir'
            });
        }
    });

    // Iniciais para o avatar
    const partesNome = nome.split(' ').filter(Boolean);
    const iniciais = (partesNome.length > 1) 
        ? (partesNome[0][0] + partesNome[partesNome.length - 1][0]).toUpperCase()
        : (nome.substring(0, 2) || 'MJ').toUpperCase();

    // 2. Limpar o conteudo bruto do body e estruturar a interface MJ SPORTS
    document.body.innerHTML = '';

    // Barra de Navegacao Superior
    const nav = document.createElement('nav');
    nav.className = 'perfil-nav';
    nav.innerHTML = `
        <a href="home.php" class="logo">MJ<span>SPORTS</span></a>
        <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="listar_evento.php">Ver Eventos</a></li>
            <li><a href="evento/cad_eventos.php">Criar Evento</a></li>
            <li><a href="perfil.php" class="ativo">Meu Perfil</a></li>
            <li><a href="index.php">Sair</a></li>
        </ul>
    `;
    document.body.appendChild(nav);

    // Secao Hero
    const hero = document.createElement('div');
    hero.className = 'perfil-hero';
    hero.innerHTML = `
        <span class="subtitulo">PAINEL DO ATLETA</span>
        <h1>MEU <span>PERFIL</span></h1>
    `;
    document.body.appendChild(hero);

    // Container de Conteudo Principal
    const container = document.createElement('div');
    container.className = 'perfil-container';

    // Coluna 1: Dados Pessoais do Atleta
    const cardUsuario = document.createElement('div');
    cardUsuario.className = 'card-usuario';
    cardUsuario.innerHTML = `
        <div class="card-usuario-header">
            <div class="avatar-badge">${iniciais}</div>
            <div>
                <h2>${nome}</h2>
                <p>ATLETA CONFIRMADO</p>
            </div>
        </div>

        <div class="dados-grid">
            <div class="dado-item">
                <span class="dado-label">NOME COMPLETO</span>
                <span class="dado-valor">${nome}</span>
            </div>

            <div class="dado-item">
                <span class="dado-label">CPF</span>
                <span class="dado-valor">${cpf || 'Nao informado'}</span>
            </div>

            <div class="dado-item">
                <span class="dado-label">DATA DE NASCIMENTO</span>
                <span class="dado-valor">${nascimento || 'Nao informada'}</span>
            </div>

            <div class="dado-item">
                <span class="dado-label">E-MAIL DE CONTATO</span>
                <span class="dado-valor">${email || 'Nao informado'}</span>
            </div>

            <div class="dado-item">
                <span class="dado-label">GENERO</span>
                <span class="dado-valor">${sexo || 'Nao informado'}</span>
            </div>

            <div class="dado-item">
                <span class="dado-label">SENHA DE ACESSO</span>
                <div class="dado-valor">
                    <span id="senhaTexto">${senha ? '••••••••' : 'Nao definida'}</span>
                    ${senha ? '<button type="button" class="btn-toggle-senha" id="btnToggleSenha">Mostrar</button>' : ''}
                </div>
            </div>
        </div>
    `;
    container.appendChild(cardUsuario);

    // Coluna 2: Minhas Inscricoes
    const cardInscricoes = document.createElement('div');
    cardInscricoes.className = 'card-inscricoes';

    let htmlInscricoes = `
        <div class="card-inscricoes-header">
            <h2>MINHAS INSCRIÇÕES</h2>
            <span class="contador-inscricoes">${inscricoes.length} CONFIRMADAS</span>
        </div>
    `;

    if (inscricoes.length > 0) {
        htmlInscricoes += '<div class="inscricoes-lista">';
        inscricoes.forEach(item => {
            htmlInscricoes += `
                <div class="item-inscricao">
                    <div class="item-inscricao-topo">
                        <h3>${item.nome}</h3>
                        <span class="badge-status">CONFIRMADO</span>
                    </div>
                    <div class="item-inscricao-detalhes">
                        <div class="detalhe-linha">
                            <strong>DATA:</strong> ${item.data}
                        </div>
                        <div class="detalhe-linha">
                            <strong>LOCAL:</strong> ${item.local}
                        </div>
                    </div>
                </div>
            `;
        });
        htmlInscricoes += '</div>';
    } else {
        htmlInscricoes += `
            <div class="sem-inscricao">
                <p>Voce ainda nao esta inscrito em nenhum evento.</p>
                <a href="home.php" class="botao">EXPLORAR COMPETICOES</a>
            </div>
        `;
    }

    cardInscricoes.innerHTML = htmlInscricoes;
    container.appendChild(cardInscricoes);

    document.body.appendChild(container);

    // Rodape MJ SPORTS
    const footer = document.createElement('footer');
    footer.innerHTML = '<p>&copy; 2026 MJ SPORTS | TODOS OS DIREITOS RESERVADOS</p>';
    document.body.appendChild(footer);

    // Interatividade: Alternar exibicao da senha
    const btnToggleSenha = document.getElementById('btnToggleSenha');
    const senhaTexto = document.getElementById('senhaTexto');
    if (btnToggleSenha && senhaTexto) {
        let visivel = false;
        btnToggleSenha.addEventListener('click', () => {
            visivel = !visivel;
            if (visivel) {
                senhaTexto.textContent = senha;
                btnToggleSenha.textContent = 'Ocultar';
            } else {
                senhaTexto.textContent = '••••••••';
                btnToggleSenha.textContent = 'Mostrar';
            }
        });
    }
});
