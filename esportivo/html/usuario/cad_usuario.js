/* =========================================================
   MJ SPORTS - CADASTRO DE USUARIO (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Inserir Cabecalho MJ SPORTS caso nao exista
    if (!document.querySelector('header')) {
        const header = document.createElement('header');
        header.innerHTML = '<a href="../index.php" class="logo">MJ<span>SPORTS</span></a>';
        document.body.insertBefore(header, document.body.firstChild);
    }

    // 2. Estilizar mensagens de feedback emitidas pelo PHP
    const bodyNodes = Array.from(document.body.childNodes);
    bodyNodes.forEach(node => {
        if (node.nodeType === Node.TEXT_NODE && node.textContent.trim()) {
            const texto = node.textContent.trim();
            const div = document.createElement('div');
            div.className = 'mensagem-feedback';
            if (texto.toLowerCase().includes('sucesso')) {
                div.classList.add('mensagem-sucesso');
            } else if (texto.toLowerCase().includes('erro')) {
                div.classList.add('mensagem-erro');
            }
            div.textContent = texto;
            node.parentNode.replaceChild(div, node);
        }
    });

    const form = document.querySelector('form');
    if (form) {
        // 3. Inserir Bloco de Titulo no Formulario
        if (!form.querySelector('.form-titulo')) {
            const tituloDiv = document.createElement('div');
            tituloDiv.className = 'form-titulo';
            tituloDiv.innerHTML = `
                <span class="subtitulo">SEU ESPORTE, SUA HISTORIA</span>
                <h1>CRIAR NOVA <span>CONTA</span></h1>
                <p class="descricao">Cadastre-se na MJ Sports para participar de corridas, maratonas e competicoes oficiais.</p>
            `;
            form.insertBefore(tituloDiv, form.firstChild);
        }

        // 4. Garantir atributos adequados nos inputs
        const emailInput = form.querySelector('input[name="usuario_email"]');
        if (emailInput) {
            emailInput.type = 'email';
            emailInput.placeholder = 'Digite seu e-mail';
        }

        const nomeInput = form.querySelector('input[name="usuario_nome"]');
        if (nomeInput) {
            nomeInput.placeholder = 'Digite seu nome completo';
        }

        const cpfInput = form.querySelector('input[name="usuario_cpf"]');
        if (cpfInput) {
            cpfInput.placeholder = 'Digite seu CPF';
        }

        // Corrigir name do select de genero caso nao tenha
        const selectGenero = form.querySelector('select');
        if (selectGenero && !selectGenero.name) {
            selectGenero.name = 'usuario_sexo';
        }

        // 5. Configurar Campo de Senha com botao Mostrar/Ocultar
        const senhaInput = form.querySelector('input[name="usuario_senha"]');
        if (senhaInput) {
            senhaInput.type = 'password';
            senhaInput.placeholder = 'Crie uma senha segura';

            const containerSenha = document.createElement('div');
            containerSenha.className = 'senha-container';

            senhaInput.parentNode.insertBefore(containerSenha, senhaInput);
            containerSenha.appendChild(senhaInput);

            const btnToggle = document.createElement('button');
            btnToggle.type = 'button';
            btnToggle.className = 'btn-toggle-senha-input';
            btnToggle.textContent = 'Mostrar';
            containerSenha.appendChild(btnToggle);

            btnToggle.addEventListener('click', () => {
                if (senhaInput.type === 'password') {
                    senhaInput.type = 'text';
                    btnToggle.textContent = 'Ocultar';
                } else {
                    senhaInput.type = 'password';
                    btnToggle.textContent = 'Mostrar';
                }
            });
        }

        // 6. Inserir Link de Retorno para o Login
        if (!form.querySelector('.voltar')) {
            const voltarLink = document.createElement('a');
            voltarLink.href = '../login.php';
            voltarLink.className = 'voltar';
            voltarLink.textContent = '← Ja possui uma conta? Fazer login';
            form.appendChild(voltarLink);
        }

        // 7. Feedback de Submissao
        const btnEnviar = form.querySelector('button[type="submit"]');
        if (btnEnviar) {
            form.addEventListener('submit', () => {
                btnEnviar.textContent = 'Cadastrando...';
                btnEnviar.style.opacity = '0.7';
            });
        }
    }

    // 8. Inserir Rodape padrao MJ SPORTS
    if (!document.querySelector('footer')) {
        const footer = document.createElement('footer');
        footer.innerHTML = '<p>&copy; 2026 MJ SPORTS | TODOS OS DIREITOS RESERVADOS</p>';
        document.body.appendChild(footer);
    }
});
