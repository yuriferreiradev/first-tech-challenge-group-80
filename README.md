# Event Storming do Projeto

Para visualizar o Event Storming do projeto, clique no link abaixo:

[Diagrama Event Storming](https://miro.com/app/board/uXjVKVoUR5g=)

### Passo a passo

#### Acessar a pasta
```sh
cd first-tech-challenge-group-80
```
#### Gerar arquivo de configuração de ambiente:
```sh
cp .env.example .env
```
#### Buildar os container do docker
```sh
docker-compose up -d --build
```
#### Acessar o container da aplicação:
```sh
docker exec -it app-laravel bash
```
#### Gerar chave de aplicação (Dentro do container):
```sh
php artisan key:generate
```
#### Seed para o banco de dados com dados inicais (Dentro do container):
```sh
php artisan migrate --seed
```

### Detalhes

#### Para acessar a documentação:
```sh
http://localhost:8000/docs
```
Esta documentação não tem finalidade de demonstrar as requisições funcionando, somente a nível de documentação de parâmetros, endpoint e etc. 

### Autenticação:

#### Importante:
Após a autenticação, todas as requisições subsequentes devem incluir o token de autenticação no cabeçalho Authorization usando o formato Bearer {token}. Este token será retornado na resposta da request de login.

```sh
http://localhost:8000/api/auth/login
```
Com o seguinte corpo:
```sh
{
  "document": "000.000.000-00"
}
```
Obs: "000.000.000-00" é o CPF do usuário de testes criado

Ou então criar um usuário, atráves do endpoint:

(Verbo POST)

```sh
http://localhost:8000/api/clients
```

Com o seguinte corpo:
```sh
{
  "name": "John Doe",
  "document": "999.999.999-99"
}
```
