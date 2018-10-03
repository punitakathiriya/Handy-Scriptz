<?php

/*
Fix for MariaDB or older versions of MySQL when running migrations.
Just place it in your AppServiceProvider.php file.
*/

use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
