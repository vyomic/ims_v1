<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Specify the table name, assuming it is 'students'
    protected $table = 'students';

    // Specify the primary key column name (optional, if you have a custom one)
    protected $primaryKey = 'id';

    // Fields that are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'dob',
        'photo',
        'phone',
        'email',
        'address',
        'class',
        'admit',
        'cls_teacher',
        'presence',
        'leave',
        'institute_id',
        'add_by',
    ];

    // Cast the date fields to date type
    protected $dates = ['dob', 'admit'];

    // Specify the types of the attributes (optional but useful for validation or casting)
    protected $casts = [
        'dob' => 'date',
        'admit' => 'date',
    ];

    // Relationships

    // A student belongs to an institute
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    // A student belongs to a user (who added the student)
    public function user()
    {
        return $this->belongsTo(User::class, 'add_by');
    }

    // You can add more relationships as needed
}
