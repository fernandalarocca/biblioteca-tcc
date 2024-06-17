<p align="center"><a href="#" target="_blank"><img src="/resources/views/layouts/assets/images/bibliotec%20logo.png" width="400" alt="Laravel Logo"></a></p>

## Sobre o BiblioTec

BiblioTec é um sistema de gerenciamento de biblioteca feito para o bibliotecário organizar os autores, livros e empréstimos em seu estabelecimento.

### Funcionalidades
- Criar, listar, editar e excluir autores.
- Criar, listar, editar e excluir livros.
- Criar, listar, editar e excluir usuários.
- Criar, listar, editar e excluir empréstimos de livros.
- Marcar quando o livro emprestado tiver sido devolvido.

O sistema foi desenvolvido utilizando a linguagem de programação <a href="https://www.php.net">PHP</a> com o framework <a href="https://laravel.com">Laravel</a>, o front-end foi feito usando o <a href="https://laravel.com/docs/11.x/blade#main-content">Blade</a> e o <a href="https://getbootstrap.com">Bootstrap</a> como framework CSS. Além disso, o banco de dados escolhido foi o <a href="https://www.mysql.com">MySQL</a>.

## Como Utilizar

Para maior entendimento sobre o software, farei uma explicação de como utilizá-lo.

### Autenticação

Quando abrimos o BiblioTec ele nos apresenta uma página de "Bem-vindo" solicitando que o usuário faça login. Após clicar no botão para logar, é necessário utilizar credenciais que estejam cadastradas no banco de dados. Se elas estiverem corretass, você será direcionado parra a home do sistema. Note que nela temos um cabeçalho onde você pode selecionar entre: Usuários, Livros, Autores, Empréstimos e Logs.

### Usuários

Antes de irmos para as funções que dizem respeito ao gerenciamento da biblioteca de fato, falarei sobre como funciona a criação, edição e exclusão de usuários.<br>
Na tela inicial do sistema, temos um cabeçalho, nele a primeira opção "BiblioTec" leva direto à home, ao lado direito dessa opção, temos "Usuários", cliclando nela vamos para a página com as informações sobre os usuários do sistema.<br>
Nessa página, note que temos uma tabela que lista todos os usuários cadastrados no banco e suas respectivas informações de id, nome e e-mail, além disso, temos também as datas de quando ele foi criado e editado pela última vez.<br>
Ainda nessa tela, temos algumas opções do que podemos realizar com esses usários:
- Note que no canto superior direito há um botão verde escrito "Novo Usuário", clicando nele, vamos para o formulário de criação. Dentro dele devemos preencher as informações de: Nome, e-mail e senha. Caso tenha clicado errado, pode voltar para a página anterior usando o botão "Voltar", mas, se deseja de fato criar o usuário, clique em "Criar", se todas as informações tiverem sido preenchidas corretamente você retornará para a tela de listagem, senão o sistema retornará um erro sinalizando o problema.<br>
- Em cada usuário temos um botão azul escrito "Ver", clicando nele vamos para a página que mostra as informações mais detalhadas sobre o usuário. Ainda nessa tela, temos um botão cinza escrito "Voltar" que ao ser selecionado volta para a página de listagem.
- Ao lado do botão anterior temos um botão amarelo escrito "Editar" que nos leva para a tela onde podemos editar as informações de nome e e-mail. Se você precisar editar a senha desse usuário, clique no texto azul claro que está logo abaixo do formulário e o sistema abrirá um pop-up solicitando que escreva a nova senha e confirme-a. Caso queira voltar para a tela anterior clique em "Cancelar"/"Voltar", agora se deseja realizar as alterações aperte em "Salvar"/"Editar".
- Por último, temos a opção do botão vermelho "Excluir", ao clicar nela o sistema abrirá um pop-up pedindo a confirmação se você deseja mesmo excluir esse usuário, se sim clique em "Excluir", senão clique em "Cancelar" ou no X no canto superior direito do modal.

### Autores

No BiblioTec para criarmos um empréstimo precisamos saber quais livros e quais autores serão selecionados, para criar um livro é necessário associá-lo com um autor. Portanto a primeira coisa a ser feita para usar o sistema é criar o autor.<br>
Para isso, selecione a opção "Autores" dentro do cabeçalho. As funções serão iguais aos métodos que expliquei sobre os usuários, mudando apenas as informações a serem preenchdas nos formulários.
- No botão "Novo Autor" vamos para a tela do formulário de criação, nele precisamos preencher os dados de: Nome, sobrenome, descrição e idade. Caso queira voltar para a página anterior, clique em "Voltar", mas se quer criar o autor, aperte em "criar", se houver algum problema, o sistema irá notificá-lo.
- Agora, ao clicar no botão "Ver", temos as informações de maneira mais detalhada e visível. Para voltar para a listagem, clique em "Voltar".
- Para editar o autor, clique em "Editar", faça as alterações desejadas e clique em "Editar".
- Ao lado do botão amarelo escrito "Editar" temos a opção de excluir aquele autor. Assim como com os usuários, será aberto um modal pedindo a confirmação da exclusão. Note que para excluir um autor, ele não pode estar associado a nenhum livro e nenhum empréstimo.

### Livros

Partindo agora para as funcionalidades que dizem respeito aos livros, elas vão funcionar exatamente como as outras, apenas mudando os dados necessários. Portanto, clique na opção "Livros" dentro do cabeçalho.
- Criação: Clique no botão "Novo Livro" e preencha as informações: Título, data de publicação, categoria, autor, sinopse e quantidade em estoque. Quando preencher tudo, aperte em "Criar" para salvar o livro.
- Visualização: Ao apertar no botão "Ver" temos a página que mostra com mais detalhes as informações do livro.
- Edição: Para isso, clique em "Editar" e mude os dados que deseja atualizar. Sempre lembre de clicar em "Editar" para salvar as alterações.
- Exclusão: Assim como nas outras opções ao clicar em "Excluir" o sistema abrirá um modal confirmando se você deseja mesmo excluir esse livro.

### Empréstimos

Por último, temos a função de empréstimos. Ela serve para quando o cliente pega um livro emprestado da biblioteca. Assim como os outros métodos, ela funcionará de maneira muito parecida, a única diferença é que tem algumas implementações a mais. Além disso, quando o empréstimo for criado, a quantidade de livros emprestados será automaticamente diminuída do estoque daquele livro em questão.<br>
Para utilizar clique em "Empréstimos" no cabeçalho.
- Para criar um empréstimo, clique em "Novo Empréstimo" e preencha as informações de: Nome do cliente, CPF do cliente, telefone do cliente, livro escolhido, autor do livro em questão, quantidade e data de devolução. Importante ressaltar que a quantidade de livros emprestados tem que ser menor do que a quantidade em estoque daquele livro, senão não funcionará. Quando criado, o a quantidade de livros emprestados será removida (diminuida) do estoque daquele livro específico de maneira automática.
- Para ver com mais detalhes as informações do empréstimo, clique em "Ver".
- Agora para editar o empréstimo, aperte em "Editar" e mude as informações necessárias. Note que no formulário de edição, temos um campo a mais, ele serve para que quando o livro for devolvido, o bibliotecário deve marcar como como "Sim" e, se necessário, alterar a data de devolução. Quando esse campo for marcado como verdadeiro, ou seja, "Sim", a quantidade de livros emprestados será devolvida (adicionada) novamente ao estoque de maneira automática, para que o bibliotecário não precise fazer isso manualmente.
- Por último, assim como nos outros, podemos excluir o empréstimo clicando no botão "Excluir", quando clicado abrirá um modal solicitando a confirmação da exclusão.

#### Informações importantes

Não é possível excluir um livro ou autor caso ele esteja cadastrado em algum empréstimo ou livro. Pois aquele empréstimo/livro depende da existência do item que você está tentando exlcuir. Caso tente realizar essa ação o sistema não permitirá e irá retornar uma mensagem de erro avisando ao usuário o motivo.
