<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tdetail extends Model
{
    use HasFactory;
    protected $table = 'table__tdetail';
    protected $fillable = ['traveller_details_id', 'dob', 'fname' , 'lname' , 'contact' , 'email' , 'npassengers'];
    
    public function TravellerDetails()
    {
        return $this->belongsTo(TravellerDetails::class);
    }
}
