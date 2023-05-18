<?php


namespace App\Helpers;


class Summary
{
    /*
        1) Migration:
            it is build table of database
            create migration by: 'php artisan make:migration create_tableName_table'
            content 'up()' that create the table with its columns
            create all table in migration by: 'php artisan migrate'
            delete all table in migration and create again by: 'php artisan migrate:fresh'

        2) Models:
            it is simulate to table of database
            create model by: 'php artisan make:model modelName'
            content:
                a- $table, $fillable, $hidden and $timestamps
                b- Accessors, Mutators, Scopes, Relations and helper functions

        3) Controller:
            the logical part that access to data from model and handle it
            create controller by: 'php artisan make:controller controllerName'
            content many of functions as CRUD Operation and any logical functions

         4) Route:
            the url that call functions of controllers
            create controller by: Route::get('url', 'controller@function')


     */
}
