
## Euro Exchange Rates

This app fetches euro currency exchange rates from RSS feed provided by [Central Bank of Latvia](https://www.bank.lv/)

### Demo

- https://euroexchange.codekj.eu

### Features

- Automatically updates currency exchange rates (daily)
- Historical data for individual currency
- Display increase or decrease of exchange rate based on previous record

### Usage

- Manual fetch `php artisan fetch:exchange-rates` or http://localhost/api/fetch

### How to launch in Docker?

1. Clone this repo.
2. Copy `.env.example` as `.env` (change db configs if needed, but everything should be working by default)
3. Build project `docker-compose build` in `docker-compose.yaml` folder
4. Run project `docker-compose up -d`
5. Install composer dependencies `docker exec devbox composer install`
6. Migrate database `docker exec devbox php artisan migrate`
7. Open http://localhost
---
Trouble building docker file? Try `docker-compose build --force-rm --no-cache`
