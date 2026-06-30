<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Detalhes</title>
</head>

<body>

<h1>{{ $peca->nome }}</h1>

<p><strong>Categoria:</strong> {{ $peca->categoria }}</p>

<p><strong>Fabricante:</strong> {{ $peca->fabricante }}</p>

<p><strong>Modelo:</strong> {{ $peca->modelo }}</p>

<p><strong>Quantidade:</strong> {{ $peca->quantidade }}</p>

<p><strong>Preço:</strong> R$ {{ $peca->preco }}</p>

<p><strong>Descrição:</strong> {{ $peca->descricao }}</p>

<a href="{{ route('pecas.index') }}">
Voltar
</a>

</body>
</html>