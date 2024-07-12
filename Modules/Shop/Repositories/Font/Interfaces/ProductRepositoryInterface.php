<?php

namespace Modules\Shop\Repositories\Font\Interfaces;

interface ProductRepositoryInterface{
    public function findAll($options = []);
    public function findBySku($sku);
}
