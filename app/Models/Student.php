<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $cpf
 * @property DateTime $birth_date
 */
class Student extends Model
{
    use HasFactory;


    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    protected $fillable = ['name', 'cpf', 'birth_date'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student';

    /**
     * Get the value of birthDate
     *
     * @return  DateTime
     */ 
    public function getBirthDate()
    {
        return $this->attributes['birth_date'];
    }

    /**
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->attributes['name'];
    }

    /**
     * Get the value of cpf
     *
     * @return  string
     */ 
    public function getCpf()
    {
        return $this->attributes['cpf'];
    }
}
