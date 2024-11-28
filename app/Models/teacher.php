<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Specify the table name, since it is 'teacher' not 'teachers'
    protected $table = 'teacher';

    // Specify the primary key column name (optional, if you have a custom one)
    protected $primaryKey = 'id';

    // Fields that are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'dob',
        'phone',
        'email',
        'address',
        'max_qualification',
        'doj',
        'subject',
        'institute_id',
        'add_by',
        'experience',
        'last_employe',
        'class',
        'schedule'
    ];

    // Specify the types of the attributes (optional but useful for validation or casting)
    protected $casts = [
        'dob' => 'date',
        'doj' => 'date',
    ];

    // Relationships

    // A teacher belongs to an institute
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    // A teacher belongs to a user (who added the teacher)
    public function user()
    {
        return $this->belongsTo(User::class, 'add_by');
    }

    // You can add more relationships as needed
}
