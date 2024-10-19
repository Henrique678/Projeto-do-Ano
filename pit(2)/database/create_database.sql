drop database if exists pit;

create database pit;

use pit;

-- --------------------------------------------------------

--
-- Estrutura para tabela usuarios
--

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios (
  idUser int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(160) NOT NULL,
  email varchar(160) UNIQUE NOT NULL,
  senha varchar(60)
) ENGINE=InnoDB;


--
-- Despejando dados para a tabela usuarios
--

INSERT INTO usuarios (idUser, name, email, senha) VALUES
(18, 'jair', 'jair@gmail.com', '1234'),
(17, 'Matheus', 'matbraga14@gmail.com', '1234');
COMMIT;

-- --------------------------------------------------------

--
-- Estrutura para tabela places
--

DROP TABLE IF EXISTS places;
CREATE TABLE IF NOT EXISTS places (
  idPlace int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome varchar(60) NOT NULL,
  categoria varchar(40),
  descricao varchar(600),
  endereco varchar(60) NOT NULL,
  numero int NOT NULL,
  bairro varchar(60),
  cidade varchar(60),
  cep char(9) ,
  telefone char(14),
  emailPlace varchar(50),
  hr_segunda char(11),
  hr_terca char(11),
  hr_quarta char(11),
  hr_quinta char(11),
  hr_sexta char(11),
  hr_sabada char(11),
  hr_domingo char(11),
  site varchar(60),
  insta varchar(50),
  img varchar(300)
) ENGINE=InnoDB;


--
-- Despejando dados para a tabela places
--

INSERT INTO places (idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, hr_segunda, hr_terca, hr_quarta, hr_quinta, hr_sexta, hr_sabada, hr_domingo, site, insta, img) VALUES
(1, 'Mercado Central', 'Comércio', 'Animado mercado indoor com alimentos, artesanato e souvenirs, além de bares e restaurantes informais.', 'Av. Augusto de Lima', 744, 'Centro', 'Belo Horizonte', '30190-922', '(31) 3274-9434', 'faleconosco@mercadocentral.com.br', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-18:00', '08:00-13:00', 'https://mercadocentral.com.br', '@mercadocentralbh', 'https://mercadocentral.com.br/sitenovo/wp-content/uploads/2024/01/FACHADA-DA-PINTURA-NOVA-37-scaled.jpg'),
(2, 'Praça do Papa', 'praça', 'A Praça do Papa é um ponto turístico localizado em Belo Horizonte, Minas Gerais, Brasil. Ela é assim chamada em homenagem ao Papa João Paulo II, que visitou a cidade em 1980. A praça fica no alto de u', 'Av. Agulhas Negras', 0, 'mangabeiras', 'Belo Horizonte', '30210-060', '(31) 35551100', 'cgpd@cmbh.mg.gov.br', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', 'https://www.pracadopapa.com.br', NULL, 'https://upload.wikimedia.org/wikipedia/commons/e/ef/Praca_do_Papa%2C_Belo_Horizonte_%28cropped%29.jpg'),
(3, 'Praça da Estação', 'praça', 'Conhecida como Praça da Estação, a Praça Rui Barbosa faz parte da Zona Cultural Praça da Estação, que também contempla o Museu de Artes e Ofícios, Casa do Conde de Santa Marinha, Centro Cultural da Un', 'Av. dos Andradas', 201, 'Centro', 'Belo Horizonte', '30110-009', ' (31) 35551100', 'cgpd@cmbh.mg.gov.br', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', 'https://portalbelohorizonte.com.br/filmcommission/cenarios-d', NULL, 'https://www.hojeemdia.com.br/image/policy:1.822039.1671229484:1671229484/image.jpg?w=1280&'),
(4, 'Lagoa da Pampulha', 'Lagoa', 'A Lagoa da Pampulha é uma lagoa situada na região da Pampulha no município de Belo Horizonte no Estado de Minas Gerais. Faz parte de um complexo de monumentos arquitetônicos concebidos por Oscar Nieme', 'Av. Otacílio Negrão de Lima', 3128, 'São Luiz', 'Belo Horizonte', '31365-450', '(31) 3555-1100', 'cgpd@cmbh.mg.gov.br', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', 'https://pt.wikipedia.org/wiki/Lagoa_da_Pampulha', '@lagoadapampulha.oficial', 'https://t3.ftcdn.net/jpg/05/47/79/54/360_F_547795445_ZsQZdQ5RyOXa1XrBWzUiuNBTxJguqMUa.jpg'),
(5, 'Praça da Liberdade', 'Praça', 'O complexo paisagistico e arquitetônico da Praça da Liberdade é uma síntese dos estilos que marcam a história de Belo Horizonte, e fica na região da Savassi, no encontro de quatro grandes avenidas: Bias Fortes, Brasil, Cristóvão Colombo e João Pinheiro.', 'Praça da Liberdade', 0, 'Funcionários', 'Belo Horizonte', '30140-010', '(31) 3516-7200', 'circuitoliberdade@fcs.mg.gov.br', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', 'http://circuitoliberdade.mg.gov.br/pt-br/circuito-liberdade/', '@pracadaliberdadebh', 'https://cdn.blablacar.com/wp-content/uploads/br/2024/04/05095336/bh-praca-da-liberdade-2.webp'),
(6, 'Mineirão', 'Estádio de Futebol', 'O Estádio Governador Magalhães Pinto, mais conhecido como Mineirão, é um estádio de futebol localizado em Belo Horizonte, Minas Gerais, onde o Cruzeiro Esporte Clube realiza seus jogos. Inaugurado em 1965, é o quinto maior estádio do Brasil, já tendo sediado cinco finais da Copa Libertadores, uma Copa Intercontinental e escolhido como uma das sedes da Copa do Mundo FIFA de 2014. Em 2003, foi tombado pelo Conselho Deliberativo do Patrimônio Cultural do Município de Belo Horizonte.', 'Av. Antônio Abrahão Caram', 1001, 'São José', 'Belo Horizonte', '31275-000', '(31) 3499-4333', 'atendimento@estadiomineirao.com.br', '07:00-22:00', '07:00-22:00', '07:00-22:00', '07:00-22:00', '07:00-22:00', '07:00-22:00', '07:00-22:00', 'https://mineirao.com.br', '@mineirao', 'https://www.cafebarao.com.br/wp-content/uploads/2021/01/Mineirao_1280x720px.jpg'),
(7, 'Parque das Mangabeiras', 'Parque', 'Localizado ao pé da Serra do Curral, patrimônio cultural de Belo Horizonte, o Parque das Mangabeiras Maurício Campos, projetado pelo paisagista Roberto Burle Marx, conserva em sua área de 2,4 milhões de m2, 59 nascentes do Córrego da Serra, que integra a Bacia do Rio São Francisco.', 'Av. José do Patrocínio Pontes', 580, 'Mangabeiras', 'Belo Horizonte', '30210-090', '(31) 3277-8277', 'mangaba@pbh.gov.br', NULL, '08:00-17:00', '08:00-17:00', '08:00-17:00', '08:00-17:00', '08:00-17:00', '08:00-17:00', 'https://prefeitura.pbh.gov.br/fundacao-de-parques-e-zoobotan', NULL, 'https://prefeitura.pbh.gov.br/sites/default/files/noticia/img/2017-06/15247728924_633b3bc065_k.jpg'),
(8, 'Palácio das Artes', 'Entreterimento', 'O Palácio das Artes, vinculado à Fundação Clóvis Salgado, é o maior centro de produção, formação e difusão cultural de Minas Gerais e um dos maiores da América Latina. Está localizado em Belo Horizonte e ocupa uma área 18.000 m² dentro do Parque Municipal Américo Renné Giannetti.', 'Av. Afonso Pena', 1537, 'Centro', 'Belo Horizonte', '30120-010', '(31) 3236-7400', 'https://fcs.mg.gov.br/contato/fale-conosco/', '09:00-22:00', '09:00-22:00', '09:00-22:00', '09:00-22:00', '09:00-22:00', '09:00-22:00', '09:00-22:00', 'https://fcs.mg.gov.br/espacos-culturais/palacio-das-artes/', '@palaciodasartes_', 'https://soubh.uai.com.br/uploads/place/image/1382/palacio-das-artes-20141013191744.jpg');

-- --------------------------------------------------------


--
-- Estrutura para tabela avaliacoes
--

DROP TABLE IF EXISTS avaliacoes;
CREATE TABLE IF NOT EXISTS avaliacoes (
  idPlace int PRIMARY KEY AUTO_INCREMENT,
  nota int 
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estrutura para tabela comentarios
--

DROP TABLE IF EXISTS comentarios;
CREATE TABLE IF NOT EXISTS comentarios (
  idComent int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  coment varchar(200) NOT NULL,
  datahora timestamp NOT NULL,
  fk_idUser int NOT NULL,
  foreign KEY (fk_idUser) references usuarios(fk_idUser)
) ENGINE=InnoDB;

--
-- Despejando dados para a tabela comentarios
--

INSERT INTO comentarios (idComent, coment, datahora, fk_idUser) VALUES
(142, 'agwrshwershwser', '2024-10-03 21:47:59', 0),
(141, 'n', '2024-10-03 21:45:25', 0),
(140, 'bom dia', '2024-10-03 21:45:14', 0),
(139, 'oi', '2024-10-03 21:45:07', 0),
(138, 'ola', '2024-10-02 00:38:26', 0),
(143, 'eswhwshw', '2024-10-03 21:58:23', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela favoritos
--

DROP TABLE IF EXISTS favoritos;
CREATE TABLE IF NOT EXISTS favoritos (
  idFav int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fk_idUser int NOT NULL,
  fk_idPlace int NOT NULL,
  foreign key (fk_idUser) references usuarios(idUser),
  foreign key (fk_idPlace) references places (idPlace)
) ENGINE=InnoDB;





