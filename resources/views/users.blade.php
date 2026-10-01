<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>User Management | Laravel 12 Parameters</title>

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
            padding: 35px 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header,
        .filters,
        .table-box {
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
        }

        .header {
            padding: 30px;
            text-align: center;
            border-top: 5px solid #ff2d20;
            margin-bottom: 20px;
        }

        .header h1 {
            margin-bottom: 8px;
        }

        .header p {
            color: #777;
        }

        .filters {
            padding: 25px;
            margin-bottom: 20px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 7px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .button-row {
            margin-top: 18px;
        }

        button,
        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .primary {
            background: #ff2d20;
            color: white;
        }

        .dark {
            background: #333;
            color: white;
        }

        .success {
            background: #198754;
            color: white;
        }

        .danger {
            background: #dc3545;
            color: white;
        }

        .table-box {
            padding: 20px;
            overflow-x: auto;
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
            white-space: nowrap;
        }

        th {
            background: #f8f9fa;
        }

        .badge {
            padding: 5px 9px;
            background: #fff5f5;
            color: #ff2d20;
            border-radius: 20px;
            font-size: 12px;
        }

        .success-message {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            margin: 3px;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <h1>User Parameter Management</h1>

        <p>
            Search, filter, sort and manage users using Laravel route parameters.
        </p>

    </div>


    @if(session('success'))

        <div class="success-message">

            {{ session('success') }}

        </div>

    @endif


    <div class="filters">

        <form method="GET" action="{{ route('users.index') }}">

            <div class="filter-grid">

                <div>

                    <label>Search</label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Name, email or ID"
                    >

                </div>


                <div>

                    <label>Minimum ID</label>

                    <input
                        type="number"
                        name="min_id"
                        value="{{ request('min_id') }}"
                        placeholder="Example: 1"
                    >

                </div>


                <div>

                    <label>Maximum ID</label>

                    <input
                        type="number"
                        name="max_id"
                        value="{{ request('max_id') }}"
                        placeholder="Example: 50"
                    >

                </div>


                <div>

                    <label>Email Domain</label>

                    <input
                        type="text"
                        name="domain"
                        value="{{ request('domain') }}"
                        placeholder="gmail.com"
                    >

                </div>


                <div>

                    <label>Sort</label>

                    <select name="sort">

                        <option
                            value="newest"
                            @selected(request('sort') === 'newest' || !request('sort'))
                        >
                            Newest
                        </option>

                        <option
                            value="oldest"
                            @selected(request('sort') === 'oldest')
                        >
                            Oldest
                        </option>

                        <option
                            value="name_asc"
                            @selected(request('sort') === 'name_asc')
                        >
                            Name A-Z
                        </option>

                        <option
                            value="name_desc"
                            @selected(request('sort') === 'name_desc')
                        >
                            Name Z-A
                        </option>

                        <option
                            value="email_asc"
                            @selected(request('sort') === 'email_asc')
                        >
                            Email A-Z
                        </option>

                        <option
                            value="email_desc"
                            @selected(request('sort') === 'email_desc')
                        >
                            Email Z-A
                        </option>

                    </select>

                </div>

            </div>


            <div class="button-row">

                <button
                    type="submit"
                    class="primary"
                >
                    Apply Filters
                </button>

                <a
                    href="{{ route('users.index') }}"
                    class="btn dark"
                >
                    Reset
                </a>

                <a
                    href="{{ route('parameter.dashboard') }}"
                    class="btn success"
                >
                    Dashboard
                </a>

            </div>

        </form>

    </div>


    <div class="table-box">

        <h2 style="margin-bottom: 20px;">
            Users ({{ $users->total() }})
        </h2>


        @if($users->count())

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Parameter</th>

                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($users as $user)

                    <tr>

                        <td>
                            <span class="badge">
                                #{{ $user->id }}
                            </span>
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>

                            <a
                                href="{{ url('/user-profile/' . $user->id) }}"
                                class="btn primary"
                            >
                                View
                            </a>

                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('users.edit', $user->id) }}"
                                    class="btn dark"
                                >
                                    Edit
                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('users.delete', $user->id) }}"
                                    onsubmit="return confirm('Delete this user?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="danger"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>


            <div class="pagination">

                {{ $users->links() }}

            </div>

        @else

            <p>
                No users found for the selected filters.
            </p>

        @endif

    </div>

</div>

</body>

</html>