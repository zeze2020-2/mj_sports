/* =========================================================
   MJ SPORTS - INDEX INTERATIVIDADE (JAVASCRIPT)
   SEM EMOJIS - DESIGN SYSTEM MJ SPORTS
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Efeito interativo no destaque numerico
    const numero = document.querySelector('.numero');
    if (numero) {
        let count = 0;
        const target = 1;
        const updateNumber = () => {
            numero.textContent = count < 10 ? '0' + count : count;
            if (count < target) {
                count++;
                setTimeout(updateNumber, 200);
            }
        };
        updateNumber();
    }

    // 2. Efeito suave de elevacao nos botoes principais
    const botoes = document.querySelectorAll('.botao');
    botoes.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transition = 'all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1)';
        });
    });
});
