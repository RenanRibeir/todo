# Meu primeiro projeto Laravel

Este é meu primeiro projeto solo em Laravel. O objetivo principal é estudar e aplicar conceitos avançados do Laravel, como **WebSockets**, **Jobs**, **Filas** e outras funcionalidades práticas da framework. A ideia é aprender a desenvolver soluções robustas e escaláveis utilizando essas tecnologias.

Conceitos aplicados:

-   [ ] websocket
-   [x] middleware
-   [x] laravel scout
-   [ ] jobs
-   [ ] filas
-   [ ] cache
-   [ ] telemetria: horizon e telescope

## Diagrama do banco de dados atual

![Diagrama do Banco de Dados](./doc/todo%20diagram.png)

## Como rodar o projeto

1. Clone o repositório:

```bash
git clone https://github.com/usuário/meu-primeiro-projeto-laravel.git
```

2. Instale as dependências:

```bash
cd meu-primeiro-projeto-laravel
composer install
```

3. Configure o ambiente:

```bash
   Copie o arquivo .env.example para .env e configure as variáveis de ambiente.
```

4. Gere as chaves do aplicativo:

```bash
   php artisan key:generate
```

5. Execute as migrações:

```bash
   php artisan migrate
```

6. Para rodar o servidor localmente:

```bash
   php artisan serve
```
