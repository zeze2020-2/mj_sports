/* =========================================================
   MJ SPORTS - INSCRICAO NO EVENTO (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Inserir Cabecalho MJ SPORTS caso nao exista
    if (!document.querySelector('header')) {
        const header = document.createElement('header');
        header.innerHTML = '<a href="home.php" class="logo">MJ<span>SPORTS</span></a>';
        document.body.insertBefore(header, document.body.firstChild);
    }

    const form = document.querySelector('form');
    if (form) {
        // 2. Inserir Bloco de Titulo no Formulario se nao existir
        if (!form.querySelector('.form-titulo')) {
            const tituloDiv = document.createElement('div');
            tituloDiv.className = 'form-titulo';
            tituloDiv.innerHTML = `
                <span class="subtitulo">CONFIRMACAO DE VAGA</span>
                <h1>INSCRICAO NO <span>EVENTO</span></h1>
                <p class="descricao">Confirme seus dados para garantir seu lugar nesta competicao oficial.</p>
            `;
            form.insertBefore(tituloDiv, form.firstChild);
        }

        // 3. Mascara e formatacao para o campo CPF
        const cpfInput = form.querySelector('#cpf');
        if (cpfInput) {
            cpfInput.addEventListener('input', function() {
                this.value = this.value
                    .replace(/\D/g, '')
                    .replace(/(\d{3})(\d)/, '$1.$2')
                    .replace(/(\d{3})(\d)/, '$1.$2')
                    .replace(/(\d{3})(\d{1,2})$/, '$1-$2')
                    .substring(0, 14);
            });
        }

        // 4. Inserir Link de Retorno para home.php se nao existir
        if (!form.querySelector('.voltar')) {
            const voltarLink = document.createElement('a');
            voltarLink.href = 'home.php';
            voltarLink.className = 'voltar';
            voltarLink.textContent = '← Voltar para as competicoes';
            form.appendChild(voltarLink);
        }

        // 5. Efeito visual no botao de envio ao submeter
        const btnEnviar = form.querySelector('button[type="submit"]');
        if (btnEnviar) {
            form.addEventListener('submit', () => {
                btnEnviar.textContent = 'Processando inscricao...';
                btnEnviar.style.opacity = '0.7';
            });
        }
    }

    // 6. Inserir Rodape padrao MJ SPORTS caso nao exista
    if (!document.querySelector('footer')) {
        const footer = document.createElement('footer');
        footer.innerHTML = '<p>&copy; 2026 MJ SPORTS | TODOS OS DIREITOS RESERVADOS</p>';
        document.body.appendChild(footer);
    }
});
