
<?php

function e(string $valor): string
{
    return htmlspecialchars(
        $valor,
        ENT_QUOTES,
        'UTF-8'
    );
}

function validarNome(string $nome): bool
{
    return preg_match(
            "/^[\p{L}]+(?:[ '-][\p{L}]+)*$/u",
            trim($nome)
        ) === 1;
}

function validarCpf(string $cpf): bool
{
    $cpf = preg_replace('/\D/', '', $cpf);

    if (
        strlen($cpf) !== 11 ||
        preg_match('/^(\d)\1{10}$/', $cpf)
    ) {
        return false;
    }

    for ($t = 9; $t <= 10; $t++) {
        $soma = 0;

        for ($i = 0; $i < $t; $i++) {
            $soma += (int) $cpf[$i] * ($t + 1 - $i);
        }

        $resto = ($soma * 10) % 11;
        $digito = $resto === 10 ? 0 : $resto;

        if ((int) $cpf[$t] !== $digito) {
            return false;
        }
    }

    return true;
}

function validarSenha(string $senha): bool
{
    return preg_match(
            '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/',
            $senha
        ) === 1;
}
