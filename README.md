# Sistema Clínico

Sistema simples para clínicas em Laravel 13 com SQLite. Permite cadastrar pacientes, agendar consultas e registrar prontuários.

## Funcionalidades

- **Pacientes:** cadastrar, listar, ver ficha, editar e excluir (CPF único).
- **Consultas:** agendar, listar, ver, editar e excluir. Um médico não pode ter duas consultas no mesmo dia e horário.
- **Prontuários:** registrar anamnese, exame físico, diagnóstico e conduta por consulta, com edição posterior. Cada consulta tem no máximo um prontuário.

Rotas principais:

| Rota | Função |
|---|---|
| `/pacientes` | Lista e cadastro de pacientes |
| `/pacientes/{id}` | Ficha do paciente com suas consultas |
| `/consultas` | Agenda de consultas |
| `/consultas/{id}` | Detalhes da consulta e do prontuário |
| `/prontuarios/create/{consultaId}` | Registrar prontuário |
| `/prontuarios/{id}/edit` | Editar prontuário |

## Instalação

Requisitos: PHP 8.3+, Composer e Node.js (opcional, para assets).

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Depois acesse `http://127.0.0.1:8000`. O `--seed` cria uma paciente de exemplo com uma consulta e um prontuário.

No `.env`, o banco padrão já é SQLite. Se quiser usar outro arquivo, defina `DB_DATABASE` com o caminho absoluto.

## Testes

```bash
php artisan test
```

Os testes em `tests/Feature/ClinicaTest.php` cobrem cadastro, CPF duplicado, conflito de horário, reagendamento, prontuário sem duplicação e exclusão em cascata.

## Próximos passos sugeridos

- Autenticação (login para médicos e recepcionistas), por exemplo com Laravel Breeze ou Sanctum.
- Layout comum (um único template Blade com menu) e tradução das mensagens de validação para pt_BR.
- Log de auditoria de acesso aos prontuários, por causa da LGPD.
