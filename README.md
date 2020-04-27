--primeiro clonar o projeto

git clone https://github.com/jeysonlr/api-ptg-dengue.git

-- entrar na pasta dengue

cd dengue

-- rodar o comando

docker-compose up -d --build

-- depois o comando

docker exec -it -u 0 dengue_php bash

-- depois navegue ate a pasta dengue, caso ja esteja nela rode o comando 

composer install