# SisMed - Sistema de gerenciamento de clínicas
### Descrição
> Sistema que gerencia uma rede de clínicas.
### Pré-requisitos
```
Um computador com o navegador Google Chrome ou Mozilla Firefox instalado e atualizado, com Javascript habilitado.
```
### Finalidade
Projetar um sistema integrado que possibilitará a empresa um aumento na produtividade, mantendo a confiabilidade nos dados nele presente
--ao funcionário melhorar seu rendimento podendo salvar seus dados de trabalho em um servidor remoto e ao mesmo tempo possibilitar que a direção possa gerir esses dados, além de acesso a relatórios que poderão ser utilizados como métrica para o desempenho dos empregados.

> Os diretores têm acesso máximo ao sistema, podendo acessar e modificar os seguintes dados:
- Dados cadastrais de todos os funcionários
- Dados das ações de todos os funcionários, como consultas (no caso de médicos)
- Dados cadastrais de todos os pacientes
- Dados de diagnósticos de todos os pacientes

> Os técnicos administrativos têm acesso a tudo que diz respeito aos pacientes, porém com restrições nos dados de funcionário quando comparado ao diretor, seguem abaixo mais detalhes:
- Dados cadastrais de todos os funcionários de cargo inferior a diretor
- Dados cadastrais de todos os pacientes
- Dados de diagnósticos de todos os pacientes

> Um médico pode acessar apenas os dados referente às suas próprias consultas e diagnósticos, além dos dados de diagnóstico de pacientes:
- Dados das próprias consultas, diagnósticos e exames
- Dados de diagnósticos de todos os pacientes

### Regras de uso do git
- Ao dar commit o membro da equipe deverá selecionar apenas os arquivos que realmente foram editados, é obrigatório que o membro da equipe insira uma mensagem que descreva as alterações no arquivo, visando posteriormente a possibilidade de rastrear as alterações realizadas no mesmo, é opcional a inserção de um comando para fechar a tarefa relacionada (ex: closes #999), já que para realizar um commit não necessáriamente o desenvolvedor deve ter solucionado o problema.
- Uma nova branch só será utilizada caso a equipe veja alguma necessidade de testar temporariamente alguma possível grande alteração no projeto, visando uma rápida tomada de decisão sobre a implementação do projeto, resultando em um merge com a branch master, para que toda a equipe volte a trabalhar apenas com a branch principal.
- O arquivo .gitignore foi criado utilizando o serviço gitignore.io, visando não realizar commit de arquivos com as extensões especificadas no mesmo, nesse projeto, o utilizamos para não realizar o commit de arquivos dos editores de texto/IDE(Sublime e VS Code) e do arquivo contendo as credenciais do banco de dados.

### Tecnologias
- PHP 7.2
- MYSQL
- Javascript
