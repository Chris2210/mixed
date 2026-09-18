$table->id();
            $table->string('name');
            $table->string('route');
            $table->string('date');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->unsignedBigInteger('operation_id');
            $table->foreign('operation_id')->references('id')->on('toperations');


# Laravel infiere que quieres crear una tabla por el prefijo "create_"
php artisan make:migration create_photos_table

# Migración para modificar una tabla existente
php artisan make:migration add_discount_to_products_table --table=products

# Especificando la tabla explícitamente
php artisan make:migration create_order_items_table --create=order_items

php artisan make:migration create_photos_table
php artisan make:migration add_mobile_to_users_table --table=users


https://www.concretepage.com/angular/angular-select-option-reactive-form#google_vignette

php artisan make:controller UsuariosController
# mixed
