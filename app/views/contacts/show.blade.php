<!DOCTYPE html>
<html>
<head>
    <title>Show</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"
</head>
<body>
<div class="container-fluid">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('contacts') }}">Home</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('contacts/create') }}">Create a contact</a>
    </ul>
</nav>

<h1>Showing {{ $contact->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $contact->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $contact->email }}<br>
        </p>
    </div>

</div>
</body>
</html>