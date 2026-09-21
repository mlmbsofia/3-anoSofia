<?php
session_start();

if (!isset($_SESSION['dias'])) {
    $_SESSION['dias'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['marcar_dia'])) {
        $_SESSION['dias'] = min(7, $_SESSION['dias'] + 1);
    }

    if (isset($_POST['contato_emergencia'])) {
        $_SESSION['contato_emergencia'] = trim($_POST['contato_emergencia']);
        $_SESSION['mensagem'] = "Contato de emergência salvo!";
    }
}

$pagina = $_GET['pagina'] ?? 'inicio';

$paginas = [
    'inicio' => 'Início',
    'insulina' => 'Insulina',
    'alimentacao' => 'Alimentação',
    'hipoglicemia' => 'Hipoglicemia',
    'emergencias' => 'Emergências'
];

if (!array_key_exists($pagina, $paginas)) {
    $pagina = 'inicio';
}

$conteudo = [

    'insulina' => [
        'titulo' => 'Insulina',
        'texto' => 'Informações para ajudar a organizar os cuidados com a insulina de forma segura e acompanhada pela equipe de saúde.',
        'cards' => [
            [
                '💉',
                'Antes da aplicação',
                'Confira o medicamento, a orientação prescrita e os materiais necessários. Não altere doses por conta própria.'
            ],
            [
                '📋',
                'Organize a rotina',
                'Registre horários, doses e observações para facilitar o acompanhamento nas consultas.'
            ],
            [
                '🩺',
                'Acompanhe com a equipe',
                'Em caso de dúvidas sobre dose, local de aplicação ou ajustes, procure a equipe de saúde.'
            ]
        ]
    ],

    'alimentacao' => [
        'titulo' => 'Alimentação',
        'texto' => 'Uma rotina organizada pode ajudar a família a acompanhar alimentação, glicemia e orientações individualizadas.',
        'cards' => [
            [
                '🥗',
                'Planeje as refeições',
                'Mantenha horários e combinações de alimentos de acordo com o plano definido pela equipe de saúde.'
            ],
            [
                '📝',
                'Registre o que observar',
                'Anote alimentação, glicemias e situações diferentes para conversar com os profissionais.'
            ],
            [
                '👨‍👩‍👧',
                'Envolva a família',
                'Compartilhe orientações importantes com familiares, escola e outras pessoas que cuidam da criança.'
            ]
        ]
    ],

    'hipoglicemia' => [
        'titulo' => 'Hipoglicemia',
        'texto' => 'Reconhecer sinais e saber onde encontrar orientações confiáveis pode ajudar a família a agir com mais segurança.',
        'cards' => [
            [
                '⚠️',
                'Fique atento aos sinais',
                'Tremor, suor, fome, tontura, irritabilidade ou confusão podem aparecer. Siga sempre o plano recebido.'
            ],
            [
                '🍬',
                'Siga o plano orientado',
                'Tenha por perto o tratamento indicado pela equipe de saúde para episódios de hipoglicemia.'
            ],
            [
                '📞',
                'Quando houver dúvida',
                'Se a situação for grave ou houver perda de consciência, procure atendimento de emergência imediatamente.'
            ]
        ]
    ],

    'emergencias' => [
        'titulo' => 'Emergências',
        'texto' => 'Em uma emergência médica, procure ajuda imediatamente. O site é apenas um apoio educativo.',
        'cards' => [
            [
                '📞',
                'SAMU — 192',
                'Em uma emergência médica no Brasil, ligue 192.'
            ],
            [
                '🚨',
                'Perda de consciência',
                'Não ofereça alimentos ou líquidos a uma pessoa inconsciente. Procure atendimento de emergência.'
            ],
            [
                '🏥',
                'Tenha informações à mão',
                'Mantenha contatos, medicamentos e orientações da equipe de saúde acessíveis.'
            ]
        ]
    ]
];

$dias_restantes = max(0, 7 - $_SESSION['dias']);

$contato = $_SESSION['contato_emergencia'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Cuidar & Viver</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header class="topbar">

    <a class="brand" href="index.php">

        <span class="brand-icon">♡</span>

        <span>Cuidar &amp; Viver</span>

    </a>


    <nav class="nav">

        <?php foreach ($paginas as $slug => $nome): ?>

            <a
                class="<?= $pagina === $slug ? 'active' : '' ?>"
                href="?pagina=<?= $slug ?>"
            >

                <?= $nome ?>

            </a>

        <?php endforeach; ?>

    </nav>


    <div class="header-actions">

        <label class="search">

            <span>⌕</span>

            <input
                id="siteSearch"
                type="search"
                placeholder="Pesquisar no site"
            >

        </label>


        <button
            class="circle-btn"
            type="button"
            onclick="alert('Área do responsável')"
        >
            ♙
        </button>


        <button
            class="circle-btn"
            type="button"
            onclick="alert('Configurações')"
        >
            ⚙
        </button>

    </div>

</header>


<main>

    <?php if ($pagina === 'inicio'): ?>

        <section class="hero">

            <div class="badge">

                ♡ &nbsp; Cuidado com informação e carinho

            </div>


            <h1>

                Cuidar &amp; Viver

            </h1>


            <p>

                Informação confiável para ajudar famílias no cuidado de crianças com
                <br>
                Diabetes Tipo 1.

            </p>


            <a
                class="emergency-btn"
                href="tel:192"
            >

                ☎ &nbsp; EMERGÊNCIA — LIGAR SAMU 192

            </a>


            <button
                class="emergency-link"
                onclick="document.getElementById('contactModal').showModal()"
            >

                Adicionar contato de emergência

            </button>

        </section>


        <section class="content">

            <div class="section-heading">

                <h2>

                    Para quem cuida

                </h2>


                <p>

                    Cuidar de uma criança com Diabetes Tipo 1 é uma rotina de atenção constante.
                    <br>

                    Estas dicas ajudam o responsável a manter o cuidado organizado —
                    e a cuidar de si também.

                </p>

            </div>


            <div class="cards searchable">


                <article class="card">

                    <div class="card-icon">

                        ▣

                    </div>

                    <h3>

                        Rotina previsível

                    </h3>

                    <p>

                        Horários parecidos para medir a glicemia,
                        aplicar insulina e comer deixam o dia mais seguro
                        e reduzem sustos.

                    </p>

                </article>


                <article class="card">

                    <div class="card-icon">

                        ☷

                    </div>

                    <h3>

                        Registre o que observar

                    </h3>

                    <p>

                        Anote glicemias, doses e como a criança se sentiu.
                        Esse histórico ajuda muito nas consultas com a equipe de saúde.

                    </p>

                </article>


                <article class="card">

                    <div class="card-icon">

                        ♧

                    </div>

                    <h3>

                        Divida o cuidado

                    </h3>

                    <p>

                        Ensine escola, familiares e babás a reconhecer
                        a hipoglicemia. Cuidar em rede diminui o cansaço
                        de quem cuida.

                    </p>

                </article>

            </div>


            <section class="reward">

                <div class="reward-title">

                    <div class="card-icon">

                        ♧

                    </div>


                    <div>

                        <h3>

                            Recompensa diária

                        </h3>

                        <p>

                            Entre todos os dias seguidos e ganhe uma lampadinha por dia.

                        </p>

                    </div>

                </div>


                <div class="days">

                    <?php for ($i = 1; $i <= 7; $i++): ?>

                        <span
                            class="day <?= $i <= $_SESSION['dias'] ? 'completed' : '' ?>"
                        >

                    ♧

                </span>

                    <?php endfor; ?>

                </div>


                <form method="post">

                    <button
                        class="daily-btn"
                        name="marcar_dia"
                        type="submit"
                    >

                        Marcar meu dia

                    </button>

                </form>


                <strong>

                    <?php

                    if ($_SESSION['dias'] >= 7) {

                        echo "Parabéns! Você completou os 7 dias. 🎉";

                    } else {

                        echo "Você já entrou hoje. Faltam "
                            . $dias_restantes
                            . " dia(s) para o prêmio.";

                    }

                    ?>

                </strong>

            </section>

        </section>


    <?php else: ?>


        <section class="page-content">

            <div class="page-badge">

                Cuidar &amp; Viver

            </div>


            <h1>

                <?= $conteudo[$pagina]['titulo'] ?>

            </h1>


            <p class="page-intro">

                <?= $conteudo[$pagina]['texto'] ?>

            </p>


            <div class="cards searchable">

                <?php foreach ($conteudo[$pagina]['cards'] as $card): ?>

                    <article class="card">

                        <div class="card-icon">

                            <?= $card[0] ?>

                        </div>


                        <h3>

                            <?= $card[1] ?>

                        </h3>


                        <p>

                            <?= $card[2] ?>

                        </p>

                    </article>

                <?php endforeach; ?>

            </div>


            <?php if ($pagina === 'emergencias'): ?>

                <div class="emergency-panel">

                    <div>

                <span class="panel-icon">

                    ☎

                </span>


                        <div>

                            <h2>

                                Precisa de ajuda agora?

                            </h2>

                            <p>

                                Em uma emergência médica, ligue para o SAMU.

                            </p>

                        </div>

                    </div>


                    <a
                        href="tel:192"
                        class="small-emergency"
                    >

                        Ligar 192

                    </a>

                </div>

            <?php endif; ?>

        </section>


    <?php endif; ?>

</main>


<dialog id="contactModal">

    <form method="post" class="modal">

        <button
            type="button"
            class="close"
            onclick="document.getElementById('contactModal').close()"
        >

            ×

        </button>


        <h2>

            Contato de emergência

        </h2>


        <p>

            Salve um contato para deixar a informação disponível nesta sessão.

        </p>


        <label>

            Nome ou telefone

        </label>


        <input
            type="text"
            name="contato_emergencia"
            value="<?= htmlspecialchars($contato) ?>"
            placeholder="Ex.: Mãe — (31) 99999-9999"
            required
        >


        <button
            class="save-btn"
            type="submit"
        >

            Salvar contato

        </button>


        <?php if (isset($_SESSION['mensagem'])): ?>

            <small class="success">

                <?= $_SESSION['mensagem'] ?>

            </small>

            <?php unset($_SESSION['mensagem']); ?>

        <?php endif; ?>

    </form>

</dialog>


<footer>

    <p>

        Cuidar &amp; Viver · Informação educativa para famílias ·
        Não substitui orientação profissional.

    </p>

</footer>


<script src="script.js"></script>

</body>

</html>