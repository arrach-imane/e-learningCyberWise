<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_bank';
    protected $primaryKey = 'bank_id';

    protected $fillable = [
        'user_id',
        'balance',
    ];
}
