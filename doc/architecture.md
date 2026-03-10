# Arquitetura inicial do AdminBase

## Diretrizes
- Multicompany desde o core
- Isolamento lógico por company
- Segurança por padrão
- Componentização do frontend
- Pronto para escalar horizontalmente

## Blocos funcionais
1. Identidade e acesso
    - Login com sessões seguras
    - Política de senha
    - Recuperação de acesso
    - RBAC com perfis e permissões

2. Modelo multicompany
    - Modelo tenant-aware
    - Escopo automático por `company_id` nas queries
    - Administração global com papéis restritos

3. Administração de usuários
    - Cadastro e gerenciamento de usuários
    - Associação de usuários a companies
    - Controle de perfis

4. Base de navegação
    - Navbar com contexto de company e usuário
    - Sidebar com menus por permissão
    - Brand color e padrão de páginas

5. Módulos iniciais
    - Dashboard
    - Cadastros
    - Relatórios

## Arquitetura backend
- Laravel com camadas de domínio por contexto
- Policies e Gates para autorização
- Form Requests para validação
- Migrations com índices e constraints voltadas à escala
- Serviço de auditoria para ações críticas

## Arquitetura frontend
- Inertia para transporte de dados e composição de rotas entre Laravel e Vue
- Vue 3 responsável pela composição e renderização das telas
- Vuetify com tema base e tokens de design
- Gerenciamento de estado focado em sessão, permissões e contexto de company

## Modelo inicial de entidades
- companies
- users
- roles
- permissions
- role_user
- permission_role
- company_user
- audit_logs

## Campos de escopo por company
- `company_id` em tabelas de domínio compartilhado
- Índices compostos com `company_id` para consultas críticas
- Constraints para reforçar integridade entre company e relacionamentos

## Segurança mínima obrigatória
- Hash de senha forte
- Proteção contra brute force em login
- CSRF habilitado
- Sanitização e validação de entrada
- Logs e trilha de auditoria
- Segregação de permissões por company

## Roadmap de implementação
1. Bootstrap Laravel + Inertia + Vue + Vuetify
2. PostgreSQL e configuração base de ambiente
3. Módulo de autenticação
4. Módulo de autorização RBAC
5. Modelo multicompany base
6. Layout front responsivo
7. Escolha de Brand Color para criação de theme
8. CRUD de usuários, companies e perfis
9. Dashboard e relatórios iniciais
