<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NewCandidate;

class PostulateVacancy extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacancy;
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacancy $vacancy){
        $this->vacancy = $vacancy;
    }
    public function postulate(){

        $data = $this->validate();

        //Save CV in the HardDisk
        $cv = $this->cv->store('public/cv/');
        $data['cv'] = str_replace('public/cv/', '', $cv);
        //Create the vacancy candidate
        $this->vacancy->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv']
        ]);
        //Create a mail notification
        $this->vacancy->recruiter->notify(new NewCandidate($this->vacancy->id, $this->vacancy->title, auth()->user()->id));
        //Show a success message to the user
        session()->flash('message', '¡Your CV has been submitted successfully!');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postulate-vacancy');
    }
}
