<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Search | Laravel 12 Parameters</title>

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
            padding: 50px 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 35px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #ff2d20;
            margin-bottom: 25px;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .search-info {
            color: #666;
            font-size: 16px;
        }

        .parameter {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background: #fff5f5;
            border: 1px solid #ff2d20;
            color: #ff2d20;
            border-radius: 30px;
            font-weight: 600;
        }

        .results {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .user-card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #ff2d20;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .user-name {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .user-email {
            color: #666;
            word-break: break-word;
        }

        .user-id {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            color: #888;
            font-size: 14px;
        }

        .empty {
            background: white;
            padding: 40px;
            border-radius: 16px;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <h1>User Search Results</h1>

            <div class="search-info">
                Users matching:
                <strong>{{ $searchName }}</strong>
            </div>

            <div class="parameter">
                Route Parameter: {{ $searchName }}
            </div>

        </div>


        @if($users->count() > 0)

            <div class="results">

                @foreach($users as $user)

                    <div class="user-card">

                        <div class="avatar">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <div class="user-name">
                            {{ $user->name }}
                        </div>

                        <div class="user-email">
                            {{ $user->email }}
                        </div>

                        <div class="user-id">
                            User ID: {{ $user->id }}
                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <h2>No Users Found</h2>

                <p style="margin-top: 10px;">
                    No user was found matching
                    <strong>{{ $searchName }}</strong>.
                </p>

            </div>

        @endif

    </div>

</body>

</html>