# ncov2 API

## Description

Retrieve worldwide daily sum of confirmed cases, deaths and fatality rate of the COVID19 disease by country ([data source](https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports)).

## How to use

[https://phpapi.org/ncov2/php.api?date=**mm-dd-yyyy&country=XXXXXX**](https://phpapi.org/ncov2/api.php?date=mm-dd-yyyy&country=XXXXXX)

- Time range: from 01-22-2020 to yesterday (required)
- Country: any country where COVID-19 is

### Example

#### Input

[https://phpapi.org/ncov2/php.api?date=**03-03-2020&country=Italy**](https://phpapi.org/ncov2/api.php?date=03-03-2020&country=Italy)

#### Output

<pre>{"country":"Italy","confirmed":"2502","deaths":"79","ratio":3.16}</pre>
