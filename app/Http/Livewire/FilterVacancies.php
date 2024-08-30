<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;

class FilterVacancies extends Component
{
    public $term;
    public $category;
    public $salary;

    public function readFormData(){
        $this->emit('searchTerms', $this->term, $this->category, $this->salary);
    }
    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.filter-vacancies', [
            'categories' => $categories,
           'salaries' => $salaries,
        ]);
    }
}
