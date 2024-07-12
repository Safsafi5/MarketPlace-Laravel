<?php

namespace Modules\Shop\Repositories\Font\Interfaces;

interface TagRepositoryInterface {
    public function findAll($options = []);
    public function findBySlug($slug);
}
