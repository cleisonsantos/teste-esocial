<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <h1>Contatos</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Anexo</th>
                    <th scope="col">ip</th>
                    <th scope="col">Data Envio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                <tr>
                    <th scope="col">{{ $contato->id }}</th>
                    <th scope="col">{{ $contato->nome }}</th>
                    <th scope="col">{{ $contato->email }}</th>
                    <th scope="col">{{ $contato->telefone }}</th>
                    <th scope="col">{{ $contato->anexo }}</th>
                    <th scope="col">{{ $contato->ip }}</th>
                    <th scope="col">{{ $contato->created_at }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>