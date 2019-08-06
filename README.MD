# Megafon Virtual ATS CRM Integration

Megafon REST API (совсем не REST) для виртуальной АТС. Служит для интеграции в вашу CRM-систему. 
Данная реализация написана конкретно для Laravel-Framework.
Отлично подойдет для "Symfony Based" фреймворков.

# Возможности

  - Все методы из документации
  - Реализует все хуки из API  (генерирует события)
  - Особая уличная магия

Тут еще пока ничего не оттестировано :cry:


Использование

`
use MegafonVirtualAts;
$api_call = new MegafonVirtualAts('token');
`
