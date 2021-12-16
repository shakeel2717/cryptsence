<?php
// generating 6 digit unique user code

use App\Models\User;

function generate_user_code($userType)
{
    $rand = rand(10000000, 99999999);
    $code = $userType . $rand;
    $user = User::where('code', $code)->first();
    if ($user) {
        generate_user_code($userType);
    } else {
        return $code;
    }
}
