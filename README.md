<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# AdminBase

AdminBase é um protótipo de base administrativa SaaS multicompany, pensado para acelerar novos projetos empresariais com arquitetura escalável, segurança e UI/UX responsiva.
Construído com auxílio da IA Codex da OpenAI.

## Stacks
- Laravel 12 como backend
- Inertia.js para integração entre backend e frontend
- Vue 3 para composição e renderização da interface
- Vuetify para design system e componentes
- PostgreSQL 18 como banco de dados

## Objetivos da base
- Autenticação e autorização com controle por perfis e permissões
- Gestão de usuários e perfis
- Layout administrativo padrão com escolha de brand color, navbar, sidebar e páginas-base
- Módulos iniciais de dashboard, cadastros e relatórios
- Estrutura reutilizável para evolução em sistemas administrativos reais

## Planejamento
A arquitetura inicial e os módulos planejados estão detalhados em `docs/architecture.md`.

## Convenções
As convenções de idioma e nomenclatura estão em `docs/conventions.md`.

## Instalação

Instalar dependências
```php
composer install
npm install
```

Ajustar o arquivo .env com base no .env.example e configurar base de dados
```php
cp .env.example .env
```

Gerar chave do app
```php
php artisan key:generate
```

Criar estrutura da base de dados
```php
php artisan migrate
```
