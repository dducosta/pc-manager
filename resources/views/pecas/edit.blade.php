<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Peça</title>

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
            background:orange;
            color:white;
            border:none;
            padding:10px 20px;
            cursor:pointer;
        }
    </style>

</head>
<body>

<h1>Editar Peça</h1>

<form action="{{ route('pecas.update',$peca) }}" method="POST">

@csrf
@method('PUT')

<label>Nome</label>
<input type="text" name="nome" value="{{ $peca->nome }}">

<label>Categoria</label>

<select name="categoria">

<option {{ $peca->categoria=='Processador'?'selected':'' }}>Processador</option>
<option {{ $peca->categoria=='Placa de Vídeo'?'selected':'' }}>Placa de Vídeo</option>
<option {{ $peca->categoria=='Memória RAM'?'selected':'' }}>Memória RAM</option>
<option {{ $peca->categoria=='SSD'?'selected':'' }}>SSD</option>
<option {{ $peca->categoria=='HD'?'selected':'' }}>HD</option>
<option {{ $peca->categoria=='Fonte'?'selected':'' }}>Fonte</option>
<option {{ $peca->categoria=='Placa-mãe'?'selected':'' }}>Placa-mãe</option>
<option {{ $peca->categoria=='Gabinete'?'selected':'' }}>Gabinete</option>
<option {{ $peca->categoria=='Cooler'?'selected':'' }}>Cooler</option>
<option {{ $peca->categoria=='Outro'?'selected':'' }}>Outro</option>

</select>

<label>Fabricante</label>
<input type="text" name="fabricante" value="{{ $peca->fabricante }}">

<label>Modelo</label>
<input type="text" name="modelo" value="{{ $peca->modelo }}">

<label>Quantidade</label>
<input type="number" name="quantidade" value="{{ $peca->quantidade }}">

<label>Preço</label>
<input type="number" step="0.01" name="preco" value="{{ $peca->preco }}">

<label>Descrição</label>

<textarea name="descricao">{{ $peca->descricao }}</textarea>

<button type="submit">

Salvar Alterações

</button>

</form>

</body>
</html>