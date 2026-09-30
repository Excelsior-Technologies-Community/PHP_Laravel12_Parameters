<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Details | Laravel 12 Parameters</title>

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
            background: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            border-top: 5px solid #ff2d20;
        }

        .avatar {
            width: 90px;
            height: 90px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #ff2d20;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .info {
            background: #f8f9fa;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .label {
            font-size: 13px;
            color: #777;
            margin-bottom: 5px;
        }

        .value {
            font-size: 17px;
            font-weight: 600;
            color: #333;
        }

        .parameter {
            margin-top: 25px;
            padding: 12px;
            background: #fff5f5;
            border: 1px solid #ff2d20;
            border-radius: 10px;
            color: #ff2d20;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <h1>{{ $user->name }}</h1>

        <p class="subtitle">
            Dynamic user data loaded using a Laravel route parameter.
        </p>

        <div class="info">
            <div class="label">User ID</div>
            <div class="value">{{ $user->id }}</div>
        </div>

        <div class="info">
            <div class="label">Name</div>
            <div class="value">{{ $user->name }}</div>
        </div>

        <div class="info">
            <div class="label">Email</div>
            <div class="value">{{ $user->email }}</div>
        </div>

        <div class="parameter">
            Route Parameter: /user-profile/{{ $user->id }}
        </div>

    </div>

</body>

</html>