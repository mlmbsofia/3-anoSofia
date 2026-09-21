<?php
session_start();

/* =========================================================
   CONFIGURAÇÃO
========================================================= */

$pagina = $_GET['pagina'] ?? 'inicio';

if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = null;
}

/* =========================================================
   BANCO DE QUESTÕES
   Aqui você pode adicionar centenas de questões depois.
========================================================= */

$questoes = [

    [
        'id' => 1,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Em um texto argumentativo, a principal função da tese é:',
        'alternativas' => [
            'Apresentar uma opinião ou posicionamento que será defendido.',
            'Descrever detalhadamente o cenário apresentado.',
            'Apresentar apenas informações históricas.',
            'Encerrar obrigatoriamente o texto.',
            'Substituir todos os argumentos.'
        ],
        'correta' => 0,
        'explicacao' => 'A tese apresenta o posicionamento central que será desenvolvido e defendido ao longo do texto.'
    ],

    [
        'id' => 2,
        'area' => 'Matemática',
        'materia' => 'Matemática',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma loja oferece 20% de desconto em um produto que custa R$ 200,00. Qual será o preço final?',
        'alternativas' => [
            'R$ 140,00',
            'R$ 150,00',
            'R$ 160,00',
            'R$ 170,00',
            'R$ 180,00'
        ],
        'correta' => 2,
        'explicacao' => '20% de R$ 200,00 corresponde a R$ 40,00. Portanto, R$ 200,00 - R$ 40,00 = R$ 160,00.'
    ],

    [
        'id' => 3,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'A Revolução Industrial provocou importantes transformações sociais e econômicas. Entre elas está:',
        'alternativas' => [
            'O crescimento das cidades e da população urbana.',
            'O desaparecimento das fábricas.',
            'A redução do trabalho assalariado.',
            'O fim das máquinas.',
            'A diminuição da produção.'
        ],
        'correta' => 0,
        'explicacao' => 'A industrialização provocou forte urbanização e crescimento do trabalho assalariado.'
    ],

    [
        'id' => 4,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Qual organela celular está diretamente relacionada à produção de energia na célula?',
        'alternativas' => [
            'Ribossomo',
            'Mitocôndria',
            'Núcleo',
            'Lisossomo',
            'Complexo golgiense'
        ],
        'correta' => 1,
        'explicacao' => 'As mitocôndrias participam da respiração celular e da produção de ATP.'
    ],

    [
        'id' => 5,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'O pH é uma escala utilizada para indicar:',
        'alternativas' => [
            'A massa de uma substância.',
            'A temperatura de uma solução.',
            'A acidez ou basicidade de uma solução.',
            'A quantidade de elétrons.',
            'A velocidade de uma reação.'
        ],
        'correta' => 2,
        'explicacao' => 'O pH indica o grau de acidez ou basicidade de uma solução.'
    ],

    [
        'id' => 6,
        'area' => 'Linguagens',
        'materia' => 'Literatura',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Uma das características frequentemente associadas ao Modernismo brasileiro é:',
        'alternativas' => [
            'A valorização exclusiva dos modelos clássicos.',
            'A ruptura com padrões tradicionais.',
            'A rejeição da linguagem cotidiana.',
            'A ausência de crítica social.',
            'A utilização obrigatória de linguagem formal.'
        ],
        'correta' => 1,
        'explicacao' => 'O Modernismo buscou romper com padrões estéticos tradicionais e valorizar novas formas de expressão.'
    ],

    [
        'id' => 7,
        'area' => 'Matemática',
        'materia' => 'Geometria',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Qual é a área de um quadrado cujo lado mede 5 cm?',
        'alternativas' => [
            '10 cm²',
            '15 cm²',
            '20 cm²',
            '25 cm²',
            '30 cm²'
        ],
        'correta' => 3,
        'explicacao' => 'A área do quadrado é lado × lado. Portanto: 5 × 5 = 25 cm².'
    ],

    [
        'id' => 8,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'O processo de urbanização está relacionado principalmente:',
        'alternativas' => [
            'Ao crescimento das áreas rurais.',
            'Ao aumento da população vivendo em áreas urbanas.',
            'À redução das cidades.',
            'À diminuição da industrialização.',
            'Ao desaparecimento das atividades comerciais.'
        ],
        'correta' => 1,
        'explicacao' => 'Urbanização é o processo de crescimento da população e das atividades nas áreas urbanas.'
    ]

];

/* =========================================================
   FUNÇÕES
========================================================= */

function e($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function usuarioLogado()
{
    return isset($_SESSION['usuario']) && $_SESSION['usuario'] !== null;
}

/* =========================================================
   LOGIN
========================================================= */

if (isset($_POST['acao']) && $_POST['acao'] === 'login') {

    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($email !== '' && $senha !== '') {

        $_SESSION['usuario'] = [
            'nome' => 'Estudante',
            'email' => $email
        ];

        header('Location: index.php?pagina=inicio');
        exit;
    }
}

/* =========================================================
   CADASTRO
========================================================= */

if (isset($_POST['acao']) && $_POST['acao'] === 'cadastro') {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nome !== '' && $email !== '') {

        $_SESSION['usuario'] = [
            'nome' => $nome,
            'email' => $email
        ];

        header('Location: index.php?pagina=inicio');
        exit;
    }
}

/* =========================================================
   LOGOUT
========================================================= */

if ($pagina === 'logout') {

    session_destroy();

    header('Location: index.php');
    exit;
}

/* =========================================================
   FILTROS
========================================================= */

$busca = $_GET['busca'] ?? '';
$filtroArea = $_GET['area'] ?? '';

$questoesFiltradas = $questoes;

if ($busca !== '') {

    $questoesFiltradas = array_filter(
        $questoesFiltradas,
        function ($q) use ($busca) {

            return
                stripos($q['pergunta'], $busca) !== false ||
                stripos($q['materia'], $busca) !== false ||
                stripos($q['area'], $busca) !== false;
        }
    );
}

if ($filtroArea !== '') {

    $questoesFiltradas = array_filter(
        $questoesFiltradas,
        function ($q) use ($filtroArea) {
            return $q['area'] === $filtroArea;
        }
    );
}

/* =========================================================
   QUESTÃO INDIVIDUAL
========================================================= */

$questaoAtual = null;

if ($pagina === 'resolver') {

    $id = intval($_GET['id'] ?? 1);

    foreach ($questoes as $q) {

        if ($q['id'] == $id) {
            $questaoAtual = $q;
            break;
        }
    }
}

/* =========================================================
   RESPONDER QUESTÃO
========================================================= */

$resultado = null;

if (isset($_POST['acao']) && $_POST['acao'] === 'responder') {

    $id = intval($_POST['id']);
    $resposta = intval($_POST['resposta']);

    foreach ($questoes as $q) {

        if ($q['id'] == $id) {

            $resultado = [
                'questao' => $q,
                'resposta' => $resposta,
                'correta' => $resposta === $q['correta']
            ];

            break;
        }
    }
}

/* =========================================================
   SIMULADO
========================================================= */

if (isset($_POST['acao']) && $_POST['acao'] === 'iniciar_simulado') {

    $quantidade = intval($_POST['quantidade'] ?? 5);
    $area = $_POST['area'] ?? '';

    $simulado = $questoes;

    if ($area !== '') {

        $simulado = array_filter(
            $simulado,
            function ($q) use ($area) {
                return $q['area'] === $area;
            }
        );
    }

    shuffle($simulado);

    $simulado = array_slice($simulado, 0, $quantidade);

    $_SESSION['simulado'] = $simulado;
    $_SESSION['simulado_respostas'] = [];

    header('Location: index.php?pagina=simulado');
    exit;
}

/* =========================================================
   RESPOSTA DO SIMULADO
========================================================= */

if (isset($_POST['acao']) && $_POST['acao'] === 'responder_simulado') {

    $id = intval($_POST['id']);
    $resposta = intval($_POST['resposta']);

    $_SESSION['simulado_respostas'][$id] = $resposta;

    $indiceAtual = intval($_POST['indice']);

    $total = count($_SESSION['simulado'] ?? []);

    if ($indiceAtual + 1 < $total) {

        $proximo = $indiceAtual + 1;

        header(
            'Location: index.php?pagina=simulado&indice=' . $proximo
        );

        exit;

    } else {

        header('Location: index.php?pagina=resultado');
        exit;
    }
}

/* =========================================================
   RESULTADO
========================================================= */

$acertos = 0;
$totalSimulado = 0;

if ($pagina === 'resultado') {

    $simulado = $_SESSION['simulado'] ?? [];
    $respostas = $_SESSION['simulado_respostas'] ?? [];

    $totalSimulado = count($simulado);

    foreach ($simulado as $q) {

        if (
            isset($respostas[$q['id']]) &&
            $respostas[$q['id']] == $q['correta']
        ) {
            $acertos++;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Estudaí - Simulados ENEM</title>

    <link rel="stylesheet" href="style.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

</head>

<body>

<!-- ======================================================
     HEADER
======================================================= -->

<header class="header">

    <div class="logo">

        <div class="logo-icon">
            ✓
        </div>

        <div>
            <strong>estudaí</strong>
            <span>preparação que transforma</span>
        </div>

    </div>

    <nav>

        <a
            href="index.php?pagina=inicio"
            class="<?= $pagina === 'inicio' ? 'ativo' : '' ?>"
        >
            Início
        </a>

        <a
            href="index.php?pagina=questoes"
            class="<?= $pagina === 'questoes' ? 'ativo' : '' ?>"
        >
            Questões
        </a>

        <a
            href="index.php?pagina=simulados"
            class="<?= $pagina === 'simulados' ? 'ativo' : '' ?>"
        >
            Simulados
        </a>

        <a
            href="index.php?pagina=desempenho"
            class="<?= $pagina === 'desempenho' ? 'ativo' : '' ?>"
        >
            Meu desempenho
        </a>

    </nav>

    <div class="header-direita">

        <?php if (usuarioLogado()): ?>

            <a
                class="usuario"
                href="index.php?pagina=perfil"
            >
                <span class="avatar">
                    <?= strtoupper(substr($_SESSION['usuario']['nome'], 0, 1)) ?>
                </span>

                <?= e($_SESSION['usuario']['nome']) ?>
            </a>

        <?php else: ?>

            <a
                class="btn-login"
                href="index.php?pagina=login"
            >
                Entrar
            </a>

            <a
                class="btn-cadastro"
                href="index.php?pagina=cadastro"
            >
                Criar conta
            </a>

        <?php endif; ?>

    </div>

</header>


<!-- ======================================================
     CONTEÚDO
======================================================= -->

<main>


    <?php if ($pagina === 'inicio'): ?>

        <!-- HERO -->

        <section class="hero">

            <div class="hero-texto">

        <span class="tag">
            PREPARE-SE PARA O SEU FUTURO
        </span>

                <h1>
                    Seu futuro começa
                    <span>com uma questão.</span>
                </h1>

                <p>
                    Estude para o ENEM e vestibulares com questões,
                    simulados e acompanhamento do seu desempenho.
                </p>

                <div class="hero-botoes">

                    <a
                        class="btn-principal"
                        href="index.php?pagina=questoes"
                    >
                        Começar a estudar →
                    </a>

                    <a
                        class="btn-secundario"
                        href="index.php?pagina=simulados"
                    >
                        Fazer um simulado
                    </a>

                </div>

            </div>


            <div class="hero-card">

                <div class="hero-card-top">

                    <span>SEU DESEMPENHO</span>

                    <span class="bolinha"></span>

                </div>

                <div class="numero">
                    87%
                </div>

                <div class="linha-progresso">

                    <div></div>

                </div>

                <small>
                    +12% esta semana
                </small>

                <div class="mini-estatisticas">

                    <div>
                        <strong>124</strong>
                        <span>questões</span>
                    </div>

                    <div>
                        <strong>18</strong>
                        <span>simulados</span>
                    </div>

                    <div>
                        <strong>9h</strong>
                        <span>estudadas</span>
                    </div>

                </div>

            </div>

        </section>


        <!-- BENEFÍCIOS -->

        <section class="beneficios">

            <div class="titulo-secao">

                <span>POR QUE ESTUDAR AQUI?</span>

                <h2>
                    Tudo que você precisa
                    <strong>em um só lugar.</strong>
                </h2>

            </div>

            <div class="beneficios-grid">

                <div class="beneficio">

                    <div class="icone verde">✓</div>

                    <h3>Questões atualizadas</h3>

                    <p>
                        Pratique com questões de diferentes
                        provas e disciplinas.
                    </p>

                </div>


                <div class="beneficio">

                    <div class="icone rosa">★</div>

                    <h3>Simulados completos</h3>

                    <p>
                        Teste seus conhecimentos em simulados
                        preparados para você.
                    </p>

                </div>


                <div class="beneficio">

                    <div class="icone roxo">↗</div>

                    <h3>Acompanhe sua evolução</h3>

                    <p>
                        Veja seus resultados e descubra onde
                        precisa melhorar.
                    </p>

                </div>

            </div>

        </section>


        <!-- ÁREAS -->

        <section class="areas">

            <div class="titulo-secao">

                <span>ESCOLHA SUA ÁREA</span>

                <h2>
                    Por onde você
                    <strong>quer começar?</strong>
                </h2>

            </div>


            <div class="areas-grid">

                <a
                    href="index.php?pagina=questoes&area=Linguagens"
                    class="area-card verde-card"
                >

                    <div class="area-icon">Aa</div>

                    <div>
                        <h3>Linguagens</h3>
                        <p>Português, Literatura e mais</p>
                    </div>

                    <span>→</span>

                </a>


                <a
                    href="index.php?pagina=questoes&area=Matemática"
                    class="area-card rosa-card"
                >

                    <div class="area-icon">∑</div>

                    <div>
                        <h3>Matemática</h3>
                        <p>Matemática e suas aplicações</p>
                    </div>

                    <span>→</span>

                </a>


                <a
                    href="index.php?pagina=questoes&area=Ciências da Natureza"
                    class="area-card roxo-card"
                >

                    <div class="area-icon">⚗</div>

                    <div>
                        <h3>Ciências da Natureza</h3>
                        <p>Biologia, Química e Física</p>
                    </div>

                    <span>→</span>

                </a>


                <a
                    href="index.php?pagina=questoes&area=Ciências Humanas"
                    class="area-card amarelo-card"
                >

                    <div class="area-icon">◎</div>

                    <div>
                        <h3>Ciências Humanas</h3>
                        <p>História, Geografia e mais</p>
                    </div>

                    <span>→</span>

                </a>

            </div>

        </section>


        <!-- CTA -->

        <section class="cta">

            <div>

                <span>COMECE AGORA</span>

                <h2>
                    Cada questão te deixa
                    mais perto do seu objetivo.
                </h2>

                <p>
                    Não espere o momento perfeito.
                    Comece com uma questão.
                </p>

                <a
                    href="index.php?pagina=questoes"
                    class="btn-branco"
                >
                    Resolver questões →
                </a>

            </div>

        </section>


    <?php elseif ($pagina === 'questoes'): ?>


        <!-- ======================================================
             QUESTÕES
        ======================================================= -->

        <section class="pagina">

            <div class="pagina-cabecalho">

                <div>

                    <span class="tag">BANCO DE QUESTÕES</span>

                    <h1>
                        Encontre sua próxima questão.
                    </h1>

                    <p>
                        Escolha uma área, filtre por matéria ou pesquise.
                    </p>

                </div>

            </div>


            <form
                class="filtros"
                method="GET"
            >

                <input
                    type="hidden"
                    name="pagina"
                    value="questoes"
                >

                <input
                    type="text"
                    name="busca"
                    placeholder="🔎  Buscar questão..."
                    value="<?= e($busca) ?>"
                >

                <select name="area">

                    <option value="">
                        Todas as áreas
                    </option>

                    <option
                        value="Linguagens"
                        <?= $filtroArea === 'Linguagens' ? 'selected' : '' ?>
                    >
                        Linguagens
                    </option>

                    <option
                        value="Matemática"
                        <?= $filtroArea === 'Matemática' ? 'selected' : '' ?>
                    >
                        Matemática
                    </option>

                    <option
                        value="Ciências da Natureza"
                        <?= $filtroArea === 'Ciências da Natureza' ? 'selected' : '' ?>
                    >
                        Ciências da Natureza
                    </option>

                    <option
                        value="Ciências Humanas"
                        <?= $filtroArea === 'Ciências Humanas' ? 'selected' : '' ?>
                    >
                        Ciências Humanas
                    </option>

                </select>

                <button class="btn-principal">
                    Filtrar
                </button>

            </form>


            <div class="questoes-lista">

                <?php foreach ($questoesFiltradas as $q): ?>

                    <article class="questao-card">

                        <div class="questao-top">

                    <span class="badge">
                        <?= e($q['area']) ?>
                    </span>

                            <span>
                        <?= e($q['materia']) ?>
                        •
                        <?= $q['ano'] ?>
                    </span>

                        </div>

                        <h2>
                            <?= e($q['pergunta']) ?>
                        </h2>

                        <a
                            class="btn-responder"
                            href="index.php?pagina=resolver&id=<?= $q['id'] ?>"
                        >
                            Resolver questão →
                        </a>

                    </article>

                <?php endforeach; ?>

                <?php if (count($questoesFiltradas) === 0): ?>

                    <div class="vazio">

                        <h2>
                            Nenhuma questão encontrada.
                        </h2>

                        <p>
                            Tente mudar os filtros.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </section>


    <?php elseif ($pagina === 'resolver' && $questaoAtual): ?>


        <!-- ======================================================
             RESOLVER QUESTÃO
        ======================================================= -->

        <section class="questao-page">

            <div class="questao-navegacao">

                <a href="index.php?pagina=questoes">
                    ← Voltar para questões
                </a>

                <span>
            <?= e($questaoAtual['area']) ?>
            •
            <?= e($questaoAtual['materia']) ?>
        </span>

            </div>


            <div class="questao-grande">

                <div class="questao-header">

            <span class="badge">
                <?= e($questaoAtual['prova']) ?>
            </span>

                    <span>
                <?= $questaoAtual['ano'] ?>
            </span>

                </div>


                <h1>
                    <?= e($questaoAtual['pergunta']) ?>
                </h1>


                <form method="POST">

                    <input
                        type="hidden"
                        name="acao"
                        value="responder"
                    >

                    <input
                        type="hidden"
                        name="id"
                        value="<?= $questaoAtual['id'] ?>"
                    >


                    <div class="alternativas">

                        <?php foreach ($questaoAtual['alternativas'] as $indice => $alternativa): ?>

                            <label class="alternativa">

                                <input
                                    type="radio"
                                    name="resposta"
                                    value="<?= $indice ?>"
                                    required
                                >

                                <span class="letra">
                            <?= chr(65 + $indice) ?>
                        </span>

                                <span>
                            <?= e($alternativa) ?>
                        </span>

                            </label>

                        <?php endforeach; ?>

                    </div>


                    <button class="btn-principal btn-grande">
                        Confirmar resposta
                    </button>

                </form>

            </div>

        </section>


        <?php if ($resultado): ?>

            <div class="resultado-popup <?= $resultado['correta'] ? 'acertou' : 'errou' ?>">

                <div class="resultado-icon">

                    <?= $resultado['correta'] ? '✓' : '×' ?>

                </div>

                <h2>

                    <?= $resultado['correta']
                        ? 'Resposta correta!'
                        : 'Resposta incorreta!' ?>

                </h2>

                <p>
                    <?= e($resultado['questao']['explicacao']) ?>
                </p>

                <?php if (!$resultado['correta']): ?>

                    <div class="resposta-certa">

                        Resposta correta:

                        <strong>
                            <?= chr(65 + $resultado['questao']['correta']) ?>
                        </strong>

                    </div>

                <?php endif; ?>

                <a
                    href="index.php?pagina=resolver&id=<?= $resultado['questao']['id'] + 1 ?>"
                    class="btn-principal"
                >
                    Próxima questão →
                </a>

            </div>

        <?php endif; ?>


    <?php elseif ($pagina === 'simulados'): ?>


        <!-- ======================================================
             SIMULADOS
        ======================================================= -->

        <section class="pagina">

            <div class="pagina-cabecalho">

        <span class="tag">
            SIMULADOS
        </span>

                <h1>
                    Treine como se fosse o dia da prova.
                </h1>

                <p>
                    Escolha uma área e monte seu simulado.
                </p>

            </div>


            <form
                method="POST"
                class="simulado-config"
            >

                <input
                    type="hidden"
                    name="acao"
                    value="iniciar_simulado"
                >

                <div>

                    <label>
                        Área
                    </label>

                    <select name="area">

                        <option value="">
                            Todas as áreas
                        </option>

                        <option value="Linguagens">
                            Linguagens
                        </option>

                        <option value="Matemática">
                            Matemática
                        </option>

                        <option value="Ciências da Natureza">
                            Ciências da Natureza
                        </option>

                        <option value="Ciências Humanas">
                            Ciências Humanas
                        </option>

                    </select>

                </div>


                <div>

                    <label>
                        Quantidade de questões
                    </label>

                    <select name="quantidade">

                        <option value="5">
                            5 questões
                        </option>

                        <option value="10">
                            10 questões
                        </option>

                        <option value="20">
                            20 questões
                        </option>

                    </select>

                </div>


                <button class="btn-principal">
                    Começar simulado →
                </button>

            </form>


            <div class="simulados-grid">

                <div class="simulado-card destaque">

                    <div class="simulado-icone">
                        📝
                    </div>

                    <h2>
                        Simulado ENEM
                    </h2>

                    <p>
                        Questões variadas para testar
                        seus conhecimentos.
                    </p>

                    <span>
                Linguagens • Matemática • Natureza • Humanas
            </span>

                </div>


                <div class="simulado-card">

                    <div class="simulado-icone">
                        🎯
                    </div>

                    <h2>
                        Simulado por área
                    </h2>

                    <p>
                        Foque exatamente na área em
                        que você precisa estudar.
                    </p>

                    <span>
                Personalizado
            </span>

                </div>

            </div>

        </section>


    <?php elseif ($pagina === 'simulado'): ?>


        <!-- ======================================================
             EXECUÇÃO DO SIMULADO
        ======================================================= -->

        <?php

        $simulado = $_SESSION['simulado'] ?? [];

        $indice = intval($_GET['indice'] ?? 0);

        if (!isset($simulado[$indice])):

            ?>

            <div class="vazio">

                <h2>
                    Nenhum simulado iniciado.
                </h2>

                <a
                    class="btn-principal"
                    href="index.php?pagina=simulados"
                >
                    Criar simulado
                </a>

            </div>

        <?php else:

            $q = $simulado[$indice];

            ?>

            <section class="simulado-page">

                <div class="simulado-progresso">

                    <div>

                        Questão
                        <?= $indice + 1 ?>
                        de
                        <?= count($simulado) ?>

                    </div>

                    <div class="progresso">

                        <div
                            style="width: <?= (($indice + 1) / count($simulado)) * 100 ?>%"
                        ></div>

                    </div>

                </div>


                <div class="questao-grande">

                    <div class="questao-header">

            <span class="badge">
                <?= e($q['area']) ?>
            </span>

                        <span>
                <?= e($q['materia']) ?>
            </span>

                    </div>


                    <h1>
                        <?= e($q['pergunta']) ?>
                    </h1>


                    <form method="POST">

                        <input
                            type="hidden"
                            name="acao"
                            value="responder_simulado"
                        >

                        <input
                            type="hidden"
                            name="id"
                            value="<?= $q['id'] ?>"
                        >

                        <input
                            type="hidden"
                            name="indice"
                            value="<?= $indice ?>"
                        >


                        <div class="alternativas">

                            <?php foreach ($q['alternativas'] as $i => $alternativa): ?>

                                <label class="alternativa">

                                    <input
                                        type="radio"
                                        name="resposta"
                                        value="<?= $i ?>"
                                        required
                                    >

                                    <span class="letra">
                            <?= chr(65 + $i) ?>
                        </span>

                                    <span>
                            <?= e($alternativa) ?>
                        </span>

                                </label>

                            <?php endforeach; ?>

                        </div>


                        <button class="btn-principal btn-grande">

                            <?= $indice + 1 === count($simulado)
                                ? 'Finalizar simulado'
                                : 'Próxima questão →'
                            ?>

                        </button>

                    </form>

                </div>

            </section>

        <?php endif; ?>


    <?php elseif ($pagina === 'resultado'): ?>


        <!-- ======================================================
             RESULTADO
        ======================================================= -->

        <section class="resultado-page">

            <div class="resultado-box">

        <span class="tag">
            SIMULADO FINALIZADO
        </span>

                <div class="resultado-circulo">

                    <?= $totalSimulado > 0
                        ? round(($acertos / $totalSimulado) * 100)
                        : 0
                    ?>%

                </div>

                <h1>
                    Seu resultado
                </h1>

                <p>
                    Você acertou
                    <strong><?= $acertos ?></strong>
                    de
                    <strong><?= $totalSimulado ?></strong>
                    questões.
                </p>


                <div class="resultado-estatisticas">

                    <div>
                        <strong><?= $acertos ?></strong>
                        <span>Acertos</span>
                    </div>

                    <div>
                        <strong><?= $totalSimulado - $acertos ?></strong>
                        <span>Erros</span>
                    </div>

                    <div>
                        <strong><?= $totalSimulado ?></strong>
                        <span>Total</span>
                    </div>

                </div>


                <div class="resultado-botoes">

                    <a
                        href="index.php?pagina=simulados"
                        class="btn-principal"
                    >
                        Fazer outro simulado
                    </a>

                    <a
                        href="index.php?pagina=questoes"
                        class="btn-secundario"
                    >
                        Continuar estudando
                    </a>

                </div>

            </div>

        </section>


    <?php elseif ($pagina === 'login'): ?>


        <!-- ======================================================
             LOGIN
        ======================================================= -->

        <section class="auth-page">

            <div class="auth-card">

                <div class="auth-logo">
                    ✓
                </div>

                <h1>
                    Bem-vindo de volta!
                </h1>

                <p>
                    Entre para continuar seus estudos.
                </p>


                <form method="POST">

                    <input
                        type="hidden"
                        name="acao"
                        value="login"
                    >

                    <label>
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="seu@email.com"
                        required
                    >


                    <label>
                        Senha
                    </label>

                    <input
                        type="password"
                        name="senha"
                        placeholder="••••••••"
                        required
                    >


                    <button class="btn-principal btn-grande">
                        Entrar
                    </button>

                </form>


                <p class="auth-footer">

                    Ainda não tem uma conta?

                    <a href="index.php?pagina=cadastro">
                        Criar conta
                    </a>

                </p>

            </div>

        </section>


    <?php elseif ($pagina === 'cadastro'): ?>


        <!-- ======================================================
             CADASTRO
        ======================================================= -->

        <section class="auth-page">

            <div class="auth-card">

                <div class="auth-logo">
                    ✓
                </div>

                <h1>
                    Crie sua conta
                </h1>

                <p>
                    Comece sua preparação hoje.
                </p>


                <form method="POST">

                    <input
                        type="hidden"
                        name="acao"
                        value="cadastro"
                    >

                    <label>
                        Nome
                    </label>

                    <input
                        type="text"
                        name="nome"
                        placeholder="Seu nome"
                        required
                    >


                    <label>
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="seu@email.com"
                        required
                    >


                    <label>
                        Senha
                    </label>

                    <input
                        type="password"
                        name="senha"
                        placeholder="Crie uma senha"
                        required
                    >


                    <button class="btn-principal btn-grande">
                        Criar minha conta
                    </button>

                </form>


                <p class="auth-footer">

                    Já possui uma conta?

                    <a href="index.php?pagina=login">
                        Entrar
                    </a>

                </p>

            </div>

        </section>


    <?php elseif ($pagina === 'perfil'): ?>


        <!-- ======================================================
             PERFIL
        ======================================================= -->

        <section class="pagina">

            <div class="perfil">

                <div class="perfil-avatar">

                    <?= strtoupper(
                        substr($_SESSION['usuario']['nome'] ?? 'E', 0, 1)
                    ) ?>

                </div>

                <h1>
                    <?= e($_SESSION['usuario']['nome'] ?? 'Estudante') ?>
                </h1>

                <p>
                    <?= e($_SESSION['usuario']['email'] ?? '') ?>
                </p>


                <div class="perfil-estatisticas">

                    <div>
                        <strong>124</strong>
                        <span>Questões</span>
                    </div>

                    <div>
                        <strong>87%</strong>
                        <span>Acertos</span>
                    </div>

                    <div>
                        <strong>18</strong>
                        <span>Simulados</span>
                    </div>

                </div>


                <a
                    href="index.php?pagina=logout"
                    class="btn-secundario"
                >
                    Sair da conta
                </a>

            </div>

        </section>


    <?php elseif ($pagina === 'desempenho'): ?>


        <!-- ======================================================
             DESEMPENHO
        ======================================================= -->

        <section class="pagina">

            <div class="pagina-cabecalho">

        <span class="tag">
            SEU DESEMPENHO
        </span>

                <h1>
                    Acompanhe sua evolução.
                </h1>

                <p>
                    Veja como seus estudos estão avançando.
                </p>

            </div>


            <div class="desempenho-grid">

                <div class="desempenho-card">

            <span>
                Questões respondidas
            </span>

                    <strong>
                        124
                    </strong>

                    <small>
                        +18 esta semana
                    </small>

                </div>


                <div class="desempenho-card">

            <span>
                Taxa de acerto
            </span>

                    <strong>
                        87%
                    </strong>

                    <small>
                        +12% este mês
                    </small>

                </div>


                <div class="desempenho-card">

            <span>
                Simulados
            </span>

                    <strong>
                        18
                    </strong>

                    <small>
                        concluídos
                    </small>

                </div>

            </div>


            <div class="grafico-card">

                <h2>
                    Evolução dos acertos
                </h2>

                <div class="grafico">

                    <div style="height: 35%">
                        <span>35%</span>
                    </div>

                    <div style="height: 50%">
                        <span>50%</span>
                    </div>

                    <div style="height: 62%">
                        <span>62%</span>
                    </div>

                    <div style="height: 70%">
                        <span>70%</span>
                    </div>

                    <div style="height: 78%">
                        <span>78%</span>
                    </div>

                    <div style="height: 87%">
                        <span>87%</span>
                    </div>

                </div>

            </div>

        </section>


    <?php endif; ?>

</main>


<!-- ======================================================
     FOOTER
======================================================= -->

<footer>

    <div class="footer-logo">
        <strong>estudaí</strong>

        <p>
            preparação que transforma
        </p>

    </div>

    <p>
        © <?= date('Y') ?> Estudaí. Todos os direitos reservados.
    </p>

</footer>


<script src="script.js"></script>

</body>
</html>