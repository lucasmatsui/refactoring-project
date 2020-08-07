# Refatorando na pratica.

### :fire: Projeto que iremos refatorar.

##### Compainha de atores que saiam para apresentar sua pecas.

##### Os Clientes solicitarao algumas pecas e a compainha ira cobrar desses clientes com base no:
- Numero de espectadores
- Tipo peca encenada
##### Tipos de pecas encenadas atualmente:
- Comedia
- Tragedia

##### A compainha dara creditos por volume de pessoas assistindo.

#### Padrões de refatoração utilizados:
- Extract function (Extrair função)
- Replace Temp with Query (Substituir variável temporária por consulta)
- Inline Variable (Internalizar variável)
- Change Function Declaration (Mudar declaração de função)
- Split Loop (Dividir laço)

### :fire: Setup
- Apenas rodar o servidor php
```
$ php -S 0.0.0.0:8000
```

- Caso tenha problemas com a classe *NumberFormatter* dela não ser encontrada só baixar a lib:
```
sudo apt-get install php7.4-intl
```
