<?php
namespace Database\Seeders;
use App\Models\Department; use App\Models\Student; use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder { public function run():void {
 $it=Department::firstOrCreate(['department_name'=>'Information Technology'],['manager_name'=>'Mr. Dara','location'=>'Building A','description'=>'IT and computer studies']);
 $business=Department::firstOrCreate(['department_name'=>'Business Management'],['manager_name'=>'Ms. Sopheak','location'=>'Building B','description'=>'Business and management studies']);
 foreach([['Dara Sok','Male','2005-03-12',$it->id],['Srey Mom','Female','2004-07-22',$business->id],['Vannak Chea','Male','2005-01-09',$it->id]] as [$name,$gender,$dob,$dept]) Student::firstOrCreate(['student_name'=>$name],['gender'=>$gender,'dob'=>$dob,'enrollment_date'=>now()->toDateString(),'description'=>'Sample student record','department_id'=>$dept]);
} }
