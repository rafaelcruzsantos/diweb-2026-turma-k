<?php
function aplicarBonificao(float $nota, float $bonus): void {
    $nota += $bonus;
    if ($nota > 10.0) {
        $nota = 10.0;
    }
}
$notaAluno = 8.5;

aplicarBonificao($notaAluno, 1.0);

echo "Nota atualizada do aluno: {$notaAluno}";

$notas = [7.5, 7.0, 8.5, 5.0, 9.0, 6.0];

$aprovados = $array_filter($notas, function (float $nota): bool {
    return $nota >= 6.0;
});

echo "<pre>";
print_r ($aprovados);
echo "</pre>";