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
        //Português

    [
        'id' => 1,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Em uma campanha de conscientização ambiental, o slogan “Pequenas escolhas mudam grandes caminhos” procura principalmente:',
        'alternativas' => [
            'Convencer o leitor a adotar atitudes por meio de uma mensagem persuasiva.',
            'Apresentar uma definição científica sobre sustentabilidade.',
            'Narrar uma experiência pessoal do autor.',
            'Descrever detalhadamente uma paisagem natural.',
            'Informar o leitor sobre uma descoberta histórica.',
        ],
        'correta' => 0,
        'explicacao' => 'O slogan busca influenciar o comportamento do público, característica da função persuasiva da linguagem.',
    ],
    [
        'id' => 2,
        'area' => 'Linguagens',
        'materia' => 'Literatura',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Um poema que apresenta imagens da cidade, linguagem cotidiana e versos livres evidencia uma aproximação com:',
        'alternativas' => [
            'Uma linguagem exclusivamente científica.',
            'A liberdade formal e a representação do cotidiano.',
            'A estrutura rígida dos sonetos clássicos.',
            'A objetividade típica dos textos administrativos.',
            'O uso obrigatório de rimas alternadas.',
        ],
        'correta' => 1,
        'explicacao' => 'A poesia moderna frequentemente rompe com formas fixas e incorpora temas e linguagem do cotidiano.',
    ],
    [
        'id' => 3,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Leia a situação: “A biblioteca estava silenciosa; apenas o som das páginas viradas preenchia a sala.” O ponto e vírgula empregado no período contribui para:',
        'alternativas' => [
            'Separar orações relacionadas, mantendo uma pausa maior que a vírgula.',
            'Indicar uma pergunta indireta.',
            'Introduzir uma fala de personagem.',
            'Substituir obrigatoriamente os dois-pontos.',
            'Indicar o fim do período.',
        ],
        'correta' => 0,
        'explicacao' => 'O ponto e vírgula pode separar orações coordenadas que apresentam relação de sentido e exigem pausa intermediária.',
    ],
    [
        'id' => 4,
        'area' => 'Linguagens',
        'materia' => 'Inglês',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Em uma postagem em inglês, lê-se: “Save water today, because tomorrow depends on it.” A intenção predominante da mensagem é:',
        'alternativas' => [
            'Incentivar a economia de água.',
            'Relatar uma viagem internacional.',
            'Ensinar uma regra gramatical.',
            'Descrever uma experiência esportiva.',
            'Apresentar uma receita.',
        ],
        'correta' => 0,
        'explicacao' => 'O uso do imperativo “Save water” caracteriza uma chamada para ação relacionada ao consumo consciente.',
    ],
    [
        'id' => 5,
        'area' => 'Linguagens',
        'materia' => 'Artes',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma instalação artística utiliza garrafas plásticas recolhidas em praias para formar uma grande escultura. Nesse caso, o uso do material contribui para:',
        'alternativas' => [
            'Relacionar a obra a uma reflexão sobre o consumo e o impacto ambiental.',
            'Eliminar qualquer interpretação social da obra.',
            'Transformar a escultura em documento científico.',
            'Impedir a participação do público na interpretação.',
            'Reproduzir exatamente uma obra clássica.',
        ],
        'correta' => 0,
        'explicacao' => 'O material reaproveitado funciona também como elemento simbólico, aproximando a obra de questões ambientais e sociais.',
    ],
    [
        'id' => 6,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Em uma notícia, o título “Chuva intensa provoca mudanças no trânsito da cidade” tem como principal característica:',
        'alternativas' => [
            'Sintetizar uma informação central de forma objetiva.',
            'Criar suspense sem apresentar informação.',
            'Expressar exclusivamente a opinião do jornalista.',
            'Utilizar linguagem poética para emocionar o leitor.',
            'Apresentar uma narrativa ficcional.',
        ],
        'correta' => 0,
        'explicacao' => 'O título jornalístico procura condensar o acontecimento principal e facilitar a compreensão rápida da notícia.',
    ],
    [
        'id' => 7,
        'area' => 'Linguagens',
        'materia' => 'Educação Física',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'A prática regular de atividades físicas pode contribuir para a qualidade de vida porque:',
        'alternativas' => [
            'Favorece o funcionamento do organismo e pode contribuir para o bem-estar.',
            'Elimina a necessidade de alimentação equilibrada.',
            'Garante que todas as doenças sejam evitadas.',
            'Substitui completamente o descanso.',
            'Torna desnecessário o acompanhamento profissional.',
        ],
        'correta' => 0,
        'explicacao' => 'A atividade física regular está relacionada a diversos benefícios físicos e psicossociais, mas não substitui outros cuidados de saúde.',
    ],
    [
        'id' => 8,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Em uma conversa virtual, a pessoa escreve “vc vai hj?” em vez de “Você vai hoje?”. O uso dessa forma está relacionado principalmente:',
        'alternativas' => [
            'À adequação da linguagem ao contexto informal e ao meio digital.',
            'A um erro que impossibilita qualquer comunicação.',
            'À linguagem exclusivamente científica.',
            'Ao uso obrigatório da norma-padrão.',
            'À construção de um texto jurídico.',
        ],
        'correta' => 0,
        'explicacao' => 'Abreviações são comuns em contextos digitais informais e mostram que os usos linguísticos variam conforme situação e finalidade.',
    ],
    [
        'id' => 9,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Em um texto argumentativo, a utilização de dados estatísticos tem como função principal:',
        'alternativas' => [
            'Dar sustentação objetiva à argumentação apresentada.',
            'Substituir completamente a tese.',
            'Impedir qualquer interpretação do leitor.',
            'Transformar o texto em narrativa literária.',
            'Eliminar a necessidade de argumentos.',
        ],
        'correta' => 0,
        'explicacao' => 'Dados podem funcionar como evidências que sustentam uma ideia defendida no texto.',
    ],
    [
        'id' => 10,
        'area' => 'Linguagens',
        'materia' => 'Publicidade',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Uma propaganda mostra uma família reunida e associa o produto anunciado à ideia de felicidade. A estratégia utiliza principalmente:',
        'alternativas' => [
            'Associação de valores emocionais à marca ou ao produto.',
            'Apresentação de uma fórmula matemática.',
            'Descrição técnica sem intenção persuasiva.',
            'Narrativa histórica sobre o fabricante.',
            'Linguagem exclusivamente científica.',
        ],
        'correta' => 0,
        'explicacao' => 'A publicidade frequentemente associa produtos a sentimentos e valores para influenciar a percepção do público.',
    ],
    [
        'id' => 11,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Em um texto, a repetição intencional de uma mesma palavra no início de vários períodos pode produzir efeito de:',
        'alternativas' => [
            'Ênfase e reforço de uma ideia.',
            'Eliminação da coerência textual.',
            'Transformação automática em texto científico.',
            'Ausência completa de ritmo.',
            'Contradição obrigatória entre as frases.',
        ],
        'correta' => 0,
        'explicacao' => 'A repetição pode ser um recurso expressivo utilizado para destacar determinada ideia e criar ritmo.',
    ],
    [
        'id' => 12,
        'area' => 'Linguagens',
        'materia' => 'Literatura',
        'prova' => 'ENEM',
        'ano' => 2019,
        'pergunta' => 'Uma narrativa em primeira pessoa apresenta acontecimentos filtrados pela percepção do personagem narrador. Esse recurso:',
        'alternativas' => [
            'Aproxima o leitor da perspectiva subjetiva do narrador.',
            'Garante que todas as informações sejam objetivas.',
            'Impede a existência de conflitos.',
            'Elimina a caracterização das personagens.',
            'Transforma a narrativa em texto instrucional.',
        ],
        'correta' => 0,
        'explicacao' => 'O narrador em primeira pessoa participa ou vivencia a história e apresenta os acontecimentos a partir de sua perspectiva.',
    ],
    [
        'id' => 13,
        'area' => 'Linguagens',
        'materia' => 'Inglês',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Em um cartaz em inglês aparece a expressão “Keep your city clean!”. O verbo “keep” nesse contexto contribui para:',
        'alternativas' => [
            'Formular uma orientação ao público.',
            'Relatar uma ação passada.',
            'Apresentar uma hipótese científica.',
            'Descrever uma personagem fictícia.',
            'Indicar uma dúvida do autor.',
        ],
        'correta' => 0,
        'explicacao' => 'A expressão utiliza o imperativo para orientar o público a manter a cidade limpa.',
    ],
    [
        'id' => 14,
        'area' => 'Linguagens',
        'materia' => 'Artes',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Uma obra de arte que combina fotografia, colagem e texto escrito pode ser compreendida como exemplo de:',
        'alternativas' => [
            'Mistura de linguagens e recursos expressivos.',
            'Uso exclusivo de uma técnica tradicional.',
            'Ausência de composição visual.',
            'Restrição da arte à pintura a óleo.',
            'Reprodução obrigatória de modelos antigos.',
        ],
        'correta' => 0,
        'explicacao' => 'A combinação de diferentes meios caracteriza práticas artísticas híbridas e amplia as possibilidades de expressão.',
    ],
    [
        'id' => 15,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2018,
        'pergunta' => 'Observe o esquema: “IDEIA → ARGUMENTO → EXEMPLO → CONCLUSÃO”. A organização representa principalmente:',
        'alternativas' => [
            'Uma sequência de desenvolvimento argumentativo.',
            'Uma receita culinária.',
            'Uma estrutura de narrativa policial.',
            'Uma lista sem relação entre as partes.',
            'Uma descrição exclusivamente visual.',
        ],
        'correta' => 0,
        'explicacao' => 'A sequência organiza uma ideia, sua sustentação, uma exemplificação e um fechamento argumentativo.',
        'imagem' => 'assets/img/linguagens_esquema_15.svg',
    ],
    [
        'id' => 16,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Em uma charge, um personagem afirma defender a natureza enquanto joga lixo no chão. O efeito de sentido é construído principalmente pela:',
        'alternativas' => [
            'Contradição entre a fala e a atitude do personagem.',
            'Ausência de elementos visuais.',
            'Utilização de linguagem científica.',
            'Repetição de informações históricas.',
            'Descrição objetiva de uma paisagem.',
        ],
        'correta' => 0,
        'explicacao' => 'A charge explora a oposição entre discurso e comportamento para produzir crítica e humor.',
    ],
    [
        'id' => 17,
        'area' => 'Linguagens',
        'materia' => 'Educação Física',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Em uma aula, diferentes modalidades esportivas são adaptadas para que estudantes com diferentes níveis de habilidade possam participar. Essa prática valoriza:',
        'alternativas' => [
            'Inclusão e participação dos estudantes.',
            'Competição sem regras.',
            'Exclusão dos participantes menos habilidosos.',
            'Apenas o desempenho de atletas profissionais.',
            'A eliminação das atividades coletivas.',
        ],
        'correta' => 0,
        'explicacao' => 'A adaptação das atividades pode ampliar a participação e favorecer práticas corporais inclusivas.',
    ],
    [
        'id' => 18,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Em uma reportagem, o uso de depoimentos de diferentes pessoas contribui para:',
        'alternativas' => [
            'Apresentar diferentes perspectivas sobre o tema abordado.',
            'Garantir que exista apenas uma opinião possível.',
            'Eliminar informações factuais.',
            'Transformar a reportagem em poema.',
            'Impedir a contextualização do assunto.',
        ],
        'correta' => 0,
        'explicacao' => 'Depoimentos podem ampliar a abordagem do tema ao apresentar experiências e pontos de vista distintos.',
    ],
    [
        'id' => 19,
        'area' => 'Linguagens',
        'materia' => 'Literatura',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Quando um texto literário utiliza uma palavra com sentido diferente do habitual para criar uma imagem, ocorre um uso:',
        'alternativas' => [
            'Conotativo da linguagem.',
            'Exclusivamente denotativo.',
            'Administrativo.',
            'Matemático.',
            'Normativo.',
        ],
        'correta' => 0,
        'explicacao' => 'A linguagem conotativa explora sentidos figurados e associações que ultrapassam o significado literal.',
    ],
    [
        'id' => 20,
        'area' => 'Linguagens',
        'materia' => 'Português',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Uma tabela apresenta o número de livros lidos por quatro turmas: A = 32, B = 45, C = 28 e D = 40. A turma com maior número de livros lidos é:',
        'alternativas' => [
            'Turma A.',
            'Turma B.',
            'Turma C.',
            'Turma D.',
            'Todas apresentam o mesmo número.',
        ],
        'correta' => 1,
        'explicacao' => 'Entre 32, 45, 28 e 40, o maior valor é 45, correspondente à turma B.',
        'imagem' => 'assets/img/linguagens_tabela_20.svg',
    ],

        //Matemática

    [
        'id' => 21,
        'area' => 'Matemática',
        'materia' => 'Matemática',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma loja oferece 20% de desconto em uma mochila que custa R$ 150,00. O preço após o desconto será:',
        'alternativas' => [
            'R$ 110,00.',
            'R$ 120,00.',
            'R$ 125,00.',
            'R$ 130,00.',
            'R$ 135,00.',
        ],
        'correta' => 1,
        'explicacao' => '20% de R$ 150,00 corresponde a R$ 30,00. Assim, R$ 150,00 - R$ 30,00 = R$ 120,00.',
    ],
    [
        'id' => 22,
        'area' => 'Matemática',
        'materia' => 'Matemática',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Uma caixa retangular mede 40 cm de comprimento, 30 cm de largura e 20 cm de altura. Seu volume é:',
        'alternativas' => [
            '12 000 cm³.',
            '18 000 cm³.',
            '24 000 cm³.',
            '30 000 cm³.',
            '36 000 cm³.',
        ],
        'correta' => 2,
        'explicacao' => 'O volume é comprimento × largura × altura: 40 × 30 × 20 = 24 000 cm³.',
    ],
    [
        'id' => 23,
        'area' => 'Matemática',
        'materia' => 'Matemática',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Um gráfico registra a quantidade de água consumida por uma família em quatro meses: janeiro 12 m³, fevereiro 10 m³, março 14 m³ e abril 8 m³. A média mensal foi:',
        'alternativas' => [
            '9 m³.',
            '10 m³.',
            '11 m³.',
            '12 m³.',
            '13 m³.',
        ],
        'correta' => 2,
        'explicacao' => 'A média é (12 + 10 + 14 + 8) ÷ 4 = 44 ÷ 4 = 11 m³.',
        'imagem' => 'assets/img/matematica_grafico_23.svg',
    ],
    [
        'id' => 24,
        'area' => 'Matemática',
        'materia' => 'Matemática',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Uma corrida possui 5 km. Uma atleta percorreu 60% do percurso. Quantos quilômetros ainda faltam?',
        'alternativas' => [
            '1 km.',
            '2 km.',
            '2,5 km.',
            '3 km.',
            '4 km.',
        ],
        'correta' => 1,
        'explicacao' => '60% de 5 km são 3 km. Portanto, faltam 5 - 3 = 2 km.',
    ],
    [
        'id' => 25,
        'area' => 'Matemática',
        'materia' => 'Geometria',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Um jardim circular possui raio de 4 m. Considerando π = 3, o comprimento aproximado da circunferência é:',
        'alternativas' => [
            '12 m.',
            '18 m.',
            '24 m.',
            '30 m.',
            '36 m.',
        ],
        'correta' => 2,
        'explicacao' => 'O comprimento é C = 2πr = 2 × 3 × 4 = 24 m.',
    ],
    [
        'id' => 26,
        'area' => 'Matemática',
        'materia' => 'Matemática Financeira',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma pessoa guarda R$ 80,00 por mês durante 10 meses, sem considerar rendimentos. Ao final, terá:',
        'alternativas' => [
            'R$ 400,00.',
            'R$ 600,00.',
            'R$ 700,00.',
            'R$ 800,00.',
            'R$ 900,00.',
        ],
        'correta' => 3,
        'explicacao' => 'Multiplicando R$ 80,00 por 10 meses, obtém-se R$ 800,00.',
    ],
    [
        'id' => 27,
        'area' => 'Matemática',
        'materia' => 'Probabilidade',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Uma caixa contém 3 bolas vermelhas e 2 azuis. Retirando uma bola ao acaso, a probabilidade de ela ser azul é:',
        'alternativas' => [
            '1/5.',
            '2/5.',
            '3/5.',
            '1/2.',
            '2/3.',
        ],
        'correta' => 1,
        'explicacao' => 'Há 2 bolas azuis em um total de 5 bolas, então a probabilidade é 2/5.',
    ],
    [
        'id' => 28,
        'area' => 'Matemática',
        'materia' => 'Funções',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'A função f(x) = 2x + 3 apresenta, para x = 5, o valor:',
        'alternativas' => [
            '8.',
            '10.',
            '11.',
            '13.',
            '15.',
        ],
        'correta' => 3,
        'explicacao' => 'f(5) = 2 × 5 + 3 = 13.',
    ],
    [
        'id' => 29,
        'area' => 'Matemática',
        'materia' => 'Estatística',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'As notas de cinco estudantes foram 6, 7, 8, 8 e 10. A mediana desse conjunto é:',
        'alternativas' => [
            '6.',
            '7.',
            '8.',
            '9.',
            '10.',
        ],
        'correta' => 2,
        'explicacao' => 'Como os dados estão ordenados, o terceiro valor é a mediana: 8.',
    ],
    [
        'id' => 30,
        'area' => 'Matemática',
        'materia' => 'Geometria',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Um mapa está na escala 1:100 000. Uma distância de 3 cm no mapa corresponde, na realidade, a:',
        'alternativas' => [
            '300 m.',
            '1 km.',
            '2 km.',
            '3 km.',
            '30 km.',
        ],
        'correta' => 3,
        'explicacao' => 'Cada centímetro representa 100 000 cm, ou 1 km. Portanto, 3 cm representam 3 km.',
        'imagem' => 'assets/img/matematica_escala_30.svg',
    ],
    [
        'id' => 31,
        'area' => 'Matemática',
        'materia' => 'Álgebra',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Uma sequência começa em 4 e aumenta 3 unidades a cada termo. O quinto termo é:',
        'alternativas' => [
            '13.',
            '14.',
            '15.',
            '16.',
            '17.',
        ],
        'correta' => 3,
        'explicacao' => 'Os termos são 4, 7, 10, 13 e 16. Portanto, o quinto termo é 16.',
    ],
    [
        'id' => 32,
        'area' => 'Matemática',
        'materia' => 'Matemática',
        'prova' => 'ENEM',
        'ano' => 2019,
        'pergunta' => 'Uma tarifa de ônibus custa R$ 5,00. Uma pessoa utiliza duas passagens por dia durante 22 dias. O gasto mensal será:',
        'alternativas' => [
            'R$ 110,00.',
            'R$ 150,00.',
            'R$ 200,00.',
            'R$ 220,00.',
            'R$ 240,00.',
        ],
        'correta' => 3,
        'explicacao' => 'São 2 × 22 = 44 passagens. Multiplicando por R$ 5,00, obtém-se R$ 220,00.',
    ],
    [
        'id' => 33,
        'area' => 'Matemática',
        'materia' => 'Geometria',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Um triângulo possui base de 12 cm e altura de 5 cm. Sua área é:',
        'alternativas' => [
            '17 cm².',
            '24 cm².',
            '30 cm².',
            '34 cm².',
            '60 cm².',
        ],
        'correta' => 2,
        'explicacao' => 'A área é base × altura ÷ 2: 12 × 5 ÷ 2 = 30 cm².',
    ],
    [
        'id' => 34,
        'area' => 'Matemática',
        'materia' => 'Porcentagem',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Uma população de 20 000 habitantes cresceu 10% em determinado período. A nova população é:',
        'alternativas' => [
            '20 100.',
            '21 000.',
            '22 000.',
            '23 000.',
            '24 000.',
        ],
        'correta' => 2,
        'explicacao' => '10% de 20 000 é 2 000. Assim, a população passa a 22 000 habitantes.',
    ],
    [
        'id' => 35,
        'area' => 'Matemática',
        'materia' => 'Estatística',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Um gráfico de barras mostra vendas semanais de uma loja: semana 1 = 20, semana 2 = 35, semana 3 = 30 e semana 4 = 45 unidades. Em qual semana ocorreu a maior venda?',
        'alternativas' => [
            'Semana 1.',
            'Semana 2.',
            'Semana 3.',
            'Semana 4.',
            'Todas foram iguais.',
        ],
        'correta' => 3,
        'explicacao' => 'O maior valor apresentado é 45 unidades, correspondente à quarta semana.',
        'imagem' => 'assets/img/matematica_barras_35.svg',
    ],
    [
        'id' => 36,
        'area' => 'Matemática',
        'materia' => 'Equações',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Se 3x + 5 = 20, então o valor de x é:',
        'alternativas' => [
            '3.',
            '4.',
            '5.',
            '6.',
            '7.',
        ],
        'correta' => 2,
        'explicacao' => 'Subtraindo 5 dos dois lados, 3x = 15. Logo, x = 5.',
    ],
    [
        'id' => 37,
        'area' => 'Matemática',
        'materia' => 'Razão e Proporção',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma receita utiliza 2 xícaras de farinha para 8 porções. Mantendo a proporção, quantas xícaras serão necessárias para 20 porções?',
        'alternativas' => [
            '4.',
            '5.',
            '6.',
            '7.',
            '8.',
        ],
        'correta' => 1,
        'explicacao' => '2/8 = x/20. Assim, 8x = 40 e x = 5 xícaras.',
    ],
    [
        'id' => 38,
        'area' => 'Matemática',
        'materia' => 'Geometria',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Um quadrado possui lado de 9 cm. Seu perímetro é:',
        'alternativas' => [
            '18 cm.',
            '27 cm.',
            '36 cm.',
            '45 cm.',
            '81 cm.',
        ],
        'correta' => 2,
        'explicacao' => 'O perímetro do quadrado é 4 × 9 = 36 cm.',
    ],
    [
        'id' => 39,
        'area' => 'Matemática',
        'materia' => 'Probabilidade',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Ao lançar um dado comum de seis faces, a probabilidade de obter um número par é:',
        'alternativas' => [
            '1/6.',
            '1/3.',
            '1/2.',
            '2/3.',
            '5/6.',
        ],
        'correta' => 2,
        'explicacao' => 'Os resultados pares são 2, 4 e 6: três possibilidades em seis, portanto 3/6 = 1/2.',
    ],
    [
        'id' => 40,
        'area' => 'Matemática',
        'materia' => 'Funções',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Um gráfico mostra uma reta crescente que passa pelos pontos (0, 2) e (2, 6). A taxa de variação da função é:',
        'alternativas' => [
            '1.',
            '2.',
            '3.',
            '4.',
            '6.',
        ],
        'correta' => 1,
        'explicacao' => 'A taxa de variação é (6 - 2)/(2 - 0) = 4/2 = 2.',
        'imagem' => 'assets/img/matematica_reta_40.svg',
    ],

        // Ciências Humanas

    [
        'id' => 41,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'A Revolução Industrial alterou profundamente as relações de trabalho porque contribuiu para:',
        'alternativas' => [
            'A expansão do trabalho fabril e da produção mecanizada.',
            'O desaparecimento das cidades.',
            'O fim do comércio internacional.',
            'A redução da produção em larga escala.',
            'A substituição das máquinas pelo artesanato.',
        ],
        'correta' => 0,
        'explicacao' => 'A industrialização ampliou o uso de máquinas e consolidou novas formas de organização do trabalho nas fábricas.',
    ],
    [
        'id' => 42,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'O processo de urbanização corresponde principalmente:',
        'alternativas' => [
            'Ao crescimento da população e das atividades urbanas.',
            'À redução das cidades existentes.',
            'Ao abandono completo das atividades industriais.',
            'À transformação de cidades em áreas rurais.',
            'À eliminação dos fluxos migratórios.',
        ],
        'correta' => 0,
        'explicacao' => 'Urbanização envolve o crescimento das cidades e da população urbana, acompanhado de transformações econômicas e sociais.',
    ],
    [
        'id' => 43,
        'area' => 'Ciências Humanas',
        'materia' => 'Sociologia',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'A divisão social do trabalho refere-se à:',
        'alternativas' => [
            'Distribuição de diferentes atividades e funções entre indivíduos e grupos.',
            'Eliminação de todas as profissões.',
            'Proibição da especialização profissional.',
            'Igualdade absoluta de funções sociais.',
            'Ausência de relações econômicas.',
        ],
        'correta' => 0,
        'explicacao' => 'A divisão do trabalho envolve a especialização e distribuição de tarefas na sociedade.',
    ],
    [
        'id' => 44,
        'area' => 'Ciências Humanas',
        'materia' => 'Filosofia',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Para Sócrates, o diálogo e o questionamento eram importantes porque:',
        'alternativas' => [
            'Estimulavam a reflexão crítica sobre aquilo que se acreditava saber.',
            'Impediam qualquer investigação.',
            'Substituíam a reflexão por opiniões prontas.',
            'Defendiam a ausência de argumentos.',
            'Tinham como objetivo decorar informações.',
        ],
        'correta' => 0,
        'explicacao' => 'A tradição socrática valoriza o questionamento e o diálogo como caminhos para examinar ideias e crenças.',
    ],
    [
        'id' => 45,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'A abolição da escravidão no Brasil, em 1888, ocorreu por meio da:',
        'alternativas' => [
            'Lei Áurea.',
            'Constituição de 1824.',
            'Lei de Terras.',
            'Lei Eusébio de Queirós.',
            'Lei de Anistia.',
        ],
        'correta' => 0,
        'explicacao' => 'A Lei Áurea, assinada em 13 de maio de 1888, extinguiu juridicamente a escravidão no Brasil.',
    ],
    [
        'id' => 46,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Em um mapa de uso do solo, áreas verdes aparecem concentradas próximas aos cursos d’água. Uma possível função dessas áreas é:',
        'alternativas' => [
            'Contribuir para a proteção das margens e para a manutenção ambiental.',
            'Aumentar obrigatoriamente a impermeabilização do solo.',
            'Eliminar a biodiversidade local.',
            'Impedir a circulação de água.',
            'Favorecer exclusivamente a expansão urbana.',
        ],
        'correta' => 0,
        'explicacao' => 'A vegetação próxima a cursos d’água pode auxiliar na proteção das margens, na infiltração e na conservação dos ecossistemas.',
        'imagem' => 'assets/img/humanas_mapa_46.svg',
    ],
    [
        'id' => 47,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'A Constituição brasileira de 1988 é frequentemente associada ao processo de redemocratização porque:',
        'alternativas' => [
            'Ampliou direitos e consolidou princípios democráticos após a ditadura militar.',
            'Restabeleceu a monarquia.',
            'Eliminou direitos políticos.',
            'Proibiu eleições diretas para todos os cargos.',
            'Instituiu o trabalho escravo.',
        ],
        'correta' => 0,
        'explicacao' => 'A Constituição de 1988 ampliou direitos civis, sociais e políticos no contexto da redemocratização brasileira.',
    ],
    [
        'id' => 48,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'A globalização caracteriza-se, entre outros aspectos, pela intensificação:',
        'alternativas' => [
            'Dos fluxos de mercadorias, capitais, informações e pessoas entre diferentes regiões.',
            'Do isolamento completo entre os países.',
            'Da redução das redes de comunicação.',
            'Da interrupção do comércio internacional.',
            'Da eliminação das empresas transnacionais.',
        ],
        'correta' => 0,
        'explicacao' => 'A globalização intensifica conexões econômicas, tecnológicas, culturais e sociais em escala mundial.',
    ],
    [
        'id' => 49,
        'area' => 'Ciências Humanas',
        'materia' => 'Sociologia',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'O conceito de cultura pode ser compreendido como:',
        'alternativas' => [
            'Conjunto de práticas, valores, conhecimentos e formas de expressão compartilhados socialmente.',
            'Característica determinada apenas biologicamente.',
            'Conjunto de leis da física.',
            'Sinônimo obrigatório de escolaridade.',
            'Algo idêntico em todas as sociedades.',
        ],
        'correta' => 0,
        'explicacao' => 'Cultura envolve modos de viver, pensar, agir e produzir significados construídos socialmente.',
    ],
    [
        'id' => 50,
        'area' => 'Ciências Humanas',
        'materia' => 'Filosofia',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'O pensamento iluminista valorizou princípios como:',
        'alternativas' => [
            'Razão, crítica e discussão sobre direitos e liberdade.',
            'Censura e ausência de debate público.',
            'Privilégios hereditários como único fundamento político.',
            'Rejeição sistemática da ciência.',
            'Fim da circulação de ideias.',
        ],
        'correta' => 0,
        'explicacao' => 'O Iluminismo esteve associado à valorização da razão, da crítica às estruturas tradicionais e de ideias relacionadas a direitos e liberdade.',
    ],
    [
        'id' => 51,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2019,
        'pergunta' => 'A expansão marítima europeia dos séculos XV e XVI esteve relacionada:',
        'alternativas' => [
            'À busca de novas rotas comerciais e à expansão econômica e política europeia.',
            'Ao isolamento das monarquias europeias.',
            'À redução das trocas comerciais.',
            'Ao fim da navegação oceânica.',
            'À rejeição de novas tecnologias náuticas.',
        ],
        'correta' => 0,
        'explicacao' => 'A expansão marítima envolveu interesses comerciais, políticos e religiosos, além do desenvolvimento de técnicas de navegação.',
    ],
    [
        'id' => 52,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Em um gráfico populacional, uma cidade apresenta queda nas taxas de natalidade e aumento da expectativa de vida. Esse processo tende a produzir:',
        'alternativas' => [
            'Envelhecimento da estrutura etária da população.',
            'Aumento obrigatório da população infantil.',
            'Redução da expectativa de vida.',
            'Desaparecimento da população adulta.',
            'Crescimento automático da mortalidade infantil.',
        ],
        'correta' => 0,
        'explicacao' => 'Menor natalidade e maior longevidade alteram a composição etária e aumentam proporcionalmente a participação da população idosa.',
        'imagem' => 'assets/img/humanas_piramide_52.svg',
    ],
    [
        'id' => 53,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'A Guerra Fria foi marcada principalmente pela:',
        'alternativas' => [
            'Disputa política, econômica, tecnológica e militar entre Estados Unidos e União Soviética.',
            'Guerra direta e contínua entre os dois países em seus territórios.',
            'Ausência de conflitos indiretos.',
            'União política entre capitalismo e socialismo.',
            'Eliminação das alianças militares.',
        ],
        'correta' => 0,
        'explicacao' => 'A Guerra Fria envolveu rivalidade entre os blocos liderados por Estados Unidos e União Soviética, com conflitos indiretos e disputa por influência.',
    ],
    [
        'id' => 54,
        'area' => 'Ciências Humanas',
        'materia' => 'Sociologia',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'A mobilidade social refere-se à:',
        'alternativas' => [
            'Mudança de posição de indivíduos ou grupos na estrutura social.',
            'Impossibilidade de qualquer mudança social.',
            'Desaparição das diferenças econômicas.',
            'Substituição da cultura pela biologia.',
            'Proibição de mudanças ocupacionais.',
        ],
        'correta' => 0,
        'explicacao' => 'Mobilidade social descreve mudanças de posição ou condição de indivíduos e grupos dentro da estrutura social.',
    ],
    [
        'id' => 55,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'O desmatamento de uma floresta pode provocar alterações no ciclo da água porque:',
        'alternativas' => [
            'A redução da vegetação pode modificar processos de evapotranspiração e infiltração.',
            'A vegetação não participa dos ciclos naturais.',
            'O desmatamento aumenta obrigatoriamente a infiltração em qualquer ambiente.',
            'As árvores não interferem na umidade.',
            'A água deixa de existir na região.',
        ],
        'correta' => 0,
        'explicacao' => 'A cobertura vegetal participa da evapotranspiração, interceptação da chuva e dinâmica da água no solo.',
    ],
    [
        'id' => 56,
        'area' => 'Ciências Humanas',
        'materia' => 'Filosofia',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'A ideia de contrato social, em diferentes autores modernos, procura discutir:',
        'alternativas' => [
            'A origem e a legitimidade da organização política e da autoridade.',
            'A composição química dos metais.',
            'A formação das galáxias.',
            'A classificação das espécies biológicas.',
            'A estrutura das rochas.',
        ],
        'correta' => 0,
        'explicacao' => 'Teorias do contrato social discutem como a sociedade política pode ser constituída e legitimada.',
    ],
    [
        'id' => 57,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2018,
        'pergunta' => 'A urbanização acelerada do Brasil no século XX esteve relacionada, entre outros fatores, à:',
        'alternativas' => [
            'Industrialização e migração do campo para as cidades.',
            'Redução das oportunidades urbanas.',
            'Diminuição da industrialização.',
            'Eliminação das migrações internas.',
            'Expansão exclusiva da população rural.',
        ],
        'correta' => 0,
        'explicacao' => 'A industrialização e as transformações no campo contribuíram para intensos fluxos migratórios em direção às cidades.',
    ],
    [
        'id' => 58,
        'area' => 'Ciências Humanas',
        'materia' => 'Geografia',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma cidade que possui grande quantidade de superfícies impermeabilizadas pode enfrentar maior risco de alagamentos porque:',
        'alternativas' => [
            'A água da chuva encontra menos áreas para infiltração no solo.',
            'A impermeabilização aumenta a absorção do solo.',
            'As áreas asfaltadas funcionam como florestas.',
            'O escoamento superficial deixa de existir.',
            'A chuva não atinge superfícies urbanas.',
        ],
        'correta' => 0,
        'explicacao' => 'Asfalto e concreto reduzem a infiltração e podem aumentar o escoamento superficial durante chuvas intensas.',
    ],
    [
        'id' => 59,
        'area' => 'Ciências Humanas',
        'materia' => 'História',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'A Independência do Brasil, em 1822, resultou na separação política em relação:',
        'alternativas' => [
            'A Portugal.',
            'À Espanha.',
            'À França.',
            'À Inglaterra.',
            'À Holanda.',
        ],
        'correta' => 0,
        'explicacao' => 'O processo de 1822 marcou a ruptura política do Brasil com o domínio português.',
    ],
    [
        'id' => 60,
        'area' => 'Ciências Humanas',
        'materia' => 'Sociologia',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Um estudo apresenta diferenças de acesso à internet entre regiões de um país. Esse fenômeno pode ser analisado como:',
        'alternativas' => [
            'Desigualdade de acesso a recursos e oportunidades.',
            'Igualdade plena de condições sociais.',
            'Ausência de diferenças territoriais.',
            'Fenômeno exclusivamente climático.',
            'Processo sem relação com a sociedade.',
        ],
        'correta' => 0,
        'explicacao' => 'Diferenças no acesso às tecnologias podem refletir desigualdades econômicas, territoriais e sociais.',
        'imagem' => 'assets/img/humanas_grafico_60.svg',
    ],

        //Ciências da Natureza

    [
        'id' => 61,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'A fotossíntese realizada por plantas utiliza principalmente:',
        'alternativas' => [
            'Luz, água e gás carbônico para produzir matéria orgânica e liberar oxigênio.',
            'Oxigênio e proteínas para produzir água.',
            'Som e calor para produzir glicose.',
            'Nitrogênio e sal para produzir oxigênio.',
            'Apenas água e oxigênio.',
        ],
        'correta' => 0,
        'explicacao' => 'Na fotossíntese, plantas utilizam energia luminosa para transformar água e dióxido de carbono em matéria orgânica, liberando oxigênio.',
    ],
    [
        'id' => 62,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Um carro percorre 120 km em 2 horas, mantendo velocidade média constante. Sua velocidade média é:',
        'alternativas' => [
            '40 km/h.',
            '50 km/h.',
            '60 km/h.',
            '80 km/h.',
            '120 km/h.',
        ],
        'correta' => 2,
        'explicacao' => 'Velocidade média = distância ÷ tempo = 120 ÷ 2 = 60 km/h.',
    ],
    [
        'id' => 63,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'A água é formada por moléculas constituídas por:',
        'alternativas' => [
            'Dois átomos de hidrogênio e um de oxigênio.',
            'Um átomo de hidrogênio e dois de oxigênio.',
            'Dois átomos de carbono e um de oxigênio.',
            'Um átomo de carbono e quatro de hidrogênio.',
            'Dois átomos de oxigênio e dois de carbono.',
        ],
        'correta' => 0,
        'explicacao' => 'A fórmula H₂O indica dois átomos de hidrogênio e um átomo de oxigênio.',
    ],
    [
        'id' => 64,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Em uma cadeia alimentar, os produtores ocupam o primeiro nível trófico porque:',
        'alternativas' => [
            'Produzem matéria orgânica a partir de substâncias inorgânicas.',
            'Alimentam-se diretamente de outros animais.',
            'Dependem exclusivamente de consumidores.',
            'São sempre organismos decompositores.',
            'Não participam do fluxo de energia.',
        ],
        'correta' => 0,
        'explicacao' => 'Produtores, como plantas e algas, sintetizam matéria orgânica e sustentam os demais níveis tróficos.',
    ],
    [
        'id' => 65,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'Uma lâmpada de 100 W permanece ligada durante 5 horas. A energia consumida, em Wh, é:',
        'alternativas' => [
            '20 Wh.',
            '100 Wh.',
            '200 Wh.',
            '500 Wh.',
            '1 000 Wh.',
        ],
        'correta' => 3,
        'explicacao' => 'Energia = potência × tempo = 100 W × 5 h = 500 Wh.',
    ],
    [
        'id' => 66,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma solução apresenta pH igual a 2. Em comparação com uma solução de pH 7, ela é:',
        'alternativas' => [
            'Mais ácida.',
            'Mais básica.',
            'Neutra.',
            'Obrigatoriamente gasosa.',
            'Obrigatoriamente sólida.',
        ],
        'correta' => 0,
        'explicacao' => 'Na escala de pH, valores menores indicam maior acidez; pH 2 é ácido.',
    ],
    [
        'id' => 67,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'As vacinas contribuem para a proteção do organismo porque:',
        'alternativas' => [
            'Estimulam o sistema imunológico a desenvolver memória contra determinados agentes.',
            'Eliminam qualquer microrganismo imediatamente.',
            'Substituem todas as células de defesa.',
            'Impedem permanentemente qualquer infecção.',
            'Funcionam como antibióticos contra todos os vírus.',
        ],
        'correta' => 0,
        'explicacao' => 'Vacinas apresentam componentes que estimulam uma resposta imunológica e a formação de memória, preparando o organismo para futuros contatos.',
    ],
    [
        'id' => 68,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Um objeto de massa 2 kg sofre uma força resultante de 10 N. Pela segunda lei de Newton, sua aceleração é:',
        'alternativas' => [
            '2 m/s².',
            '5 m/s².',
            '8 m/s².',
            '10 m/s².',
            '20 m/s².',
        ],
        'correta' => 1,
        'explicacao' => 'Pela relação F = m·a, a = 10 ÷ 2 = 5 m/s².',
    ],
    [
        'id' => 69,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'A separação de uma mistura de água e areia pode ser realizada por:',
        'alternativas' => [
            'Filtração.',
            'Destilação fracionada obrigatoriamente.',
            'Fusão.',
            'Combustão.',
            'Sublimação.',
        ],
        'correta' => 0,
        'explicacao' => 'A filtração separa um sólido insolúvel de um líquido utilizando uma barreira porosa.',
    ],
    [
        'id' => 70,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'O desmatamento pode reduzir a biodiversidade de uma região porque:',
        'alternativas' => [
            'Pode destruir habitats e reduzir as condições de sobrevivência de diversas espécies.',
            'Aumenta sempre o número de habitats disponíveis.',
            'Elimina apenas organismos microscópicos.',
            'Não interfere nas relações ecológicas.',
            'Garante maior variedade de espécies.',
        ],
        'correta' => 0,
        'explicacao' => 'A perda de habitats pode reduzir populações e afetar relações ecológicas, contribuindo para a diminuição da biodiversidade.',
    ],
    [
        'id' => 71,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Um gráfico mostra que a distância percorrida por um ciclista aumenta proporcionalmente ao tempo. Nesse caso, o movimento apresenta:',
        'alternativas' => [
            'Velocidade constante.',
            'Velocidade sempre nula.',
            'Aceleração necessariamente negativa.',
            'Distância constante.',
            'Ausência de movimento.',
        ],
        'correta' => 0,
        'explicacao' => 'Quando a distância cresce proporcionalmente ao tempo, a inclinação do gráfico é constante, indicando velocidade constante.',
        'imagem' => 'assets/img/natureza_grafico_71.svg',
    ],
    [
        'id' => 72,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'A combustão de um combustível libera energia principalmente na forma de:',
        'alternativas' => [
            'Energia térmica e, em alguns casos, luminosa.',
            'Energia exclusivamente nuclear.',
            'Energia sonora apenas.',
            'Energia potencial gravitacional apenas.',
            'Energia elétrica obrigatoriamente.',
        ],
        'correta' => 0,
        'explicacao' => 'A combustão é uma reação exotérmica que libera energia, principalmente como calor e, dependendo do processo, luz.',
    ],
    [
        'id' => 73,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Em uma população de bactérias, algumas apresentam resistência a determinado antibiótico. Após seu uso, as bactérias resistentes sobrevivem em maior proporção. Esse fenômeno está relacionado à:',
        'alternativas' => [
            'Seleção natural.',
            'Fotossíntese.',
            'Deriva continental.',
            'Evaporação.',
            'Digestão mecânica.',
        ],
        'correta' => 0,
        'explicacao' => 'O antibiótico exerce pressão seletiva, favorecendo a sobrevivência e reprodução das bactérias que já apresentam resistência.',
    ],
    [
        'id' => 74,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Um espelho plano forma uma imagem que, em relação ao objeto, é:',
        'alternativas' => [
            'Virtual, direita e de mesmo tamanho.',
            'Real e sempre maior.',
            'Real e invertida verticalmente.',
            'Virtual e sempre menor.',
            'Real e sempre menor.',
        ],
        'correta' => 0,
        'explicacao' => 'Em espelhos planos, a imagem é virtual, direita, possui o mesmo tamanho do objeto e apresenta simetria em relação ao plano do espelho.',
    ],
    [
        'id' => 75,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2020,
        'pergunta' => 'O processo de reciclagem do alumínio contribui para a sustentabilidade porque:',
        'alternativas' => [
            'Permite reaproveitar o material e pode reduzir a necessidade de produzir alumínio a partir do minério.',
            'Impede qualquer forma de poluição.',
            'Transforma alumínio em água.',
            'Elimina a necessidade de coleta seletiva.',
            'Produz minério novo.',
        ],
        'correta' => 0,
        'explicacao' => 'A reciclagem permite recuperar o metal e reduzir parte do consumo de matérias-primas e energia associados à produção primária.',
    ],
    [
        'id' => 76,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'A presença de clorofila nas folhas está diretamente relacionada à:',
        'alternativas' => [
            'Captação de energia luminosa para a fotossíntese.',
            'Produção de anticorpos.',
            'Digestão de proteínas em animais.',
            'Formação de ossos.',
            'Produção de sangue.',
        ],
        'correta' => 0,
        'explicacao' => 'A clorofila é um pigmento que absorve luz e participa das etapas fotoquímicas da fotossíntese.',
    ],
    [
        'id' => 77,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2023,
        'pergunta' => 'Em um circuito simples, a corrente elétrica passa por uma lâmpada conectada a uma fonte. Se o circuito for aberto, a lâmpada:',
        'alternativas' => [
            'Deixa de conduzir corrente e se apaga.',
            'Brilha mais intensamente.',
            'Passa a funcionar sem fonte.',
            'Gera energia infinita.',
            'Mantém necessariamente a mesma corrente.',
        ],
        'correta' => 0,
        'explicacao' => 'Um circuito aberto interrompe o caminho da corrente elétrica, impedindo o funcionamento da lâmpada.',
    ],
    [
        'id' => 78,
        'area' => 'Ciências da Natureza',
        'materia' => 'Química',
        'prova' => 'ENEM',
        'ano' => 2022,
        'pergunta' => 'Em um gráfico de aquecimento, a temperatura de uma substância permanece constante durante determinado intervalo enquanto ela recebe energia. Esse trecho pode indicar:',
        'alternativas' => [
            'Uma mudança de estado físico.',
            'Ausência total de energia.',
            'Redução obrigatória da massa.',
            'Formação de um novo elemento químico.',
            'Interrupção da transferência de calor.',
        ],
        'correta' => 0,
        'explicacao' => 'Durante mudanças de estado de uma substância pura, a energia recebida pode ser utilizada na transformação das interações entre partículas, mantendo a temperatura constante.',
        'imagem' => 'assets/img/natureza_grafico_78.svg',
    ],
    [
        'id' => 79,
        'area' => 'Ciências da Natureza',
        'materia' => 'Biologia',
        'prova' => 'ENEM',
        'ano' => 2021,
        'pergunta' => 'Em uma teia alimentar, os decompositores são importantes porque:',
        'alternativas' => [
            'Decompõem matéria orgânica e participam da reciclagem de nutrientes no ambiente.',
            'Produzem toda a energia do ecossistema.',
            'Impedem a circulação de matéria.',
            'Alimentam-se somente de organismos vivos.',
            'Substituem os produtores na fotossíntese.',
        ],
        'correta' => 0,
        'explicacao' => 'Fungos e bactérias decompositoras transformam matéria orgânica, contribuindo para a disponibilização de nutrientes no ambiente.',
    ],
    [
        'id' => 80,
        'area' => 'Ciências da Natureza',
        'materia' => 'Física',
        'prova' => 'ENEM',
        'ano' => 2024,
        'pergunta' => 'Uma residência utiliza painéis solares para transformar energia da radiação solar em energia elétrica. Essa tecnologia está relacionada ao uso de:',
        'alternativas' => [
            'Energia solar fotovoltaica.',
            'Energia nuclear de fissão.',
            'Energia geotérmica exclusivamente.',
            'Energia química de combustíveis fósseis.',
            'Energia sonora.',
        ],
        'correta' => 0,
        'explicacao' => 'Painéis fotovoltaicos convertem diretamente a energia da radiação solar em energia elétrica.',
        'imagem' => 'assets/img/natureza_solar_80.svg',
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

    <!-- LOGO DA ESCOLA -->
    <a
            href="index.php?pagina=inicio"
            class="logo-escola-header"
            aria-label="Escola Estadual Maria Luiza Miranda Bastos"
    >
        <img
                src="imagens-footer/logo-escola.png"
                alt="Logo da Escola Estadual Maria Luiza Miranda Bastos"
        >
    </a>


    <!-- LOGO ESTUDAÍ -->
    <div class="logo">

        <div class="logo-icon">
            ✓
        </div>

        <div>
            <strong>estudaí</strong>
            <span>preparação que transforma</span>
        </div>

    </div>


    <!-- MENU -->
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


    <!-- ÁREA DIREITA -->
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

<footer class="footer">

    <div class="footer-topo"></div>

    <div class="footer-conteudo">

        <!-- ==================================================
             LOGO + INFORMAÇÕES DA ESCOLA
        =================================================== -->

        <div class="footer-escola">

            <div class="footer-logo-escola">

                <img
                        src="imagens-footer/logo-escola.png"
                        alt="Escola Estadual Maria Luiza Miranda Bastos"
                >

            </div>

            <div class="footer-dados">

                <strong>
                    Escola Estadual Maria Luiza Miranda Bastos
                </strong>

                <span>
                    Rua São José do Cuti, 60 - Planalto, Belo Horizonte - MG
                </span>
f
                <span>
                    31720-370
                </span>

                <b>
                    Contato
                </b>

                <a href="tel:+553134437171">
                    (31) 3443-7171
                </a>
            </div>

            <p class="footer-orientador">
                Orientador:
                <a
                        href="https://www.instagram.com/jjoelccunha?stkn=MTBibzh4bjNmdTNydg=="
                        target="_blank"
                        rel="noopener noreferrer"
                >
                    Joel Cunha
                </a>
            </p>

        </div>


        <!-- ==================================================
             FERRAMENTAS
        =================================================== -->

        <div class="footer-ferramentas">

            <div class="footer-linha"></div>

            <div class="footer-ferramentas-conteudo">

                <strong>
                    Ferramentas
                </strong>

                <a href="?pagina=inicio">
                    Início
                </a>

                <a href="?pagina=questoes">
                    Simulado ENEM
                </a>

                <a href="?pagina=simulados">
                    Exercícios para treino
                </a>

                <a href="?pagina=simulados">
                    Simulado por área
                </a>

            </div>

        </div>


        <!-- ==================================================
             AUTORIA
        =================================================== -->

        <div class="footer-autoria">

            De autoria das alunas:

            <a
                    href="https://www.instagram.com/sol.cgarcia?stkn=MThsZTJ0bmZld25scg%3D%3D&utm_source=qr"
                    target="_blank"
                    rel="noopener noreferrer"
            >
                Sofia Garcia
            </a>,

            <a
                    href="https://www.instagram.com/eaninika?stkn=MXJ6YTRnYmpkZWZlYQ=="
                    target="_blank"
                    rel="noopener noreferrer"
            >
                Nicole Kalil
            </a>

            e

            <a
                    href="https://www.instagram.com/031._vitoria?stkn=MTdramRqYTd5enJicQ=="
                    target="_blank"
                    rel="noopener noreferrer"
            >
                Vitória Isabelly
            </a>

        </div>


        <!-- ==================================================
             LOGOS DO LADO DIREITO
        =================================================== -->

        <div class="footer-logos">

            <!-- GMAIL -->

            <a
                    href="mailto:"
                    target="_blank"
                    class="footer-logo-link"
                    aria-label="E-mail"
            >

                <img
                        src="imagens-footer/logo-gmail.png"
                        alt="Gmail"
                >

            </a>


            <!-- ENEM -->

            <a
                    href="https://www.gov.br/inep/pt-br/areas-de-atuacao/avaliacao-e-exames-educacionais/enem/provas-e-gabaritos"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="footer-logo-link"
                    aria-label="ENEM - Provas e Gabaritos"
            >

                <img
                        src="imagens-footer/logo-enem.png"
                        alt="ENEM"
                >

            </a>


            <!-- 40 ANOS -->

            <a
                    href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="footer-logo-link"
                    aria-label="Escola Estadual Maria Luiza Miranda Bastos"
            >

                <img
                        src="imagens-footer/logo-escola.png"
                        alt="40 anos da Escola Estadual Maria Luiza Miranda Bastos"
                >

            </a>

        </div>

    </div>



</footer>


<script src="script.js"></script>

</body>
</html>