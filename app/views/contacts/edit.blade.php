<!DOCTYPE html>
<html>
<head>
    <title>Editing</title>
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

<h1>Edit {{ $contact->name }}</h1>


{{ HTML::ul($errors->all()) }}

{{ Form::model($contact, array('route' => array('contacts.update', $contact->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Contact edited', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>