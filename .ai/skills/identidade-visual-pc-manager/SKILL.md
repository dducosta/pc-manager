---
name: identidade-visual-pc-manager
description: Use esta skill sempre que criar ou alterar qualquer view Blade, layout, componente ou tela do PC Manager, para manter consistência visual em todo o sistema (cores, tipografia, espaçamento, componentes e responsividade).
---

# Identidade Visual — PC Manager

O PC Manager é um sistema de gerenciamento de estoque de peças de computador. Todas as telas devem seguir o mesmo padrão visual abaixo, para que o sistema pareça ter sido construído por uma única pessoa, de forma consistente.

## Paleta de cores

- **Primária (ações principais, botões, links ativos):** `slate-900` / `blue-600`
- **Secundária (fundos, cards):** `white` / `slate-50`
- **Bordas e divisores:** `slate-200`
- **Texto principal:** `slate-900`
- **Texto secundário:** `slate-500`
- **Sucesso (ex: peça cadastrada):** `emerald-600`
- **Erro/Exclusão:** `red-600`
- **Alerta (ex: estoque baixo):** `amber-500`

Use sempre as classes utilitárias do Tailwind já configurado no projeto — nunca cores hexadecimais soltas no HTML.

## Tipografia

- Fonte do projeto (a já definida no `app.blade.php` / `vite.config.js`), sem misturar outras fontes.
- Títulos de página: `text-2xl font-semibold text-slate-900`
- Subtítulos de seção: `text-lg font-medium text-slate-700`
- Texto de corpo: `text-sm text-slate-600`
- Labels de formulário: `text-sm font-medium text-slate-700`

## Layout padrão de página

Toda página autenticada deve seguir esta estrutura:

1. Sidebar ou navbar fixa (já existente no layout base) com links: Dashboard, Peças, Sair.
2. Cabeçalho da página com título (`text-2xl font-semibold`) e, quando aplicável, botão de ação principal alinhado à direita (ex: "Nova Peça").
3. Conteúdo principal em um container com `max-w-7xl mx-auto px-4 py-6`.
4. Cards e tabelas com `bg-white rounded-lg shadow-sm border border-slate-200`.

## Componentes reutilizáveis

- **Botão primário:** fundo `blue-600`, texto branco, `rounded-md px-4 py-2 font-medium hover:bg-blue-700`.
- **Botão secundário/cancelar:** fundo branco, borda `slate-300`, texto `slate-700`.
- **Botão destrutivo (excluir):** fundo `red-600`, texto branco, sempre com confirmação (modal ou `onsubmit="return confirm(...)"`).
- **Inputs:** `rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500`, com mensagem de erro em `text-sm text-red-600` abaixo do campo quando houver `@error`.
- **Badges de status** (ex: estoque baixo/ok): pílula colorida (`rounded-full px-2 py-1 text-xs font-medium`).
- **Tabela de listagem:** cabeçalho `bg-slate-50 text-xs uppercase text-slate-500`, linhas com `hover:bg-slate-50`, ações (editar/excluir) sempre na última coluna.

## Responsividade

- Mobile-first: toda tela precisa funcionar em telas pequenas antes de adicionar breakpoints (`sm:`, `md:`, `lg:`).
- Tabelas longas (ex: listagem de peças) devem ter `overflow-x-auto` em telas pequenas, ou colapsar para cards em mobile quando fizer sentido.
- Sidebar deve recolher para um menu hambúrguer abaixo do breakpoint `md`.

## UX e mensagens

- Toda ação de criar/editar/excluir deve dar feedback visual (flash message de sucesso em verde, erro em vermelho).
- Formulários devem mostrar os erros de validação ao lado de cada campo, nunca apenas um alerta genérico no topo.
- Ações destrutivas (excluir peça) sempre pedem confirmação antes de executar.

## O que evitar

- Não misturar Bootstrap, CSS inline ou outro framework junto com Tailwind.
- Não criar paletas de cor novas por tela — reutilizar sempre as classes acima.
- Não duplicar componentes (botão, card, badge) com estilos levemente diferentes em cada view; extrair para Blade components (`resources/views/components`) quando o mesmo padrão se repetir 2+ vezes.
