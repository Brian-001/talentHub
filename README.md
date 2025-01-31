# Laravel and Fortify user multi-auth

Create a laravel project

Install Laravel Fortify

Publish the config file

Create auth folder in views and populate them with the following basic view files:
<ul>
    <li>login</li>
    <li>registration</li>
</ul>

Register the following in `app\Providers\FortifyServiceProvider`:

```php
public function boot(): void
{
    Fortify::loginView(function(){
        return view('auth.login');
    });

    Fortify::registerView(function(){
        return view('auth.registration', ['roles' =>Role::all()]);
    });
}
```

Create the following migration tables:
<ul>
    <li>roles</li>
    <li>permissions</li>
    <li>role_permission</li>
</ul>

Create their respective Models

In `roles` table

```php
public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }
```
In `permissions` table

```php
public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }
```
In `role_permission` table

```php
public function up(): void
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->primary(['role_id', 'permission_id']);
            $table->timestamps();
        });
    }
```

`role_id` references primary key of roles table. Similary, `permission_id` referenced id in permissions table.

`constrained()` ensures that foreign key constraint is enforced.

`cascade(onDelete)` means when a record in referenved roles table is deleted, all corresponding records in `role_permission` table will be deleted.

In `Role` model

```php

```