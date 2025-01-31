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

`cascade(onDelete)` means when a record in referenced either in roles or permissions table is deleted, all corresponding records in `role_permission` table will be deleted.

`primary(['role_id', 'permission_id']);` is the composite keyof the table. It ensures that a unique combination of a role and permission can only exist once in table.

In `Role` model

```php
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
```

In `Permission` model 

```php
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
```

In `User` model add the following:

```php
protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',//Add this line 
    ];
```

Create `AuthServiceProvider` and ensure the following code is there in `boot()`

```php
public function boot(): void
    {
        //
        $this->registerPolicies();

        foreach(Permission::all() as $permission){
            Gate::define($permission->name, function($user) use ($permission){
                return $user->role->permissions->contains('name', $permission->name);
            });
        }
    }
```

`registerPolicies()` used to register any polices defined in your application

`foreach(Permission::all() as $permission){` iterates all permissions that are defined 

`Gate::define()` registers a new authorization gate

`$permission->name` is the name of the gate that will be used to check for permission. ie create users

`$user->role` ensures that there is a relationship between User and Role models

`$user->role->permissions` retrieves permissions that are associated with user role.

`contains('name', $permission->name)` Checks if the collection of permissions contains a the same name as the current `$permission`

