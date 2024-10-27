<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role',
        'user_photo',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the bank cost associated with the user.
     *
     * @return float|null
     */
    public function getUserBankCost()
    {
        // Ensure the relationship 'bank' is correctly defined in your User model
        $bank = $this->bank;

        if ($bank) {
            return $bank->balance; // Adjust this according to your BankModel attributes
        } else {
            return null; // Handle the case where bank record is not found
        }
    }

    /**
     * Define a relationship with BankModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bank()
    {
        return $this->hasOne(BankModel::class, 'user_id', 'user_id');
    }
    // App\Models\User.php
    public function courses()
    {
        return $this->hasMany(CoursesModel::class, 'user_id');
    }
}
