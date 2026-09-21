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
    ],

    [
        'id'=> 101,
        'area' => 'Linguagens',
        'materia' => 'Língua Portuguesa',
        'prova' => 'ENEM',
        'ano' => 2018,
        'pergunta' => 'Em uma campanha de conscientização sobre o descarte correto de resíduos, um cartaz apresenta a frase: "O planeta não tem botão de reiniciar. Faça sua parte hoje." A principal estratégia utilizada no texto é:',
        'alternativas' => [
            'Apresentar uma informação científica sem intenção persuasiva.',
            'Utilizar uma comparação para incentivar uma mudança de comportamento.',
            'Relatar um acontecimento histórico relacionado ao meio ambiente.',
            'Defender exclusivamente o uso de tecnologias digitais.',
            'Descrever detalhadamente o funcionamento dos aterros sanitários.'
        ],
        'correta' => 1,
        'explicacao' => 'A expressão \'botão de reiniciar\' faz uma comparação com recursos tecnológicos para reforçar a necessidade de agir no presente.'
    ],

    [
        'id' => 102,
        'area' => 'Linguagens',
        'materia' => 'Literatura',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Um poema apresenta linguagem cotidiana, versos livres e referências a situações comuns da vida urbana. Essas características estão relacionadas principalmente à:',
        'alternativas' => [
            'Valorização exclusiva da métrica clássica.',
            'Retomada obrigatória dos modelos greco-romanos.',
            'Experimentação estética e aproximação entre literatura e cotidiano.',
            'Eliminação de qualquer elemento da realidade social.',
            'Utilização exclusiva de linguagem científica.'
        ],
        'correta' => 2,
        'explicacao' => 'A aproximação com a linguagem cotidiana e a liberdade formal são características associadas à experimentação estética da literatura moderna.'
    ],

    [
        'id' => 103,
        'area' => 'Linguagens',
        'materia' => 'Publicidade',
        'prova' => 'ENEM',
        'ano' => 2022,
        'imagem' => 'imagens/linguagens_campanha_2022.svg',
        'pergunta' => 'Uma campanha publicitária apresenta a imagem de uma torneira da qual saem folhas de árvores em vez de água, acompanhada da frase \'Cada gota conta\'. A combinação entre imagem e texto busca:',
        'alternativas' => [
            'Mostrar uma característica natural das árvores.',
            'Estimular a reflexão sobre o desperdício de água.',
            'Divulgar equipamentos hidráulicos.',
            'Explicar o processo de fotossíntese.',
            'Defender o aumento do consumo de água.'
        ],
        'correta' => 1,
        'explicacao' => 'A associação visual entre a torneira e as folhas cria uma mensagem simbólica para chamar atenção à preservação dos recursos naturais.'
    ],

    [
        'id' => 104,
        'area' => 'Linguagens',
        'materia' => 'Variação Linguística',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Em uma conversa entre personagens de diferentes regiões brasileiras, aparecem expressões próprias de cada localidade. Considerando os estudos da linguagem, essas diferenças demonstram que:',
        'alternativas' => [
            'Existe apenas uma forma correta de falar português em qualquer situação.',
            'As variedades linguísticas podem estar relacionadas a fatores regionais e sociais.',
            'As diferenças regionais impedem a comunicação entre os falantes.',
            'A linguagem informal não possui regras de organização.',
            'Todas as variedades linguísticas devem ser eliminadas.'
        ],
        'correta' => 1,
        'explicacao' => 'A língua apresenta variações relacionadas à região, grupo social, situação comunicativa e outros fatores.'
    ],

    [
        'id' => 105,
        'area' => 'Linguagens',
        'materia' => 'Artes',
        'prova' => 'ENEM',
        'ano' => 2025,
        'imagem' => 'imagens/linguagens_grafite_2025.svg',
        'pergunta' => 'Um muro urbano apresenta um grande grafite que combina figuras humanas, elementos da natureza e palavras relacionadas à identidade cultural. A utilização desse espaço público como suporte artístico evidencia:',
        'alternativas' => [
            'A separação obrigatória entre arte e sociedade.',
            'A utilização da arte como forma de expressão cultural e ocupação do espaço urbano.',
            'A necessidade de limitar a arte aos museus.',
            'A ausência de comunicação nas manifestações visuais.',
            'A substituição da arte por mensagens exclusivamente comerciais.'
        ],
        'correta' => 1,
        'explicacao' => 'O grafite pode funcionar como manifestação artística e cultural, utilizando o espaço urbano para comunicar ideias e identidades.'
    ],

    [
        'id' => 106,
        'area' => 'Matemática',
        'materia' => 'Porcentagem',
        'prova' => 'ENEM',
        'ano' => 2019,
        'pergunta' => 'Uma estudante encontrou uma mochila que custava R$ 180,00 e estava sendo vendida com desconto de 25%. Qual era o preço da mochila após o desconto?',
        'alternativas' => [
            'R$ 125,00',
            'R$ 130,00',
            'R$ 135,00',
            'R$ 140,00',
            'R$ 145,00'
        ],
        'correta' => 2,
        'explicacao' => '25% de R$ 180,00 corresponde a R$ 45,00. Assim, R$ 180,00 - R$ 45,00 = R$ 135,00.'
    ],

    [
        'id' => 107,
        'area' => 'Matemática',
        'materia' => 'Geometria',
        'prova' => 'ENEM',
        'ano' => 2021,
        'imagem' => 'imagens/matematica_area_2021.svg',
        'pergunta' => 'Uma praça retangular possui 18 metros de comprimento e 12 metros de largura. No centro será construída uma área quadrada de lado 6 metros. Qual será a área restante da praça?',
        'alternativas' => [
            '144 m²',
            '168 m²',
            '180 m²',
            '192 m²',
            '216 m²'
        ],
        'correta' => 3,
        'explicacao' => 'A área da praça é 18 × 12 = 216 m². A área quadrada é 6 × 6 = 36 m². Portanto, 216 - 36 = 180 m².'
    ],

    [
        'id' => 108,
        'area' => 'Matemática',
        'materia' => 'Estatística',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'As notas de cinco estudantes em uma atividade foram 6, 8, 7, 9 e 10. Qual é a média aritmética dessas notas?',
        'alternativas' => [
            '7',
            '7,5',
            '8',
            '8,5',
            '9'
        ],
        'correta' => 2,
        'explicacao' => 'A soma das notas é 40. Dividindo por 5 estudantes, obtém-se média igual a 8.'
    ],

    [
        'id' => 109,
        'area' => 'Matemática',
        'materia' => 'Funções',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma empresa de transporte cobra uma tarifa fixa de R$ 5,00 mais R$ 2,00 por quilômetro percorrido. Qual expressão representa o preço P de uma viagem de x quilômetros?',
        'alternativas' => [
            'P(x) = 5x + 2',
            'P(x) = 2x + 5',
            'P(x) = 7x',
            'P(x) = x + 10',
            'P(x) = 5x - 2'
        ],
        'correta' => 1,
        'explicacao' => 'A tarifa fixa corresponde a 5 e o valor variável corresponde a 2 por quilômetro. Logo, P(x) = 2x + 5.'
    ],

    [
        'id' => 110,
        'area' => 'Matemática',
        'materia' => 'Probabilidade',
        'prova' => 'ENEM',
        'ano' => 2025,
        'imagem' => 'imagens/matematica_probabilidade_2025.svg',
        'pergunta' => 'Uma caixa contém 3 bolas azuis, 2 bolas verdes e 5 bolas amarelas. Uma bola é retirada ao acaso. Qual é a probabilidade de ela ser verde?',
        'alternativas' => [
            '10%',
            '15%',
            '20%',
            '25%',
            '30%'
        ],
        'correta' => 2,
        'explicacao' => 'Há 10 bolas no total e 2 são verdes. Portanto, a probabilidade é 2/10 = 20%.'
    ],

    [
        'id' => 111,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2018,
        'pergunta' => 'Em um ecossistema, organismos produtores são importantes porque:',
        'alternativas' => [
            'Obtêm energia alimentando-se de outros animais.',
            'Produzem matéria orgânica a partir de substâncias inorgânicas.',
            'Eliminam todos os decompositores do ambiente.',
            'Impedem a circulação de matéria no ecossistema.',
            'Alimentam-se exclusivamente de matéria orgânica.'
        ],
        'correta' => 1,
        'explicacao' => 'Os produtores, como as plantas, produzem matéria orgânica utilizando energia luminosa ou química.'
    ],

    [
        'id' => 112,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2020,
        'imagem' => 'imagens/fisica_energia_solar_2020.svg',
        'pergunta' => 'Um painel solar transforma a energia proveniente da radiação solar principalmente em:',
        'alternativas' => [
            'Energia elétrica.',
            'Energia sonora.',
            'Energia nuclear.',
            'Energia gravitacional.',
            'Energia mecânica diretamente.'
        ],
        'correta' => 0,
        'explicacao' => 'Painéis fotovoltaicos utilizam a radiação solar para produzir energia elétrica por meio do efeito fotovoltaico.'
    ],

    [
        'id' => 113,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Uma solução apresenta pH igual a 3. Comparada a uma solução de pH 6, ela apresenta:',
        'alternativas' => [
            'Menor acidez.',
            'Maior acidez.',
            'A mesma acidez.',
            'Maior basicidade.',
            'Ausência de íons.'
        ],
        'correta' => 1,
        'explicacao' => 'Quanto menor o valor de pH, maior é a acidez da solução. Portanto, pH 3 indica maior acidez que pH 6.'
    ],

    [
        'id' => 114,
        'area' => 'Ciências da Natureza',
        'materia' => 'Ecologia',
        'prova' => 'ENEM',
        'ano' => 2023,
        'imagem' => 'imagens/ecologia_cadeia_2023.svg',
        'pergunta' => 'Observe a representação de uma cadeia alimentar formada por capim, gafanhoto, sapo e cobra. Nessa cadeia, o gafanhoto ocupa o nível de:',
        'alternativas' => [
            'Produtor.',
            'Consumidor primário.',
            'Consumidor secundário.',
            'Consumidor terciário.',
            'Decompositor.'
        ],
        'correta' => 1,
        'explicacao' => 'O gafanhoto alimenta-se diretamente do produtor, o capim. Por isso, é classificado como consumidor primário.'
    ],

    [
        'id' => 115,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Um automóvel percorre 120 km em 2 horas, mantendo velocidade média constante. Qual é sua velocidade média?',
        'alternativas' => [
            '40 km/h',
            '50 km/h',
            '60 km/h',
            '80 km/h',
            '120 km/h'
        ],
        'correta' => 2,
        'explicacao' => 'A velocidade média é calculada dividindo a distância pelo tempo: 120 ÷ 2 = 60 km/h.'
    ],

    [
        'id' => 116,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2019,
        'pergunta' => 'A Revolução Industrial contribuiu para importantes transformações nas relações de trabalho. Entre elas está:',
        'alternativas' => [
            'A expansão do trabalho assalariado nas cidades.',
            'O desaparecimento das fábricas.',
            'A redução da produção em larga escala.',
            'O fim das atividades comerciais.',
            'A eliminação da divisão do trabalho.'
        ],
        'correta' => 0,
        'explicacao' => 'A industrialização ampliou a produção fabril e contribuiu para a expansão do trabalho assalariado urbano.'
    ],

    [
        'id' => 117,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2020,
        'imagem' => 'imagens/geografia_urbanizacao_2020.svg',
        'pergunta' => 'Um mapa apresenta a expansão de uma área urbana ao longo de três décadas, mostrando a substituição de áreas rurais por bairros residenciais. Esse processo está relacionado principalmente à:',
        'alternativas' => [
            'Desertificação.',
            'Urbanização.',
            'Glaciação.',
            'Erosão marinha.',
            'Ruralização.'
        ],
        'correta' => 1,
        'explicacao' => 'A expansão das cidades sobre áreas anteriormente rurais é uma manifestação do processo de urbanização.'
    ],

    [
        'id' => 118,
        'area' => 'Ciências Humanas',
        'materia' => 'Sociologia',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'A socialização pode ser compreendida como o processo pelo qual os indivíduos:',
        'alternativas' => [
            'Vivem isolados das normas sociais.',
            'Aprendem valores, normas e práticas de uma sociedade.',
            'Deixam de participar de grupos sociais.',
            'Rejeitam qualquer influência cultural.',
            'Abandonam completamente suas identidades.'
        ],
        'correta' => 1,
        'explicacao' => 'A socialização envolve a aprendizagem de normas, valores, comportamentos e práticas presentes nos grupos e sociedades.'
    ],

    [
        'id' => 119,
        'area' => 'Ciências Humanas',
        'materia' => 'Filosofia',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'O pensamento filosófico caracteriza-se, entre outros aspectos, pela busca de:',
        'alternativas' => [
            'Respostas baseadas exclusivamente em tradições.',
            'Questionamento crítico e reflexão racional sobre diferentes problemas.',
            'Eliminação de qualquer dúvida.',
            'Aceitação obrigatória de uma única explicação.',
            'Substituição da argumentação por opiniões sem justificativa.'
        ],
        'correta' => 1,
        'explicacao' => 'A filosofia envolve questionamento, reflexão crítica e construção de argumentos para analisar problemas e conceitos.'
    ],

    [
        'id' => 120,
        'area' => 'Ciências Humanas',
        'materia' => 'Geopolítica',
        'prova' => 'ENEM',
        'ano' => 2025,
        'imagem' => 'imagens/geopolitica_migracao_2025.svg',
        'pergunta' => 'Um mapa apresenta fluxos migratórios internacionais entre diferentes regiões do mundo. Esses deslocamentos podem estar relacionados a fatores econômicos, políticos e ambientais. Nesse contexto, a migração pode ser entendida como:',
        'alternativas' => [
            'Um fenômeno exclusivamente provocado por motivos turísticos.',
            'Um deslocamento populacional que pode possuir diferentes causas.',
            'Um processo que ocorre somente dentro de uma mesma cidade.',
            'Um fenômeno sem relação com condições econômicas.',
            'Um movimento restrito às áreas rurais.'
        ],
        'correta' => 1,
        'explicacao' => 'Os fluxos migratórios podem ocorrer por diversas razões, como oportunidades econômicas, conflitos, perseguições, desastres ambientais e condições sociais.'
    ],
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