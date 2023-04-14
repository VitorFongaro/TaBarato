#TaBarato

Projeto realizado sendo um trabalho acadêmico.

--- Requisitos ---
- Aplicação necessita de servidor local, com linguagem PHP. No arquivo 'conexao.php' (php/conexao.php), deve alterar o valor da variável '$banco' para o nome do seu banco de dados, ou criar um com o mesmo nome.
- Importar o banco de dados 'ta_barato.sql'

--- Linguagens usadas ---
- HTML/CSS
- PHP
- Aplicação testada no XAMPP

--- Aplicação ---
- O site reúne preços de produtos de cada mercado. Atualmente conta com 12 produtos, podendo futuramente, adicionar outros.
- Foi criado para servir de exemplo 3 mercados, porém, pode registrar outro mercado na tela de cadastro. Cada mercado tem seu ID, nome, CNPJ, email, senha e endereço. Os valores para o ID, CNPJ e email tem que ser diferente dos outros, além de que, o ID se autoincrementa quando adicionado outro mercado.
- Cada produto tem seu código, ID, nome, preço, data de atualização e quantidade, além de estar relacionado ao próprio mercado. O código também se autoincrementa. O ID e nome estão relacionados (EX: Todo alface tem o ID = 1).
- Na tela principal, a 6 produtos em destaque, porém na barra de pesquisa, apareçe todos. Tanto a barra quanto o destaque leva para tela dos preços relacionado ao produto, ordenado de forma que o mercado mais barato fique no topo. Se o mercado não tem estoque, deixou o preço vazio ou igual a 0, aparecerá traços na coluna dos preços e das datas.
- Há 2 acionadores. Um faz com que sempre que altere o preço do produto, a data automaticamente atualiza. O outro acionador, faz com que sempre que um novo mercado é adicionado, é criado os 12 produtos relacionados ao novo mercado, sem preço e com estoque = 0.
- Há também um formatador de CNPJ, onde o usuário pode digitar com pontuação ou sem. Ele avisa também se o CNPJ é diferente de 14 dígitos.
- Se um mercado for excluído, também é deletado os produtos relacionado a ele.
- Para entrar como administrador, no campo email digite 'admin@admin' e no de senha 'admin'. O administrador pode excluir mercados e editá-los.
- Quando o gerente do mercado logar, ele pode alterar tanto a quantidade quanto o preço de seus produtos.

--- Login ---
- Email e senha de cada mercado registrado (emails apenas para servir se exemplo):
- Supermercado avenida - Email: avenida@gmail.com | Senha: 12345678
- Supermercado Amigão - Email: supermercado.amigão@gmail.com | Senha: 12345678
- Supermercado Bom preço - Emai: mercado_BomPreco@gmail.com | Senha: 12345678
