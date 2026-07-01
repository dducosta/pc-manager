---
name: crud-padrao-pc-manager
description: Use esta skill sempre que criar, revisar ou alterar um recurso CRUD (peças, categorias, fornecedores, usuários etc.) no PC Manager, para garantir que controllers, rotas, validações, views e mensagens sigam sempre a mesma estrutura.
---

# Padrão de CRUD — PC Manager

Todo recurso CRUD do sistema (peças de computador e quaisquer outras entidades futuras) deve seguir exatamente esta estrutura, para que o código fique previsível e fácil de manter.

## Estrutura de pastas e arquivos

Para um recurso `Peca`, por exemplo:

- `app/Models/Peca.php`
- `app/Http/Controllers/PecaController.php` (controller `resource`, sem lógica de negócio pesada dentro dele)
- `app/Http/Requests/StorePecaRequest.php` e `app/Http/Requests/UpdatePecaRequest.php` (Form Requests — nunca validar direto no controller)
- `database/migrations/xxxx_create_pecas_table.php`
- `database/seeders/PecaSeeder.php` (quando aplicável)
- `resources/views/pecas/index.blade.php`
- `resources/views/pecas/create.blade.php`
- `resources/views/pecas/edit.blade.php`
- `resources/views/pecas/show.blade.php` (se fizer sentido para o recurso)

## Rotas

Sempre usar rotas resourceful, nunca rotas soltas para CRUD:

```php
Route::resource('pecas', PecaController::class)
    ->middleware('auth');
```

## Controller

- Usar `Route::resource` + métodos padrão (`index`, `create`, `store`, `edit`, `update`, `destroy`, e `show` se necessário).
- O controller recebe o Form Request já validado — não validar manualmente dentro do método.
- Toda consulta que pode ter muitos registros (`index`) usa **paginação** (`->paginate(15)`), nunca `->get()` sem limite.
- Buscas/filtros (ex: pesquisa de peças) ficam isoladas em um método ou query scope no model, não espalhadas no controller.

## Form Requests (validação)

- Toda regra de validação fica no Form Request correspondente, nunca no controller.
- Mensagens de erro em português, claras para o usuário final.
- Reaproveitar regras comuns entre Store e Update sempre que possível (ex: método `commonRules()` no Request ou um Trait).

## Views

- `index`: tabela paginada, com link para criar novo registro, ações de editar/excluir por linha, e busca quando aplicável.
- `create`/`edit`: mesmo formulário (extraído para uma partial `_form.blade.php` compartilhada), evitando duplicar o HTML do formulário em dois arquivos.
- Excluir sempre via formulário com método `DELETE` e confirmação (nunca link GET para destruir registro).

## Mensagens e feedback

- Após criar/editar/excluir, redirecionar com `->with('success', 'Mensagem clara')`.
- Erros de validação aparecem automaticamente via `$errors` do Laravel ao lado de cada campo.
- Mensagens sempre em português e específicas (ex: "Peça cadastrada com sucesso", não apenas "Sucesso").

## Boas práticas obrigatórias

- Mass assignment: usar `$fillable` no model, nunca `$guarded = []`.
- Toda chave estrangeira tem sua relação (`belongsTo`, `hasMany`) definida no model correspondente.
- Nomes de tabelas, colunas e rotas em português ou inglês de forma consistente em todo o projeto (escolher um padrão e manter).
- Toda alteração de schema é feita via migration nova — nunca editar uma migration já commitada/executada em produção.
- Seeders de teste devem ser idempotentes (usar `firstOrCreate`/`updateOrCreate` quando fizer sentido) para poder rodar `db:seed` mais de uma vez sem duplicar dados.

## O que evitar

- Lógica de negócio dentro da view.
- Queries diretas (`DB::table`) quando existe um Eloquent Model para o recurso.
- Validação duplicada (no controller e no Form Request ao mesmo tempo).
- Rotas fora do padrão `resource` sem justificativa clara.
