<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Parameter | Laravel 12</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .card {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #ff2d20;
        }

        .icon {
            width: 80px;
            height: 80px;
            background: #ff2d20;
            color: white;
            border-radius: 50%;
            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
            font-weight: bold;
        }

        h1 {
            color: #333;
            margin-bottom: 15px;
        }

        p {
            color: #666;
            line-height: 1.6;
        }

        .parameter {
            margin-top: 25px;
            padding: 15px;
            background: #fff5f5;
            border: 1px solid #ff2d20;
            border-radius: 10px;
            color: #ff2d20;
            font-weight: 600;
        }

        .note {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="icon">
            #
        </div>

        <h1>Product Parameter</h1>

        <p>
            The product ID was received through a
            Laravel route parameter.
        </p>

        <div class="parameter">
            Product ID: {{ $productId }}
        </div>

        <div class="note">
            Only numeric product IDs are accepted by this route.
        </div>

    </div>

</body>

</html>