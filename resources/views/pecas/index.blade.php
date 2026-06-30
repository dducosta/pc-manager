<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Manager</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin:40px;
            background:#f5f5f5;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        th,td{
            padding:12px;
            border:1px solid #ddd;
            text-align:left;
        }

        th{
            background:#333;
            color:white;
        }

        a{
            text-decoration:none;
        }

        .btn{
            padding:8px 12px;
            border-radius:5px;
            color:white;
        }

        .novo{
            background:green;
        }

        .editar{
            background:orange;
        }

        .excluir{
            background:red;
        }

        h1{
            margin-bottom:20px;
        }
    </style>

</head>
<body>

<h1>PC Manager - Peças</h1>

<a href="{{ route('pecas.create') }}" class="btn novo">
Cadastrar Peça
</a>

<br><br>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

<table>

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Categoria</th>
    <th>Fabricante</th>
    <th>Quantidade</th>
    <th>Ações</th>
</tr>

@forelse($pecas as $peca)

<tr>

<td>{{ $peca->id }}</td>

<td>{{ $peca->nome }}</td>

<td>{{ $peca->categoria }}</td>

<td>{{ $peca->fabricante }}</td>

<td>{{ $peca->quantidade }}</td>

<td>
<a href="{{ route('pecas.show',$peca) }}" class="btn">
Ver
</a>

<a href="{{ route('pecas.edit',$peca) }}" class="btn editar">
Editar
</a>

<form action="{{ route('pecas.destroy',$peca) }}" method="POST" style="display:inline">

@csrf

@method('DELETE')

<button class="btn excluir">

Excluir

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6">

Nenhuma peça cadastrada.

</td>

</tr>

@endforelse

</table>

</body>
</html>