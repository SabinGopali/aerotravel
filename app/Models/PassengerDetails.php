<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassengerDetails extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'contact', 'dob','npassengers'];
}
