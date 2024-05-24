# Event Storming do Projeto

Para visualizar o Event Storming do projeto, clique no link abaixo:

[Diagrama Event Storming](https://miro.com/app/board/uXjVKVoUR5g=)

### Passo a passo

#### Gerar arquivo de configuração de ambiente:
```sh
cp .env.example .env
```
#### Gerar chave de aplicação:
```sh
php artisan key:generate
```
#### Buildar os container do docker
```sh
docker-compose up -d --build

```
#### Seed para o banco de dados com dados inicais:
```sh
docker exec app-laravel php artisan db:seed
```

### Detalhes

#### Para acessar a documentação:
```sh
http://localhost:8000/docs
```
Esta documentação não tem finalidade de demonstrar as requisições funcionando, somente a nível de documentação de parâmetros, endpoint e etc. 

#### Autenticação:

Para relizar autenticação, é necessário disparar uma request para:
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
