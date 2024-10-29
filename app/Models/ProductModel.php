<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model {
    // initialize the table name
    protected $table = "products";
    protected $primaryKey = "primaryKey";
    protected $allowedFields = [
        'name',
        'description',
        'type',
        'quantity',
        'price',
        'status'
    ];
}
