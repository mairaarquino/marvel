# Lista de Personagens/Quadrinhos

## Como instalar?
Para instalar as dependências:
       `composer update`
       `npm install`
   
   Para rodar localmente: `php artisan serve`
   
   Estará disponível em: http://127.0.0.1:8000/
   

## Tela Principal
![](https://github.com/mairaarquino/marvel/blob/master/public/images/Screenshot_4.png)

## Descrição do personagem
![](https://github.com/mairaarquino/marvel/blob/master/public/images/Screenshot_1.png)

## Descrição do quadrinho selecionado
![](https://github.com/mairaarquino/marvel/blob/master/public/images/Screenshot_2.png)

## Rotas

/ - Listagem de todos os personagens

/search/{name} - Pesquisar personagem por nome

/character/{id} - Visualizar detalhes do personagem

/comics/{id} - Visualizar detalhes do quadrinho
