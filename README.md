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
- [Yajra Datatable](https://yajrabox.com/docs/laravel-datatables/10.0)
- [PEST Testing Framework](https://pestphp.com)

### Seeder
```bash
php artisan db:seed
```

or,

You can run by one by one
```bash
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=ManagerSeeder
php artisan db:seed --class=ProjectSeeder
```

### Testing 
If need to run test, then please run the following command after DB Seed 

```bash
./vendor/bin/pest
```
or run individually
```bash
./vendor/bin/pest tests/Feature/LoginTest.php
./vendor/bin/pest tests/Feature/ProjectTest.php
```



### Working Procedure
- When rollback first drop the Foreign keys and then others. 
- Yajra Datatable for server side rendering
- jQuery Aajx for doing all action without reload
- Sweetalert used for display success or error message 
- A member can not see other task except his.


### Manager Credentials 
Email: manager@gmail.com <br>
Password: manager123
