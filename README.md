# Refatorando na prática.

### :fire: Projeto que iremos refatorar.

##### Compainha de atores que saiam para apresentar sua peças.

##### Os Clientes solicitarão algumas peças e a compainha ira cobrar desses clientes com base no:
- Numero de espectadores
- Tipo peça encenada
##### Tipos de peças encenadas atualmente:
- Comédia
- Tragédia

##### A compainha dará creditos por volume de pessoas assistindo.

#### Padr�es de refatora��o utilizados:
- Extract function (Extrair fun��o)
- Replace Temp with Query (Substituir vari�vel tempor�ria por consulta)
- Inline Variable (Internalizar vari�vel)
- Change Function Declaration (Mudar declara��o de fun��o)
- Split Loop (Dividir la�o)

### :fire: Setup
- Apenas rodar o servidor php
```
$ php -S 0.0.0.0:8000
```

- Caso tenha problemas com a classe *NumberFormatter* dela n�o ser encontrada s� baixar a lib:
```
sudo apt-get install php7.4-intl
```