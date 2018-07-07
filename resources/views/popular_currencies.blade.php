<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Popular Currencies</title>

    <style>
        .currency-title{
            text-align:center;
        }
        .currency-table{
            margin:0 auto;
        }
        .currency-table__head{
            font-weight: bold;
        }
        .currency-table__head th{
            padding:2px 20px;
        }
        .currency-table__row td{
            padding:20px
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="currency-title">Top 3 popular cryptocurrencies</h1>
        <table class="currency-table" border="1" cellspacing="0" cellpadding="0">
            <tr class="currency-table__head">
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Price</th>
                <th>Daily Volatility</th>
            </tr>
            @foreach($popularCurrencies as $index=>$currency)
                <tr class="currency-table__row">
                    <td>
                        {{$index}}
                    </td>
                    <td>
                        <img src="{{$currency->getImageUrl()}}" alt="{{$currency->getName()}}"/>
                    </td>
                    <td>
                        {{$currency->getName()}}
                    </td>
                    <td>
                        {{$currency->getPrice()}}
                    </td>
                    <td>
                        {{$currency->getDailyChangePercent()}}%
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
