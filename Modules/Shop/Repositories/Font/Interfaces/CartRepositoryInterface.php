<?php

namespace Modules\Shop\Repositories\Font\Interfaces;

use App\Models\User;

interface CartRepositoryInterface {
    public function findByUser(User $user);
}
