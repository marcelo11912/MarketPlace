<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }
    public function browse(User $user)
    {
        
        return $user->hasRole('seller');
    }
    
    public function read(User $user, Producto $producto)
    {
        
        return $user->id == $producto->shops->user_id;
    }

    public function edit(User $user, Producto $producto)
    {
        if(empty($producto->shops)){
            return false;
        }
        return $user->id == $producto->shops->user_id;
    }

    public function add(User $user)
    {
        return $user->hasRole('seller');
    }
    
    public function delete(User $user, Producto $producto)
    {   
        if(empty($producto->shops)){
            return false;
        }
        return $user->id == $producto->shops->user_id;
    }
}
