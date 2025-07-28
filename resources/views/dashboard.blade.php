<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include CSS if needed -->
</head>
<body>
    <div class="container" style="max-width: 800px; margin: 50px auto; font-family: Arial, sans-serif;">
        <header>
            <h1>Welcome to the Dashboard</h1>
            <hr>
        </header>

        <main>
            <section>
                <h2>Hello, {{ cas()->user() }}</h2>
                <p>Below is some information retrieved from the CAS server:</p>

                <h3>Your CAS Attributes</h3>
                @php
                    $attributes = cas()->getAttributes();
                @endphp

                @if(!empty($attributes))
                    <ul>
                        @foreach ($attributes as $key => $value)
                            <li><strong>{{ $key }}:</strong> {{ is_array($value) ? implode(', ', $value) : $value }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No additional attributes were found.</p>
                @endif
            </section>

            <section style="margin-top: 30px;">
                <a href="{{ url('/logout') }}" style="color: white; background: red; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Logout</a>
            </section>
        </main>

        <footer style="margin-top: 50px; text-align: center; font-size: 0.9em; color: gray;">
            <p>&copy; {{ date('Y') }} My Laravel Application. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
