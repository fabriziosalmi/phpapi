# phpapi.org

The aim of [PHPAPI.org](https://phpapi.org) is to provide a public, free and simple interface where to get data.

JSON response data is cached and served by Cloudflare.

## phpapi.org / [ncov2](https://phpapi.org/ncov2/)

Covid19 data in JSON format. Date parameter is required (m-d-Y format). 

Example for the 5th of March, 2020:

- Browsers: [https://phpapi.org/ncov2/api.php?date=**03-05-2020**](https://phpapi.org/ncov2/api.php?date=03-05-2020)
- PHP: `print_r(file_get_contents(https://phpapi.org/ncov2/api.php?date=03-05-2020));`

**JSON Output**
```
{"date":"03-05-2020","confirmed":97886,"deaths":3348,"ratio":3.42}
```

Data source: [https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports](https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports)
