# Sistema ordens de serviço para oficina mecânica

## Dependências

* PHP >= 7.1.3
* MySQL Server >= 5.5.54
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
 
## Layout

O sistema utiliza o layout de painel de controle [AdminLTE](https://adminlte.io/), sua documentação pode ser encontrada [aqui](https://adminlte.io/docs/2.4/installation).

## Configuração

Após clonar o projeto, com o terminal aberto na pasta do projeto, execute o comando:

```composer install --no-scripts```

Renomeie então o arquivo:

```.env.example```

para

```.env```

Dentro do arquivo .env edite os campos para que fiquem como os demonstrados abaixo:

```DB_CONNECTION=mysql```

```DB_HOST=127.0.0.1```

```DB_PORT=3306```

```DB_DATABASE=oficinamecanica```

```DB_USERNAME=root```

```DB_PASSWORD=1234```

Obs: No lugar de "root" e "1234" coloque o usuário e a senha atribuidos na instalação do seu MySQL.

Crie então uma nova chave para a aplicação com o comando:

```php artisan key:generate```

Crie então no MySQL um BD (banco de dados) chamado "oficinamecanica" (caso deseje utilizar outro nome modifique também no DB_DATABASE).

>Obs: O Laravel possui definido como codificação de caracteres padrão o formato ```utf8mb4_unicode_ci```

Em seguida, no terminal aberto na pasta do projeto, execute o comando para criação das tabelas:

```php artisan migrate``` 

Pronto! Agora, para executar o sistema, utilize o comando:

```php artisan serve```

No navegador pode acessar o sistema através do endereço:

```http://127.0.0.1:8000```

ou então:

```localhost:8000```

Para acesso utilize:

Nome: ```admin```

Senha: ```admin123```
