<img src="assets/logo.png" />

## OpenTicket

Software livre para gestão de eventos criado e mantido pela comunidade PHPMG.

## License

The OpenTicket is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Configuração

Para configurar o projeto em ambiente local você pode fazer o clone deste projeto, 
utilizamos container docker como tecnologia então siga os comandos abaixo para começar a contribuir com o projeto.

### Copiando o .env.example
```
cp .env.example .env
```
### Suba o container
```
docker compose up -d
```
### Para entrar no container backend
```
docker exec -it open-ticket-backend sh
```
### Para entrar no container frontend
```
docker exec -it open-ticket-frontend sh
```
### instale as dependências
```
composer install
```
### Rode as migrations
```
php artisan migrate:install
```
### Swagger
```
http://localhost:8002/
```
## Para contribuir
Ao concluir o seu desenvolvimento suba sua branch para o repositório 
e abra uma PR para develop, assim que sua PR for aprovada estará liberado para merge,
sua contribuição irá entrar na release seguinte.
