# ncov2 API

## Description

Retrieve worldwide daily sum of confirmed cases, deaths and fatality rate of the COVID19 disease by country ([data source](https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports)).

## How to use

[https://phpapi.org/ncov2/php.api?date=**mm-dd-yyyy&country=XXXXXX**](https://phpapi.org/ncov2/api.php?date=mm-dd-yyyy&country=XXXXXX)

- Time range: from 01-22-2020 to yesterday (required)
- Country: any country where COVID-19 is

### Examples

#### Input

[https://phpapi.org/ncov2/php.api?date=**03-03-2020&country=Italy**](https://phpapi.org/ncov2/api.php?date=03-03-2020&country=Italy)

#### Output

<pre>{"country":"Italy","confirmed":"2502","deaths":"79","ratio":3.16}</pre>

#### Get multiple data

Iteration using OSX, bash and curl

- get historical data for a given country

```
for i in 02-19-2020 02-20-2020 02-21-2020 02-22-2020 02-23-2020 02-24-2020 02-25-2020 02-26-2020 02-27-2020 02-28-2020 02-29-2020 03-01-2020 03-02-2020 03-03-2020 03-04-2020 03-05-2020 03-06-2020 03-07-2020 03-08-2020 03-09-2020; do curl -X GET -H "Content-type: application/json" -H "Accept: application/json"  "https://phpapi.org/ncov2/api.php?date=$i&country=Italy"; echo ""; done
```

Result:

```
{"date":"02-19-2020","country":"Italy","confirmed":"3","deaths":"0","ratio":0}
{"date":"02-20-2020","country":"Italy","confirmed":"3","deaths":"0","ratio":0}
{"date":"02-21-2020","country":"Italy","confirmed":"20","deaths":"1","ratio":5}
{"date":"02-22-2020","country":"Italy","confirmed":"62","deaths":"2","ratio":3.23}
{"date":"02-23-2020","country":"Italy","confirmed":"155","deaths":"3","ratio":1.94}
{"date":"02-24-2020","country":"Italy","confirmed":"229","deaths":"7","ratio":3.06}
{"date":"02-25-2020","country":"Italy","confirmed":"322","deaths":"10","ratio":3.11}
{"date":"02-26-2020","country":"Italy","confirmed":"453","deaths":"12","ratio":2.65}
{"date":"02-27-2020","country":"Italy","confirmed":"655","deaths":"17","ratio":2.6}
{"date":"02-28-2020","country":"Italy","confirmed":"888","deaths":"21","ratio":2.36}
{"date":"02-29-2020","country":"Italy","confirmed":"1128","deaths":"29","ratio":2.57}
{"date":"03-01-2020","country":"Italy","confirmed":"1694","deaths":"34","ratio":2.01}
{"date":"03-02-2020","country":"Italy","confirmed":"2036","deaths":"52","ratio":2.55}
{"date":"03-03-2020","country":"Italy","confirmed":"2502","deaths":"79","ratio":3.16}
{"date":"03-04-2020","country":"Italy","confirmed":"3089","deaths":"107","ratio":3.46}
{"date":"03-05-2020","country":"Italy","confirmed":"97886","deaths":"3348","ratio":3.42}
{"date":"03-06-2020","country":"Italy","confirmed":"4636","deaths":"197","ratio":4.25}
{"date":"03-07-2020","country":"Italy","confirmed":"5883","deaths":"233","ratio":3.96}
{"date":"03-08-2020","country":"Italy","confirmed":"7375","deaths":"366","ratio":4.96}
{"date":"03-09-2020","country":"Italy","confirmed":"9172","deaths":"463","ratio":5.05}
```

- get single value across several countries

```
for i in Argentina Italy Japan Spain France South%20Korea Germany; do curl -X GET -H "Content-type: application/json" -H "Accept: application/json"  "https://phpapi.org/ncov2/api.php?date=03-09-2020&country=$i"; echo ""; done
```

Result:

```
{"date":"03-09-2020","country":"Argentina","confirmed":"12","deaths":"1","ratio":8.33}
{"date":"03-09-2020","country":"Italy","confirmed":"9172","deaths":"463","ratio":5.05}
{"date":"03-09-2020","country":"Japan","confirmed":"511","deaths":"17","ratio":3.33}
{"date":"03-09-2020","country":"Spain","confirmed":"1073","deaths":"28","ratio":2.61}
{"date":"03-09-2020","country":"France","confirmed":"1209","deaths":"19","ratio":1.57}
{"date":"03-09-2020","country":"South Korea","confirmed":"7478","deaths":"53","ratio":0.71}
{"date":"03-09-2020","country":"Germany","confirmed":"1176","deaths":"2","ratio":0.17}
```
