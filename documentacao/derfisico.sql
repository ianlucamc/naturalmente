
CREATE TABLE Estado (
                idEstado INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                sigla CHAR(2) NOT NULL,
                PRIMARY KEY (idEstado)
);


CREATE TABLE Cidade (
                idCidade INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                idEstado INT NOT NULL,
                PRIMARY KEY (idCidade)
);


CREATE TABLE Produtos (
                idProdutos INT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                preco DOUBLE PRECISIONS NOT NULL,
                validade DATE NOT NULL,
                descricao VARCHAR(240) NOT NULL,
                PRIMARY KEY (idProdutos)
);


CREATE TABLE Pessoa (
                idPessoa INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                senha VARCHAR(20) NOT NULL,
                bairro VARCHAR(50) NOT NULL,
                rua VARCHAR(50) NOT NULL,
                numero INT NOT NULL,
                cep VARCHAR(9) NOT NULL,
                complemento VARCHAR(100),
                fone CHAR(14) NOT NULL,
                celular CHAR(15) NOT NULL,
                idCidade INT NOT NULL,
                PRIMARY KEY (idPessoa)
);


CREATE TABLE Produtor (
                idPessoa INT NOT NULL,
                cnpj CHAR(18) NOT NULL,
                ie VARCHAR NOT NULL,
                PRIMARY KEY (idPessoa)
);


CREATE TABLE ItensProdutor (
                idItensProdutor INT AUTO_INCREMENT NOT NULL,
                idPessoa INT NOT NULL,
                idProdutos INT NOT NULL,
                PRIMARY KEY (idItensProdutor)
);


CREATE TABLE Cliente (
                idPessoa INT NOT NULL,
                cpf CHAR(14) NOT NULL,
                rg VARCHAR NOT NULL,
                PRIMARY KEY (idPessoa)
);


CREATE TABLE Venda (
                idVenda INT AUTO_INCREMENT NOT NULL,
                status BOOLEAN NOT NULL,
                dataPedido DATE NOT NULL,
                dataEntrega DATE NOT NULL,
                valorTotal DOUBLE PRECISIONS NOT NULL,
                idCliente INT NOT NULL,
                PRIMARY KEY (idVenda)
);


CREATE TABLE ItensVenda (
                idVenda INT NOT NULL,
                idItensProdutor INT NOT NULL,
                qtde INT NOT NULL,
                precoVendido DOUBLE PRECISIONS NOT NULL,
                PRIMARY KEY (idVenda, idItensProdutor)
);


ALTER TABLE Cidade ADD CONSTRAINT estado_cidade_fk
FOREIGN KEY (idEstado)
REFERENCES Estado (idEstado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Pessoa ADD CONSTRAINT cidade_pessoa_fk
FOREIGN KEY (idCidade)
REFERENCES Cidade (idCidade)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ItensProdutor ADD CONSTRAINT produtos_itensprodutor_fk
FOREIGN KEY (idProdutos)
REFERENCES Produtos (idProdutos)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Cliente ADD CONSTRAINT pessoa_cliente_fk
FOREIGN KEY (idPessoa)
REFERENCES Pessoa (idPessoa)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Produtor ADD CONSTRAINT pessoa_produtor_fk
FOREIGN KEY (idPessoa)
REFERENCES Pessoa (idPessoa)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ItensProdutor ADD CONSTRAINT produtor_itensprodutor_fk
FOREIGN KEY (idPessoa)
REFERENCES Produtor (idPessoa)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ItensVenda ADD CONSTRAINT itensprodutor_itensvenda_fk
FOREIGN KEY (idItensProdutor)
REFERENCES ItensProdutor (idItensProdutor)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Venda ADD CONSTRAINT cliente_venda_fk
FOREIGN KEY (idCliente)
REFERENCES Cliente (idPessoa)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ItensVenda ADD CONSTRAINT venda_itensvenda_fk
FOREIGN KEY (idVenda)
REFERENCES Venda (idVenda)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
