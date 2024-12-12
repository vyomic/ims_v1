<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inStr extends Model
{
    use HasFactory;

    // Specify the table name, since it is 'teacher' not 'teachers'
    protected $table = 'inStr';

    // Specify the primary key column name (optional, if you have a custom one)
    protected $primaryKey = 'id';

    // Fields that are mass assignable
    protected $fillable = [
        'depName',
        'depCode',
        'depType',
        'depHead',
        'instituteId',
    ];


    // Relationships

    // A dep belongs to an institute
    public function institute()
    {
        return $this->belongsTo(Institute::class, 'instituteId');
    }

}

