<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFlight extends Model
{
    use HasFactory;
    protected $table = 'add_flights';
    protected $fillable = ['Flight_Number', 'is_economy_available' , 'is_business_available' , 'NOS_Economy' , 'NOS_Business' , 'NOS_Total'];    

}
