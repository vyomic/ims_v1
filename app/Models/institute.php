<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'institute';

    // Define the primary key column
    protected $primaryKey = 'institute_id';

    // Disable auto-increment if the primary key is not an incrementing integer
    public $incrementing = true;

    // Define the columns that are mass assignable
    protected $fillable = [
        'inst_name',
        'inst_type',
        'inst_course',
        'inst_spec',
        'inst_affil',
        'inst_email',
        'inst_email_verified_at',
        'phone',
        'address',
        'website',
        'owner_name',
        'owner_email',
        'user_id'
    ];

    // Cast specific attributes to a certain data type
    protected $casts = [
        'inst_email_verified_at' => 'datetime',
    ];

    // Define any relationships if applicable (e.g., one-to-many, many-to-many, etc.)
    // Example: if there's a relationship with a `User` model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
