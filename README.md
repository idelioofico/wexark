# Pastel TI



## API para gerenciamento de pedidos de uma pastelaria

Este projecto foi desenvolvido usando o framework Laravel na sua versão 8.x com uma base de dados SQLite.

**Requisitos:**

- PHP 7.3+
- [Composer][https://getcomposer.org/download/]

**Persistindo dados **

Para executar o projecto, primeiro deverá [configurar a base de dados][https://laravel.com/docs/4.2/database] a sua preferência (SQLite, PostgreSQL, MySQL) . 

De seguida, usando a linha de comando, navegue até ao directório do projecto e excute:

```shell
php artisan migrate --seed
```

De seguida, execute o projecto através do comando para correr na maquina local:

```shell
php artisan serve
```



### Endpoints



#### **Cliente**: Listar, Cadastrar, Actualizar e Apagar clientes



**Retornar todos os clientes:**

- URL:

  ```
  GET /api/clientes    exemplo: https://dominio.test/api/clientes
  ```

- Resposta: Array JSON da lista de clientes

  

**Cadastrar novo cliente:**

- URL: 

  ```
  POST /api/clientes    exemplo: https://dominio.test/api/clientes
  ```

- Parametros:

| Campo           | Obrigatório | Descrição                                         |
| --------------- | ----------- | ------------------------------------------------- |
| nome            | sim         | texto ,deve conter no máximo 100 caracteres       |
| email           | sim         | texto,deve conter no máximo 40 caracteres         |
| telefone        | sim         | texto, deve conter no máximo 15 caracteres        |
| data_nascimento | não         | data(Y-m-d)                                       |
| endereco        | sim         | texto,  deve conter no máximo 200 caracteres      |
| complemento     | não         | texto,  deve conter no máximo 100 caracteres      |
| bairro          | sim         | texto,  deve conter no máximo 100 caracteres      |
| cep             | sim         | texto, deve conter no máximo 4 caracteres numeros |
| data_cadastro   | sim         | data(Y-m-d)                                       |

- Resposta: Array JSON dos dados do cliente cadastrado

  

**Retornar um Cliente específico:**

- URL: 

  ```
  GET /api/clientes/{id}  exemplo: https://dominio.test/api/clientes/1
  ```

  

- Resposta: Array JSON do Cliente

  

**Actualizar  cliente:**

- URL: 

  ```
  PUT /api/clientes/{id}  exemplo: https://dominio.test/api/clientes/2
  ```

- Parametros:

| Campo           | Obrigatório | Descrição                                         |
| --------------- | ----------- | ------------------------------------------------- |
| nome            | não         | texto ,deve conter no máximo 100 caracteres       |
| email           | não         | texto,deve conter no máximo 40 caracteres         |
| telefone        | não         | texto, deve conter no máximo 15 caracteres        |
| data_nascimento | não         | data(Y-m-d)                                       |
| endereco        | não         | texto,  deve conter no máximo 200 caracteres      |
| complemento     | não         | texto,  deve conter no máximo 100 caracteres      |
| bairro          | não         | texto,  deve conter no máximo 100 caracteres      |
| cep             | não         | texto, deve conter no máximo 4 caracteres numeros |
| data_cadastro   | não         | data(Y-m-d)                                       |

- Resposta: Boolean

  

**Apagar cliente**

- URL: 

  ```
  Delete /api/clientes/{id}  exemplo: https://dominio.test/api/clientes/2
  ```

- Resposta: Boolean





#### **Pastel**: Listar, Cadastrar, Actualizar e Apagar 



**Retornar todos os pasteis:**

- URL:

  ```
  GET /api/pasteis  exemplo: https://dominio.test/api/pasteis
  ```

- Resposta: Array JSON da lista dos pasteis

  

**Cadastrar novo Pastel:**

- URL: 

  ```
  POST /api/pasteis  exemplo: https://dominio.test/api/pasteis
  ```

- Parametros:

| Campo | Obrigatório | Descrição                                   |
| ----- | ----------- | ------------------------------------------- |
| nome  | sim         | texto ,deve conter no máximo 100 caracteres |
| preco | sim         | numerico                                    |
| foto  | sim         | imagem                                      |

- Resposta: Array JSON do dados cadastrados

  

**Retornar Pastel pelo ID:**

- URL: 

  ```
  GET /api/pasteis/{id} exemplo: https://dominio.test/api/pasteis/2
  ```

  

- Resposta: Array JSON do dados do Pastel

  

**Actualizar  Pastel:**

- URL: 

  ```
  PUT /api/pasteis/{id}  exemplo: https://dominio.test/api/pasteis/2
  ```

- Parametros:

| Campo | Obrigatório | Descrição                                   |
| ----- | ----------- | ------------------------------------------- |
| nome  | não         | texto ,deve conter no máximo 100 caracteres |
| preco | não         | numerico                                    |
| foto  | não         | imagem                                      |

- Resposta: Boolean

  

**Apagar Pastel**

- URL: 

  ```
  Delete /api/pasteis/{id} exemplo: https:://dominio.test/api/pasteis/2
  ```

- Resposta: Boolean



#### **Pedido**: Listar, Registar, Apagar



**Retornar todos os pedidos:**

- URL:

  ```
  GET /api/pedidos  exemplo: https://dominio.test/api/pedidos
  ```

- Resposta: Array JSON da lista dos pedidos

  

**Registar Pedido:**

```
Nota: Após registar um pedido é enviado um email de forma síncrona para o cliente com os detalhes do pedido, por isso é importante ter o serviço de email devidamente configurado
```



- URL: 

  ```
  POST /api/pedidos  exemplo: https://dominio.test/api/pedidos
  ```

- Parametros:

| Campo        | Obrigatório | Descrição                                                    |
| ------------ | ----------- | ------------------------------------------------------------ |
| cliente_id   | sim         | numérico, chave estrangeira                                  |
| items        | sim         | array de items do pedido composto por **pastel_id, quantidade** |
| data_criacao | sim         | data(Y-m-d)                                                  |

Exemplo de paramtros:

```json
{
	"cliente_id":1,
	"items":[
		{"pastel_id":3,
		 "quantidade":3
		},
		{
			"pastel_id":4,
			"quantidade":2
		},
	],
	"data_criacao":"2021-05-27"
}
```



- Resposta: Array JSON dos dados Pedido registado

  

**Retornar Pedido pelo ID:**

URL: 

- ```
  GET /api/pedidos/{id} exemplo: https://dominio.test/api/pedidos/2
  ```

  

- Resposta: Array JSON   dos dados do Pedidol, caso exista

  

**Apagar Pedido**

- URL: 

  ```
  Delete /api/pedidos/{id} exemplo: https:://dominio.test/api/pedidos/2
  ```

- Resposta: Boolean








Autor (Idélio Djalo Ofiço)[https://www.linkedin.com/in/id%C3%A9lio-ofi%C3%A7o-72787a115/] :heart:

