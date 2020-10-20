<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env("APP_NAME") }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }

            .content {
                max-width: 1200px;
                margin: 0px auto;
            }

            h1 {
                text-align: center;
            }

            ul {
                padding-left: 15px;
            }

            ul > li {
                list-style: none;
            }

            .values-ul {
                margin-top: -10px;
            }

            .values-ul > li {
                list-style: circle;
            }

            .route {
                background-color: #eaeaea;
                padding: 5px 10px;
            }

            .route-description {
                margin: 10px 0px;
                padding-left: 15px;
            }

            .value {
                color: darkred;
                font-weight: bold;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="content">
            <h1>{{ env("APP_NAME") }}</h1>

            <h2>Роуты:</h2>

            <ul>
                <li>
                    <div class="route">POST: {{ route("indicators.generate", [], false) }}</div>
                    <div class="route-description">Генерация случайных значений. В ответ приходит JSON со структурой { success: <span class="value">true</span>, data: { id: <span class="value">value</span> }}.</div>
                </li>
                <li>
                    <div class="route">GET: {{ route("indicators.get", ["id" => "some_id"], false) }}</div>
                    <div class="route-description">
                        <p>Получение значения по ID. В ответ приходит JSON со структурой <br>
                            {
                            success: <span class="value">true</span>,
                            data: {
                            id: <span class="value">value</span>,
                            type: <span class="value">value</span>,
                            value: <span class="value">value</span>,
                            created_at: <span class="value">value</span>,
                            updated_at: <span class="value">value</span>
                            }
                            }.</p>
                        <p>Есть возможность указать тип и длину генерируемого значения. <br>
                            Для указания длины нужно передать ключ <span class="value">length</span> с нужным значением (целое число). <br>
                            Для указания типа нужно передать ключ <span class="value">type</span> с нужным значением. Доступные значения:</p>
                        <ul class="values-ul">
                            <li><span class="value">string</span> - для генерации строки</li>
                            <li><span class="value">numeric</span> - для генерации целочисленного значения</li>
                            <li><span class="value">guid</span> - для генерации GUID</li>
                            <li><span class="value">alphanumeric</span> - для генерации цифробуквенной строки</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </body>
</html>
