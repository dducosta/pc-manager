---
name: testes-pc-manager
description: Use esta skill ao escrever ou revisar testes automatizados (Feature ou Unit) para o PC Manager, garantindo cobertura mínima de autenticação e dos CRUDs principais com PHPUnit/Pest.
---

# Testes — PC Manager

O projeto já possui a pasta `tests/` e `phpunit.xml` configurados pelo `laravel/laravel`. Esta skill define o padrão mínimo de testes esperado.

## Organização

- `tests/Feature/` — testes que simulam o uso real da aplicação via HTTP (login, criar peça, editar peça, excluir peça, listar peças).
- `tests/Unit/` — testes isolados de lógica de model/classe, sem subir a aplicação inteira (ex: um scope de busca, um cálculo de estoque).

## Banco de dados de teste

- Usar `RefreshDatabase` (ou `DatabaseTransactions`) em todo teste Feature que toca o banco, para garantir que cada teste rode em um estado limpo.
- Nunca rodar os testes contra o banco de desenvolvimento/produção — usar SQLite em memória (`:memory:`) configurado em `phpunit.xml` para os testes.

## O que testar como mínimo obrigatório

1. **Autenticação**
   - Usuário consegue logar com credenciais válidas.
   - Login falha com credenciais inválidas.
   - Rotas protegidas redirecionam para login quando o usuário não está autenticado.

2. **CRUD de Peças**
   - Listagem (`index`) retorna status 200 para usuário autenticado.
   - Criar peça com dados válidos persiste no banco e redireciona com mensagem de sucesso.
   - Criar peça com dados inválidos retorna os erros de validação esperados (ex: campo obrigatório vazio).
   - Editar peça atualiza os dados corretamente.
   - Excluir peça remove o registro do banco.

## Padrão de um teste Feature

```php
public function test_usuario_autenticado_pode_criar_peca(): void
{
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/pecas', [
        'nome' => 'Placa de vídeo RTX 4060',
        'quantidade' => 10,
        'preco' => 1899.90,
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('pecas', ['nome' => 'Placa de vídeo RTX 4060']);
}
```

## Boas práticas

- Usar Factories (`database/factories`) para gerar dados de teste, nunca depender de dados fixos do Seeder de produção.
- Nomear os testes de forma descritiva (`test_usuario_nao_autenticado_nao_acessa_listagem_de_pecas`), para que o nome do teste já explique o que está sendo validado.
- Rodar `php artisan test` (ou `./vendor/bin/phpunit`) antes de cada commit que altere lógica de CRUD ou autenticação.
- Testes devem ser independentes entre si — a ordem de execução não pode afetar o resultado.
