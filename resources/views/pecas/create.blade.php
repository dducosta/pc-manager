<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Peça</title>

    <style>
        body{
            font-family:Arial,Helvetica,sans-serif;
            margin:40px;
            background:#f5f5f5;
        }

        form{
            background:white;
            padding:20px;
            width:500px;
            border-radius:8px;
        }

        input, textarea, select{
            width:100%;
            padding:10px;
            margin-bottom:15px;
        }

        button{
            background:green;
            color:white;
            border:none;
            padding:10px 20px;
            cursor:pointer;
        }

        a{
            text-decoration:none;
        }
    </style>

</head>
<body>

<h1>Nova Peça</h1>

<form action="{{ route('pecas.store') }}" method="POST">

@csrf

<label>Nome</label>
<input type="text" name="nome">

<label>Categoria</label>
<select name="categoria">
    <option>Processador</option>
    <option>Placa de Vídeo</option>
    <option>Memória RAM</option>
    <option>SSD</option>
    <option>HD</option>
    <option>Fonte</option>
    <option>Placa-mãe</option>
    <option>Gabinete</option>
    <option>Cooler</option>
    <option>Outro</option>
</select>

<label>Fabricante</label>
<input type="text" name="fabricante">

<label>Modelo</label>
<input type="text" name="modelo">

<label>Quantidade</label>
<input type="number" name="quantidade">

<label>Preço</label>
<input type="number" step="0.01" name="preco">

<label>Descrição</label>
<textarea name="descricao"></textarea>

<button type="submit">
Salvar
</button>

</form>

<br>

<a href="{{ route('pecas.index') }}">
Voltar
</a>

</body>
</html>