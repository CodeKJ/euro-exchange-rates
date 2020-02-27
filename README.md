
## Currency Exchange Rates

This app reads currency exchange rates from central bank of Latvia (www.bank.lv)

### Features

- Automatically updates currency exchange rate information
- Provides historical data

#### How to launch in Docker?

1. Clone this repo.
2. Copy `.env.example` as `.env` (change db configs if needed, but everything should be working by default)
3. Build project `docker-compose build` in `docker-compose.yaml` folder
4. Run project `docker-compose up -d`
5. Install composer dependencies `docker exec devbox composer install`
6. Migrate database `docker exec devbox php artisan migrate`
7. Open http://localhost
---
Trouble building docker file? Try `docker-compose build --force-rm --no-cache`
