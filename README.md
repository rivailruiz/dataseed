
# dataseed - teste

## Instalação 

### 1. Clonar o projeto


```bash
git clone https://github.com/rivailruiz/dataseed.git
```

### 2. Configure as variáveis de ambiente
*Na **raiz do projeto**, crie o arquivo .env; Para facilitar eu já criei um example. Rode o comando para copiar e altere apenas o db_host (adicionando o seu ip local. Obs: não pode ser 127.0.0.1 ou 0.0.0.0). Para que o envio de email para recuperção de senha funcione, precisa configurar também as variaveis de SMTP no .env.

```bash
cp .env.example .env
```

### 5. Execute o docker

```bash
docker-compose up -d --build
```


### 4. Instalando as dependências
*4.1 Instale as dependências executando o comando na **raiz do projeto**:*
```bash
docker-compose run --rm php-fpm composer update  && docker-compose run --rm php-fpm composer install    
```


### 6. Rode o migration

```bash
docker-compose run --rm php-fpm php artisan migrate
```

### 6. Para rodar os testes

```bash
docker-compose run --rm php-fpm php artisan test
```

### Deixei um export de collection do postman na raiz do projeto para testes



