# Monitoria

Descrição do projeto

## Sumário

* [Monitoria](#monitoria)
  * [Sumário](#sumário)
  * [Instalação](#instalação)
     * [Baixar código fonte](#baixar-código-fonte)
     * [Gerar imagem docker local](#gerar-imagem-docker-local)
     * [Iniciar a stack](#iniciar-a-stack)
     * [Banco de Dados](#banco-de-dados)
     * [Servidor web](#servidor-web)
  * [Qualidade de Código](#qualidade-de-código)
     * [PHP Code Sniffer](#php-code-sniffer)
     * [PHP Code Beautifier and Fixer](#php-code-beautifier-and-fixer)
     * [PHP Unit](#php-unit)
  * [Comandos docker úteis](#comandos-docker-úteis)
     * [Entrar dentro do container](#entrar-dentro-do-container)
  * [Acesso aos ambientes](#acesso-aos-ambientes)
     * [Testes](#testes)
     * [Produção](#produção)


## Instalação

### Baixar código fonte


Entrando no diretório e baixando:

```bash
mkdir ~/apps
cd ~/apps
git clone git@git.dds.ufvjm.edu.br:prograd/monitoria.git
```


### Gerar imagem docker local

Para criar a imagem docker a aplicação locamente para ambiente de desenvolvimento:

```bash
./build.sh
```

### Iniciar a stack

Para iniciar a aplicação:

```bash
./run.sh
```

* Verificar se o arquivo de configuração .env foi criado, se não copiar o env.sample para .env:


### Banco de Dados

* O processo de migração do flaway iniciará ao construir o ambiente

* Para rodar manualmente a migração, acesse o conteiner da aplicação e execute:

```bash
# entrar no container
docker exec -it apache-monitoria bash

# executar
./database/migrate.sh

```

* Os arquivos de atualização de estrutura do banco devem ser colocados no diretório abaixo seguindo a numeração 
de versionamento.

```bash
./database/flyway/sql
```

### Servidor web

Criar o arquivo de variáveis de ambiente local:

```bash
cd ~/apps/monitoria
cp .env.example .env
```

Substituir os valores de:

```php
WEBPORT=8098
DRIVER=mysql
HOST=dbase
PORTA=3306
BANCO=gestao_monitorias
USUARIO=monitoria
SENHA=3CRmIDZAgNXa9h5
```

Execute novamente o scrip abaixo para corrigir as permissões dos diretórios:

```bash
./run.sh
```


## Qualidade de Código

### PHP Code Sniffer

O [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) é uma ferramenta de validação de qualidade de código PHP.

Dentro do servidor web, executar o script:

```bash
./phpcs.sh
```

### PHP Code Beautifier and Fixer

Alguns erros apresentados, podem ser corrigidos automaticamente através da ferramenta [PHP Code Beautifier and Fixer](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Fixing-Errors-Automatically).

Dentro do servidor web, executar o script:

```bash
./phpcbf.sh
```

### PHP Unit

A ferramenta de testes automatizados utilizada é o [PHP Unit](https://phpunit.de).

Executar os testes:

```bash
./phpunit.sh
```

Um relatório de cobertura de código será gerado na pasta **coverage**. Abrir o arquivo `index.html` com um navegador.

## Comandos docker úteis

### Entrar dentro do container

Entrando no container de nome **laravel-appgin**:

```bash
docker exec -it apache-monitoria bash
```

## Acesso aos ambientes

### Testes

* Servidor web: [appgin.apps-teste.ufvjm.edu.br](https://monitoria.apps-teste.ufvjm.edu.br)
* PHPMyAdmin: [pma-appgin.apps-teste.ufvjm.edu.br](https://pma-monitoria.apps-teste.ufvjm.edu.br)

### Produção

* Servidor web: [selecao.prppg.ufvjm.edu.br](https://monitoria.prograd.ufvjm.edu.br)
* PHPMyAdmin: [pma-selecao.prppg.ufvjm.edu.br](https://pma-monitoria.prograd.ufvjm.edu.br)
