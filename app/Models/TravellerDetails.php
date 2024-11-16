<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravellerDetails extends Model
{
    use HasFactory;

    protected $table = 'traveller_details';
    protected $fillable = ['tripname', 'packagecost' , 'description' , 'destinationimage' , 'hotelname' , 'rating', 'hotelimage', 'hotellocation'];

    public function tdetails()
    {
        return $this->hasto(Tdetail::class);
    }
}
