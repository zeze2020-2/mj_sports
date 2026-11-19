/* =========================================================
   MJ SPORTS - CADASTRO DE EVENTO (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Inserir Cabecalho MJ SPORTS caso nao exista
    if (!document.querySelector('header')) {
        const header = document.createElement('header');
        header.innerHTML = '<a href="../home.php" class="logo">MJ<span>SPORTS</span></a>';
        document.body.insertBefore(header, document.body.firstChild);
    }

    // 2. Estilizar mensagens emitidas pelo PHP
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
                <span class="subtitulo">PAINEL DO ORGANIZADOR</span>
                <h1>CADASTRAR NOVO <span>EVENTO</span></h1>
                <p class="descricao">Adicione uma nova competicao oficial a plataforma esportiva MJ Sports.</p>
            `;
            form.insertBefore(tituloDiv, form.firstChild);
        }

        // 4. Pre-visualizacao ao vivo do Poster do Evento
        const fileInput = form.querySelector('input[type="file"][name="capa"]');
        if (fileInput) {
            const previewDiv = document.createElement('div');
            previewDiv.className = 'preview-container';
            const imgPreview = document.createElement('img');
            imgPreview.className = 'preview-imagem';
            previewDiv.appendChild(imgPreview);

            fileInput.parentNode.appendChild(previewDiv);

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imgPreview.src = e.target.result;
                        previewDiv.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewDiv.style.display = 'none';
                }
            });
        }

        // 5. Mascara simples para valor da inscricao
        const valorInput = form.querySelector('input[name="evento_valor"]');
        if (valorInput) {
            valorInput.setAttribute('placeholder', 'Ex: 120.00');
            valorInput.addEventListener('blur', function() {
                let v = this.value.replace(',', '.').replace(/[^\d.]/g, '');
                if (v && !isNaN(v)) {
                    this.value = parseFloat(v).toFixed(2);
                }
            });
        }

        // 6. Inserir Link de Retorno
        if (!form.querySelector('.voltar')) {
            const voltarLink = document.createElement('a');
            voltarLink.href = '../home.php';
            voltarLink.className = 'voltar';
            voltarLink.textContent = '← Voltar para a pagina inicial';
            form.appendChild(voltarLink);
        }

        // 7. Feedback de Envio
        const btnEnviar = form.querySelector('button[type="submit"]');
        if (btnEnviar) {
            form.addEventListener('submit', () => {
                btnEnviar.textContent = 'Enviando dados do evento...';
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
