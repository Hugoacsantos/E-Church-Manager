# API de Gestão de Igreja

## Descrição

A API de Gestão de Igreja é uma aplicação robusta desenvolvida em Laravel 11, projetada para facilitar a administração e organização das atividades de uma igreja. Esta API fornece uma interface intuitiva para gerenciar membros, eventos, doações, grupos e serviços, permitindo que os líderes e administradores da igreja mantenham tudo em ordem e facilmente acessível.

## Funcionalidades

### 1. Gerenciamento de Membros
- **Cadastro de Membros**: Adicione novos membros com informações como nome, e-mail, telefone e data de nascimento.
- **Atualização de Membros**: Edite as informações dos membros existentes.
- **Listagem de Membros**: Retorne uma lista paginada de todos os membros, com filtros de busca.

### 2. Eventos
- **Criação de Eventos**: Agende eventos informando data, hora, local e descrição.
- **Atualização de Eventos**: Edite detalhes dos eventos programados.
- **Listagem de Eventos**: Retorne todos os eventos programados com opções de busca.

### 3. Doações
- **Registro de Doações**: Registre doações com valor, data e método (dinheiro, transferência, etc.).
- **Histórico de Doações**: Acesse o histórico de doações de cada membro, filtrando por período.

### 4. Grupos e Ministérios
- **Cadastro de Grupos**: Crie grupos e ministérios, definindo nome, descrição e membros.
- **Gerenciamento de Participantes**: Adicione ou remova membros de grupos existentes.
- **Listagem de Grupos**: Retorne uma lista de todos os grupos com informações sobre suas atividades.

### 5. Serviços e Cultos
- **Agendamento de Cultos**: Agende cultos semanais e eventos especiais.
- **Participação em Cultos**: Registre a presença dos membros nos cultos, com relatórios sobre frequência.

## Documentação da API
- **Swagger/OpenAPI**: A API é documentada utilizando Swagger, proporcionando uma interface interativa para visualizar e testar os endpoints disponíveis.

## Tecnologias Utilizadas
- **Framework**: Laravel 11
- **Banco de Dados**: MySQL ou SQLite

## Instalação

### Pré-requisitos
- PHP 8.2 ou superior
- Composer
- MySQL ou SQLite
