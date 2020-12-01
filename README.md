## Project specifications 

This is a small MintMe/USD indicator which uses [CoinGecko APi](https://www.coingecko.com/) and [MINTME API](https://www.google.com/search?channel=fs&client=ubuntu&q=API), it's based on current BTC/USD price.

It has two calulators, fist one for MINTME/USD and second one for USD/MINTME.

The project was built using laravel to handle back-end, vue to handle front-end stuff, reponsiveness was in charge of bootstrap.

## Installation

- configure .env file "run: cp .env.example .env"
- run: composer install
- run: npm install
- run: npm run dev
- php artisan run serve

**Note** it does not require database conection at all, it uses a caching mechanim to store data instead.
