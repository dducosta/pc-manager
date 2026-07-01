---
name: seguranca-pc-manager
description: Use esta skill ao implementar autenticação, autorização, formulários ou qualquer rota que manipule dados do PC Manager, para evitar falhas comuns de segurança (acesso indevido, mass assignment, CSRF, exposição de dados sensíveis).
---

# Segurança — PC Manager

## Autenticação e sessão

- Todas as rotas que não sejam login/registro/recuperação de senha devem estar protegidas pelo middleware `auth`.
- Nunca expor a senha (mesmo hash) em respostas, logs ou `dd()`/`dump()` deixados no código.
- Usar sempre `Hash::make()` para gravar senha; nunca salvar senha em texto puro, nem em seeders.

## Autorização

- Se o sistema tiver mais de um perfil de usuário (ex: Administrador vs. usuário comum), usar Policies ou checagens explícitas (`$user->isAdmin()`) antes de permitir ações sensíveis como excluir peças ou gerenciar usuários.
- Nunca confiar apenas em esconder um botão na view — toda ação sensível precisa ser validada também no controller/middleware, porque a rota pode ser acessada diretamente.

## Proteção de formulários e dados

- Todo formulário Blade usa `@csrf`.
- Mass assignment controlado via `$fillable` no model (nunca `$guarded = []`), para impedir que um usuário malicioso envie campos extras no formulário (ex: tentar virar admin via campo escondido).
- Validação de entrada sempre no backend (Form Request), mesmo que já exista validação no HTML/JS do frontend.

## Banco de dados

- Nunca montar queries SQL concatenando strings com input do usuário — usar sempre Eloquent/Query Builder com bindings.
- `.env` nunca deve ser commitado no repositório (já deve estar no `.gitignore`); apenas `.env.example` com valores fictícios.

## Exposição de informação

- Em produção, `APP_DEBUG` deve ser `false` para não vazar stack traces e caminhos do servidor para o usuário final.
- Mensagens de erro de login devem ser genéricas ("credenciais inválidas"), sem informar se o e-mail existe ou não no sistema.

## Checklist rápido antes de finalizar uma feature

- [ ] A rota está protegida pelo middleware correto?
- [ ] O Form Request valida e sanitiza todos os campos esperados?
- [ ] O model usa `$fillable` (não `$guarded = []`)?
- [ ] Existe `@csrf` no formulário?
- [ ] Algum dado sensível (senha, token) está sendo exposto em log, view ou resposta JSON sem necessidade?
