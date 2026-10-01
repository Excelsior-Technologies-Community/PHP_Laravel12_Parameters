<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Parameter Dashboard | Laravel 12</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 35px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
            border-top: 5px solid #ff2d20;
        }

        .header h1 {
            color: #222;
            margin-bottom: 10px;
        }

        .header p {
            color: #777;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
        }

        .card h3 {
            color: #777;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .number {
            font-size: 32px;
            font-weight: bold;
            color: #ff2d20;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
        }

        .section h2 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f8f9fa;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            background: #ff2d20;
            color: white;
            margin-right: 8px;
        }

        .btn.secondary {
            background: #333;
        }

        @media(max-width:700px) {

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 8px;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <h1>Laravel 12 Parameter Dashboard</h1>

        <p>
            User statistics and dynamic route parameter management.
        </p>

    </div>


    <div class="cards">

        <div class="card">

            <h3>Total Users</h3>

            <div class="number">
                {{ $totalUsers }}
            </div>

        </div>


        <div class="card">

            <h3>Lowest User ID</h3>

            <div class="number">
                {{ $lowestId ?? 0 }}
            </div>

        </div>


        <div class="card">

            <h3>Highest User ID</h3>

            <div class="number">
                {{ $highestId ?? 0 }}
            </div>

        </div>


        <div class="card">

            <h3>Latest User</h3>

            <div class="number">

                {{ $latestUser?->id ?? '-' }}

            </div>

        </div>

    </div>


    <div class="section">

        <h2>Recent Users</h2>

        @if($recentUsers->count())

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Parameter</th>
                    </tr>

                </thead>

                <tbody>

                @foreach($recentUsers as $user)

                    <tr>

                        <td>
                            {{ $user->id }}
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>

                            <a
                                class="btn"
                                href="{{ url('/user-profile/' . $user->id) }}"
                            >
                                View
                            </a>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        @else

            <p>No users found.</p>

        @endif


        <br>

        <a
            href="{{ route('users.index') }}"
            class="btn"
        >
            Manage Users
        </a>

        <a
            href="{{ route('users.json', 1) }}"
            class="btn secondary"
        >
            JSON Parameter
        </a>

    </div>

</div>

</body>

</html>