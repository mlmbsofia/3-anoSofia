
document.addEventListener('DOMContentLoaded', () => {
    const $ = id => document.getElementById(id);

    function erro(campo, mensagem) {
        if (!campo) return;

        campo.classList.toggle('invalido', Boolean(mensagem));

        const mensagemCampo = $('erro-' + campo.id);

        if (mensagemCampo) {
            mensagemCampo.textContent = mensagem;
        }

        campo.setAttribute('aria-invalid', mensagem ? 'true' : 'false');
    }

    function formatarCPF(valor) {
        return valor
            .replace(/\D/g, '')
            .slice(0, 11)
            .replace(/^(\d{3})(\d)/, '$1.$2')
            .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
            .replace(/\.(\d{3})(\d)/, '.$1-$2');
    }

    function cpfValido(valor) {
        const cpf = valor.replace(/\D/g, '');

        if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
            return false;
        }

        for (let t = 9; t < 11; t++) {
            let soma = 0;

            for (let i = 0; i < t; i++) {
                soma += Number(cpf[i]) * (t + 1 - i);
            }

            const resto = (soma * 10) % 11;
            const digito = resto === 10 ? 0 : resto;

            if (Number(cpf[t]) !== digito) return false;
        }

        return true;
    }

    const regraSenha =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/;

    function validarNome() {
        const campo = $('nome');
        if (!campo) return true;

        const valido =
            /^[\p{L}]+(?:[ '-][\p{L}]+)*$/u.test(campo.value.trim());

        erro(campo, valido ? '' : 'Informe um nome válido, sem números.');
        return valido;
    }

    function validarCPF() {
        const campo = $('cpf');
        if (!campo) return true;

        const valido = cpfValido(campo.value);

        erro(
            campo,
            valido ? '' : 'Informe um CPF válido com 11 dígitos.'
        );

        return valido;
    }

    function validarEmail() {
        const campo = $('email');
        if (!campo) return true;

        const valido =
            /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(campo.value.trim());

        erro(campo, valido ? '' : 'Informe um e-mail válido.');
        return valido;
    }

    function validarConfirmacaoEmail() {
        const campo = $('email_confirmacao') || $('confirmar_email');
        const email = $('email');

        if (!campo || !email) return true;

        const valido =
            campo.value.trim().toLowerCase() ===
            email.value.trim().toLowerCase() &&
            campo.value.trim() !== '';

        erro(campo, valido ? '' : 'Os e-mails não coincidem.');
        return valido;
    }

    function validarData() {
        const campo = $('data_nascimento');
        if (!campo) return true;

        const agora = new Date();
        const ano = agora.getFullYear();
        const mes = String(agora.getMonth() + 1).padStart(2, '0');
        const dia = String(agora.getDate()).padStart(2, '0');
        const hoje = `${ano}-${mes}-${dia}`;

        const valido =
            /^\d{4}-\d{2}-\d{2}$/.test(campo.value) &&
            campo.value <= hoje;

        erro(
            campo,
            valido ? '' : 'Informe uma data válida, sem ser futura.'
        );

        return valido;
    }

    function validarSenha() {
        const campo = $('senha') || $('nova_senha');
        if (!campo) return true;

        const valido = regraSenha.test(campo.value);

        erro(
            campo,
            valido
                ? ''
                : 'Use 8 caracteres, maiúscula, minúscula, número e símbolo.'
        );

        return valido;
    }

    function validarConfirmacaoSenha() {
        const senha = $('senha') || $('nova_senha');
        const campo = $('senha_confirmacao') || $('confirmar_senha');

        if (!senha || !campo) return true;

        const valido =
            campo.value !== '' && campo.value === senha.value;

        erro(campo, valido ? '' : 'As senhas não coincidem.');
        return valido;
    }

    const campoNome = $('nome');

    if (campoNome) {
        campoNome.addEventListener('input', validarNome);
        campoNome.addEventListener('blur', validarNome);
    }

    const campoCPF = $('cpf');

    if (campoCPF) {
        campoCPF.addEventListener('input', () => {
            campoCPF.value = formatarCPF(campoCPF.value);
            erro(campoCPF, '');
        });

        campoCPF.addEventListener('blur', validarCPF);
    }

    const campoEmail = $('email');

    if (campoEmail) {
        campoEmail.addEventListener('input', () => {
            validarEmail();
            validarConfirmacaoEmail();
        });

        campoEmail.addEventListener('blur', validarEmail);
    }

    ['email_confirmacao', 'confirmar_email'].forEach(id => {
        const campo = $(id);

        if (campo) {
            campo.addEventListener('input', validarConfirmacaoEmail);
            campo.addEventListener('blur', validarConfirmacaoEmail);
        }
    });

    const nascimento = $('data_nascimento');

    if (nascimento) {
        nascimento.addEventListener('change', validarData);
    }

    ['senha', 'nova_senha'].forEach(id => {
        const campo = $(id);

        if (campo) {
            campo.addEventListener('input', () => {
                validarSenha();
                validarConfirmacaoSenha();
            });
        }
    });

    ['senha_confirmacao', 'confirmar_senha'].forEach(id => {
        const campo = $(id);

        if (campo) {
            campo.addEventListener('input', validarConfirmacaoSenha);
        }
    });

    document.querySelectorAll('.mostrar-senha').forEach(botao => {
        botao.addEventListener('click', () => {
            const campo = $(botao.dataset.target);

            if (!campo) return;

            const mostrar = campo.type === 'password';

            campo.type = mostrar ? 'text' : 'password';
            botao.textContent = mostrar ? '🙈' : '👁';
            botao.setAttribute(
                'aria-label',
                mostrar ? 'Ocultar senha' : 'Mostrar senha'
            );
        });
    });

    const cadastro = $('formCadastro');

    if (cadastro) {
        cadastro.addEventListener('submit', evento => {
            const validacoes = [
                validarNome(),
                validarCPF(),
                validarEmail(),
                validarConfirmacaoEmail(),
                validarData(),
                validarSenha(),
                validarConfirmacaoSenha()
            ];

            if (validacoes.some(valido => !valido)) {
                evento.preventDefault();

                const primeiro = cadastro.querySelector('.invalido');

                if (primeiro) {
                    primeiro.focus();
                }
            }
        });
    }

    const recuperacao = $('formRecuperacao');

    if (recuperacao) {
        recuperacao.addEventListener('submit', evento => {
            const email1 = $('email');
            const email2 = $('confirmar_email');
            const cpf = $('cpf');

            const emailsValidos =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email1.value.trim()) &&
                email1.value.trim().toLowerCase() ===
                email2.value.trim().toLowerCase();

            if (!emailsValidos || !cpfValido(cpf.value)) {
                evento.preventDefault();

                if (!emailsValidos) {
                    alert('Confira os e-mails informados.');
                    email1.focus();
                } else {
                    alert('Confira o CPF informado.');
                    cpf.focus();
                }
            }
        });
    }
});
