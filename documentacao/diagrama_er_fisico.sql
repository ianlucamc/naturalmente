-- CRIAÇÃO DO BANCO DE DADOS

CREATE TABLE Produtos (
                idProdutos INT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                preco DOUBLE PRECISIONS NOT NULL,
                validade DATE NOT NULL,
                descricao VARCHAR(100) NOT NULL,
                PRIMARY KEY (idProdutos)
);


CREATE TABLE Pessoa (
                idPessoa INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                senha VARCHAR(20) NOT NULL,
                cidade VARCHAR(50) NOT NULL,
                bairro VARCHAR(50) NOT NULL,
                rua VARCHAR(50) NOT NULL,
                numero INT NOT NULL,
                cep VARCHAR(8) NOT NULL,
                complemento VARCHAR(100),
                fone CHAR(11) NOT NULL,
                PRIMARY KEY (idPessoa)
);


CREATE TABLE Produtor (
                idPessoa INT NOT NULL,
                cnpj CHAR(14) NOT NULL,
                ie VARCHAR(100) NOT NULL,
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
                cpf CHAR(11) NOT NULL,
                rg VARCHAR(16) NOT NULL,
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
