<div align='center'>

# Task Management System 

</div>

### Database Schema
#### [Click Here](https://drawsql.app/teams/irfan-chy/diagrams/task-management-system)

### Requirements
- PHP - 8.1
- Laravel- 10
- MySQL - 8

### Packages
- [Laravel Pint](https://laravel.com/docs/10.x/pint)
- Default Auth
- [Artisan View](https://github.com/svenluijten/artisan-view)


### Seeder
You can run by one by one

```bash
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=ManagerSeeder
php artisan db:seed --class=ProjectSeeder
```
or,

```bash
php artisan db:seed
```

### Working Procedure
- When rollback first drop the Foreign keys and then others. 
- Yajra Datatable for server side rendering
- jQuery Aajx for doing all action without reload
- Sweetalert used for display success or error message 

### Manager Credentials 
Email: manager@gmail.com <br>
Password: manager123
