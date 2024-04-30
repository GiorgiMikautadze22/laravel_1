<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs_listings';

    //protected $fillable = ['employer_id','title', 'salary']; //we specify which attributes can be mass-assigned.(Its for protecting data from malicious http requests)

    protected $guarded = []; //we are specifying which attributes should be guarded from being mass assigned. If empty array we are saying nothing to guard.

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'jobs_listings_id');
    }
}
