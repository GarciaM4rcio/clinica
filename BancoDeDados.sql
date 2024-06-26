CREATE TABLE especialidade(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL,
    sigla CHAR(3) NOT NULL
) engine INNODB;

CREATE TABLE medico(
    id_medico INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    numero CHAR(10) NOT NULL,
    bairro VARCHAR(60) NOT NULL,
    cidade VARCHAR(80) NOT NULL,
    estado CHAR(2) NOT NULL,
    CRM VARCHAR(20) NOT NULL,
    salario DECIMAL(12,2) NOT NULL,
    celular VARCHAR(15) NOT NULL,
    cod_esp INTEGER REFERENCES especialidade(id)
   ) ENGINE INNODB;

CREATE TABLE paciente(
    id integer AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cep VARCHAR(8),
    endereco VARCHAR(100),
    numero CHAR(10),
    complemento VARCHAR(50),
    bairro VARCHAR(50),
    cidade VARCHAR(80),
    estado CHAR(2),
    cpf VARCHAR(11) NOT NULL,
    rg VARCHAR(9) NOT NULL,
    email VARCHAR(100)
    ) engine INNODB;

CREATE TABLE telefone(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(15) NOT NULL,
    id_paciente INTEGER REFERENCES paciente(id)
) engine INNODB;

CREATE TABLE funcao (
    id integer  AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100)
    ) engine INNODB;
        
CREATE TABLE enfermeiro(
    matricula integer AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    numero CHAR(10) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(80) NOT NULL,
    estado CHAR(2) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    rg VARCHAR(9) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    celular VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    salario numeric (12,2) NOT NULL,
    turno_trabalho varchar(15) NOT NULL,
    id_funcao integer REFERENCES função (id)
    ) engine INNODB;

INSERT INTO especialidade (descricao,sigla) 
VALUES 
    ('Cirurgião Cardíaco','CRC'),
    ('Cirurgião Geral','CRG'),
    ('Neurocirurgião','NCR');

INSERT INTO medico (nome,cpf,cep,endereco,numero,bairro,cidade,estado,CRM,salario,celular,cod_esp) 
VALUES 
    ('Camilla Costa','12345678','18215110','Rua das Acássias','231','Flores','Jolina','SP',
    'ATG14N216',35000,'99123456789','3'),
    ('Augusto Vieira','45678912','21527012','Rua Pitágoras','483','Cateto','Matelino','SP',
    'HUI65O148',31500,'99456132798','2'),
    ('Valdomiro Leme','78913245','12321486','Avenida Moraes Rosa','1531','Matelo','Varzea','SP',
    'UHJ56G189',33000,'99123456789','1');

INSERT INTO paciente (nome,cep,endereco,numero,complemento,bairro,cidade,estado,cpf,rg,email)
VALUES 
    ('José Aparecido','51654231','Avenida Rubens Santóro','10','casa','Vila Cubatão','Jonivile','MG','65498721','65498721','joseap@paciente.com'),
    ('Cristiano Ventura','46231645','Rua Gaules Jordan','475','ap 21','Jardim Ipes','Lutéro','SC','98654321','85123987','crisvent@paciente.com'),
    ('Vagner Paes','43129783','Rua Costa de Medeiros','362','bloco a ap10','Lago das Rosas','Volim','BH','58156984','58489541','vagnerpaes@paciente.com');

INSERT INTO telefone (numero,id_paciente)
VALUES
    ('9965498721',1),('9998754632',1),
    ('9985123987',2),('9985123987',2),
    ('9945898414',3),('9958945122',3);

INSERT INTO funcao (descricao)
VALUES 
    ('Cuidado'),
    ('Educação'),
    ('Coordenação');

INSERT INTO enfermeiro (nome,cep,endereco,numero,bairro,cidade,estado,cpf,rg,telefone,celular,email,salario, turno_trabalho,id_funcao) 
VALUES 
    ('André Torres','12345678','Rua das Flores','123','Centro','Cidade A','SP','12345678901','123456789','1112345678',
    '11987654321','andre@email.com',3500.00,'manhã',1),
    ('Carlos Santos','87654321','Avenida dos Ventos','456','Bairro Novo','Cidade B','RJ','98765432109','987654321',
    '2198765432','2112345678','carlos@email.com',3800.00,'noite',2),
    ('Maria Oliveira','54321678','Travessa das Árvores','789','Bairro Verde','Cidade C','MG','45678901234','456789012',
    '3134567890','3187654321','maria@email.com',3200.00,'tarde',3);