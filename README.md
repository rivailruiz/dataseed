
# dataseed - teste

## Instalação 

### 1. Clonar o projeto


### 2. Configure as variáveis de ambiente
*Na **raiz do projeto**, crie o arquivo .env; Para facilitar eu já criei um example. Rode o comando para copiar e altere apenas o ip do host (adicionando o seu ip local. Obs: não pode ser 127.0.0.1 ou 0.0.0.0)

```bash
cp .env_example .env
```


### 4. Instalando as dependências e configurando a API
*4.1 Instale as dependências executando o comando na **raiz do projeto**:*
```bash
composer install
```


### 5. Execute o docker

```bash
docker-compose up -d --build
```