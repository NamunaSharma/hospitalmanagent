<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
        protected $fillable = [
            'doctor_id',
            'patient_id', // Add this line to include patient_id
            'appointment_date',
            'department_id',
        ];
        
    
    
    function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
    function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
    // function department()
    // {
    //     return $this->belongsTo(Department::class, 'department_name', 'name');
    // }
    function department()
{
    return $this->belongsTo(Department::class, 'department_id', 'id');
}


}
