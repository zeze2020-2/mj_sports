/* =========================================================
   MJ SPORTS - LOGIN (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Alternar visualizacao da senha
    const senhaInput = document.getElementById('senha');
    if (senhaInput) {
        const container = document.createElement('div');
        container.className = 'senha-container';

        senhaInput.parentNode.insertBefore(container, senhaInput);
        container.appendChild(senhaInput);

        const btnToggle = document.createElement('button');
        btnToggle.type = 'button';
        btnToggle.className = 'btn-toggle-senha-login';
        btnToggle.textContent = 'Mostrar';
        container.appendChild(btnToggle);

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

    // 2. Feedback ao enviar o formulario
    const form = document.querySelector('form');
    const botao = document.querySelector('.botao');
    if (form && botao) {
        form.addEventListener('submit', () => {
            botao.innerHTML = 'ENTRANDO... <span>➜</span>';
            botao.style.opacity = '0.8';
        });
    }
});
