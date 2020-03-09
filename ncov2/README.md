# ncov2 API

## Description

Retrieve worldwide daily sum of confirmed cases, deaths and fatality rate of the COVID19 disease ([data source](https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports)).

## How to use

[https://phpapi.org/ncov2/php.api?date=**mm-dd-yyyy**](https://phpapi.org/ncov2/api.php?date=mm-dd-YYYY)

Time range: from 01-22-2020 to yesterday (required)

### Example

#### Input

[https://phpapi.org/ncov2/php.api?date=**03-05-2020**](https://phpapi.org/ncov2/api.php?date=03-05-2020)

#### Output

<pre>{"date": "03-05-2020","confirmed": 97886,"deaths": 3349,"fatality": 3.42}</pre>
