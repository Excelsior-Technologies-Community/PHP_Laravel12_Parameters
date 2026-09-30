<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Not Found | Laravel 12</title>

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
            max-width: 500px;
            width: 100%;
            padding: 45px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            border-top: 5px solid #dc3545;
        }

        .icon {
            width: 80px;
            height: 80px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 35px;
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
            padding: 12px;
            background: #fff5f5;
            border: 1px solid #dc3545;
            color: #dc3545;
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="icon">!</div>

        <h1>User Not Found</h1>

        <p>
            {{ $message }}
        </p>

        <div class="parameter">
            Please check the user ID parameter.
        </div>

    </div>

</body>

</html>