<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Student extends Model {
 protected $fillable=['student_name','gender','dob','enrollment_date','description','department_id'];
 protected function casts(): array { return ['dob'=>'date','enrollment_date'=>'date']; }
 public function department(): BelongsTo { return $this->belongsTo(Department::class); }
}
