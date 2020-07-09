Developement Notes::

1. vendor/laravel/ui/auth-backend/ResetsPasswords.php

    changed 

    $user->password = Hash::make($password);
    
    to
    
    $user->password = $password;