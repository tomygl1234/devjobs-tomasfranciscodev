<?php

namespace App\Models;

use App\Models\Salary;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;
    protected $dates = ['last_day'];
    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'last_day',
        'description',
        'image',
        'user_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function salary(){
        return $this->belongsTo(Salary::class);
    }
    public function candidates(){
        return $this->hasMany(Candidate::class)->orderBy('created_at', 'DESC');
    }
    public function recruiter(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
