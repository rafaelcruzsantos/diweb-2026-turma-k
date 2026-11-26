<?php
// Funções auxiliares usadas nas views

// Escapa texto para exibir no HTML com segurança (evita XSS)
function e($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

// Formata número como moeda brasileira: 189.9 -> "R$ 189,90"
function preco($valor) {
    return 'R$ ' . number_format((float) $valor, 2, ',', '.');
}
