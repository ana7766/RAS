<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greška 404 - Stranica nije pronađena</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            color: #fff;
            overflow: hidden;
            flex-direction: column;
        }

        h1 {
            font-size: 64px;
            margin: 0;
            animation: fadeIn 1.5s ease-out;
        }

        p {
            font-size: 20px;
            margin-top: 20px;
            animation: fadeIn 2s ease-out;
        }

        a {
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #333;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #feb47b;
            color: #333;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Greška 404</h1>
    <p>Stranica koju tražite ne postoji.</p>
    <a href="/parking/vpms">Vrati se na početnu stranicu</a>
</body>
</html>
