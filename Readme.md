# CurrencyRates-Api

A simple API providing currency rates fetched from [https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml](https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml). 

## Api documentation
available at [https://localhost:8000/api/docs](https://localhost:8000/api/docs)

```
#GET /api/currencies

[{"iso3":"AUD","rate":1.6236,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"BGN","rate":1.9558,"updatedAt":"2024-01-03T13:34:44+00:00"},{"iso3":"BRL","rate":5.3859,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"CAD","rate":1.4574,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"CHF","rate":0.9322,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"CNY","rate":7.8057,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"CZK","rate":24.675,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"DKK","rate":7.4581,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"GBP","rate":0.8647,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"HKD","rate":8.5257,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"HUF","rate":380.75,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"IDR","rate":16994.33,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"ILS","rate":3.9867,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"INR","rate":90.965,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"ISK","rate":150.7,"updatedAt":"2024-01-03T13:34:44+00:00"},{"iso3":"JPY","rate":156.16,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"KRW","rate":1432.28,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"MXN","rate":18.6682,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"MYR","rate":5.0566,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"NOK","rate":11.32,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"NZD","rate":1.7515,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"PHP","rate":60.699,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"PLN","rate":4.3638,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"RON","rate":4.9725,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"SEK","rate":11.1915,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"SGD","rate":1.4503,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"THB","rate":37.616,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"TRY","rate":32.5178,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"USD","rate":1.0919,"updatedAt":"2024-01-04T09:14:55+00:00"},{"iso3":"ZAR","rate":20.5326,"updatedAt":"2024-01-04T09:14:55+00:00"}]
```

```
#GET /api/currencies/{iso3}

{"iso3":"ZAR","rate":20.5326,"updatedAt":"2024-01-04T09:14:55+00:00"}
```

```
#GET /api/currencies/{iso3}/history

[{"rate":20.3656,"date":"2024-01-03T13:34:44+00:00"},{"rate":2.0,"date":"2024-01-03T13:29:30+00:00"},{"rate":1.0,"date":"2024-01-03T13:17:19+00:00"}]
```

### Formats
JSON: default

CSV: Header 'accept: text/csv'

## Update currency rates
```
bin/console currency-rates:update
```

## Build and run on production
Project (packages and database) will be setup on startup inside the container.

```
git clone https://github.com/StephanAltmann85/currency-rates-api.git
cd currency-rates-api

docker compose -f docker-compose.prod.yaml up --build -d
#[OR]
docker-compose -f docker-compose.prod.yaml up --build -d

sudo chmod -R 777 ./var
```

Access via `http://{SERVER_IP}:8080/api/docs`
