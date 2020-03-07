### phpapi.org / [ncov2](https://phpapi.org/ncov2/)

COVID19 JSON data (confirmed, deaths, ratio) via HTTP request (date parameter required, "m-d-Y" format).

**Example:**

- Browsers: [https://phpapi.org/ncov2/api.php?date=**03-05-2020**](https://phpapi.org/ncov2/api.php?date=03-05-2020)
- PHP: `print_r(file_get_contents(https://phpapi.org/ncov2/api.php?date=03-05-2020));`

**JSON Output**
```
{"date":"03-05-2020","confirmed":97886,"deaths":3348,"ratio":3.42}
```

Data source: [https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports](https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports)
