<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
</head>
<style>
   <head>
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 250px);
            gap: 15px;
            justify-content: center;
        }

        .card {
            position: relative;
            width: 250px;
            min-height: 180px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .tipo {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 14px;
            color: #666;
        }

        .btn-inscrever {
            position: absolute;
            bottom: 15px;
            right: 15px;
            padding: 10px 18px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>


    </style>
</head>
<body>
    
   <body>

    <h1>Bem-vindo ao meu site!</h1>

    <div class="cards">

        <div class="card">
            <span class="tipo">Corrida</span>

            <h2>Maratona de São Paulo</h2>
            <p>14 de junho de 2026</p>
            <p>São Paulo</p>
            <p>42km</p>
            <p>12.500</p>

            <a href="#" class="btn-inscrever">Inscrever</a>
        </div>

        <div class="card">
            <span class="tipo">Corrida</span>

            <h2>Maratona do Rio</h2>
            <p>20 de julho de 2026</p>
            <p>Rio de Janeiro</p>
            <p>42km</p>
            <p>10.000</p>

            <a href="#" class="btn-inscrever">Inscrever</a>
        </div>

        <div class="card">
            <span class="tipo">Corrida</span>

            <h2>Maratona de Brasília</h2>
            <p>10 de agosto de 2026</p>
            <p>Brasília</p>
            <p>42km</p>
            <p>8.000</p>

            <a href="#" class="btn-inscrever">Inscrever</a>
        </div>

    </div>

</body>