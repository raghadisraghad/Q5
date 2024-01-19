<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>Welcome</title>
    <style>
        :root {
            --black: #1a202c;
            --light-black: #2d3748;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header{
            background-color: #333;
            color: #fff;
            padding: 1em;
            display: flex;
            justify-content: space-between;
        }

        footer{
            background-color: #333;
            color: #fff;
            padding: 1em;
        }

        section {
            padding: 2em;
        }

        a:visited {
            color: #4a5568;
            text-decoration: none;
            cursor: pointer;
        }

        .content{
            min-height: 10rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0.5rem;
        }

        .login a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin-left: 0.5rem;
            font-weight: 600;
            border-radius: 0.25rem;
            color: var(--black);
            text-decoration: none;
        }

        .login a:hover {
            background-color: var(--light-black);
            text-decoration: none;
        }

        /* Style the Log in button differently */
        .login a[href="{{ route('login') }}"] {
            background-color: var(--black);            
            text-decoration: none;
            color: #ffffff;
        }

        .login a[href="{{ route('login') }}"]:hover {
            background-color: #1a202c; /* Darker color on hover */
            text-decoration: none;
        }

        /* Style the Register button differently */
        .login a[href="{{ route('register') }}"] {
            text-decoration: none;
            background-color: var(--light-black);
            color: #ffffff;
        }

        .login a[href="{{ route('register') }}"]:hover {
            background-color: #2d3748; /* Darker color on hover */
            text-decoration: none;
        }

        /* Additional styles for the focus outline - customize as needed */
        .login a:focus {
            outline: 2px solid #ff0000; /* Red outline on focus */
            outline-offset: 2px; /* Adjust outline offset */
            text-decoration: none;
        }

        
        table {
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #2d3748;
        }

        th {
            background-color: #4a5568;
        }

        tr:nth-child(even) {
            background-color: #2d3748;
        }

        h2, h3 {
            color: #a0aec0;
        }

    </style>

</head>
<body>
    <header>
        <b><u><h2>Laravel</h2></u></b>
        @if(auth()->check())
            @if(auth()->user()->type === 'admin')
                <a href="/"><h1>Welcome Admin!</h1></a>
            @elseif(auth()->user()->type === 'user')
                <h1>Welcome Student!</h1>
            @endif
        @else
            <h1>Welcome User!</h1>
        @endif
        <div class="login">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <section class="content">
        <p>
            Thank you for visiting our home page. We're glad to have you here.
        </p>
        <p>
            Feel free to explore .
        </p>
    </section>

    <section class="content">

        @if(auth()->check())
            @if(auth()->user()->type === 'admin')
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Students</th>
                                <th>Filieres</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                                <a href="/etudiants">Students</a>
                            </td>
                            <td>
                                <a href="/filieres">Filieres</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            @elseif(auth()->user()->type === 'user')
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Filieres</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                                <a href="/profile">Profile</a>
                            </td>
                            <td>
                                <a href="/filieres">Filieres</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            @endif
        @endif

    </section>

    <footer>
        <p>
            Made by Raghad Chamlali.
        </p>
    </footer>

</body>
</html>
