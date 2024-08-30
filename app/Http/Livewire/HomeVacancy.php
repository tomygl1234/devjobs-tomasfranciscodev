<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class HomeVacancy extends Component
{
    public $term;
    public $category;
    public $salary;

    protected $listeners = ['searchTerms' => 'search'];
    public function search($term, $category, $salary){
        $this->term = $term;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        // $vacancies = Vacancy::all();

        $vacancies = Vacancy::when($this->term, function($query){
            $query->where('title', 'LIKE', "%" . $this->term . "%");
        })
        ->when($this->term, function($query){
            $query->orWhere('company', 'LIKE', "%" . $this->term . "%");
        })
        ->when($this->category, function($query){
            $query->where('category_id', $this->category);
        })
        ->when($this->salary, function($query){
            $query->where('salary_id', $this->salary);
        })
        ->paginate(4);

        return view('livewire.home-vacancy', [
            'vacancies' => $vacancies
        ]);
    }
}
