<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | Laravel 12</title>
    <style>
        /* Basic Reset */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
            transition: transform 0.3s ease;
            border-top: 5px solid #FF2D20; /* Laravel Red */
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .avatar {
            width: 80px;
            height: 80px;
            background: #FF2D20;
            color: white;
            font-size: 32px;
            font-weight: bold;
            line-height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: block;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .name-highlight {
            color: #FF2D20;
            text-transform: capitalize;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }

        .badge {
            display: inline-block;
            margin-top: 20px;
            padding: 5px 15px;
            background: #fff5f5;
            color: #FF2D20;
            border-radius: 50px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #FF2D20;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="avatar">
            {{ strtoupper(substr($userName, 0, 1)) }}
        </div>

        <h1>Welcome, <span class="name-highlight">{{ $userName }}</span>!</h1>
        
        <p>Aa page Laravel Parameter mathi data laine Blade ma dynamic rite display kare che.</p>
        
        <div class="badge">Laravel 12 Active</div>
    </div>

</body>
</html>