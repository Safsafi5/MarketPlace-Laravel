<?php

namespace Modules\Shop\Repositories\Font\Interfaces;

interface CategoryRepositoryInterface {
    public function findAll($options = []);
    public function findBySlug($slug);
}
