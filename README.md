# Refatorando na pr√°tica.

### :fire: Projeto que iremos refatorar.

##### Compainha de atores que saiam para apresentar sua pe√ßas.

##### Os Clientes solicitar√£o algumas pe√ßas e a compainha ira cobrar desses clientes com base no:
- Numero de espectadores
- Tipo pe√ßa encenada
##### Tipos de pe√ßas encenadas atualmente:
- Com√©dia
- Trag√©dia

##### A compainha dar√° creditos por volume de pessoas assistindo.

#### Padrıes de refatoraÁ„o utilizados:
- Extract function (Extrair funÁ„o)
- Replace Temp with Query (Substituir vari·vel tempor·ria por consulta)
- Inline Variable (Internalizar vari·vel)
- Change Function Declaration (Mudar declaraÁ„o de funÁ„o)
- Split Loop (Dividir laÁo)

### :fire: Setup
- Apenas rodar o servidor php
```
$ php -S 0.0.0.0:8000
```

- Caso tenha problemas com a classe *NumberFormatter* dela n„o ser encontrada sÛ baixar a lib:
```
sudo apt-get install php7.4-intl
```