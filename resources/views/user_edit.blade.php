<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit User | Laravel 12 Parameters</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .card {
            width: 100%;
            max-width: 550px;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,.12);
            border-top: 5px solid #ff2d20;
        }

        h1 {
            margin-bottom: 10px;
            color: #333;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .parameter {
            padding: 12px;
            background: #fff5f5;
            color: #ff2d20;
            border: 1px solid #ff2d20;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .error {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }

        button,
        a {
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
        }

        button {
            background: #ff2d20;
            color: white;
        }

        .back {
            background: #333;
            color: white;
            margin-left: 8px;
        }

    </style>

</head>

<body>

<div class="card">

    <h1>Edit User</h1>

    <p class="subtitle">
        Update a user using a dynamic Laravel route parameter.
    </p>


    <div class="parameter">

        Route Parameter ID:
        {{ $user->id }}

    </div>


    <form
        method="POST"
        action="{{ route('users.update', $user->id) }}"
    >

        @csrf

        @method('PUT')


        <div class="field">

            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
            >

            @error('name')

                <div class="error">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <div class="field">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
            >

            @error('email')

                <div class="error">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <button type="submit">
            Update User
        </button>


        <a
            href="{{ route('users.index') }}"
            class="back"
        >
            Back
        </a>

    </form>

</div>

</body>

</html>