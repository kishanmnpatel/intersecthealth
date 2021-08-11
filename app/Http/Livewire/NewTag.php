<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class NewTag extends Component
{
    public $name = '';
    public $color = '';
    public $showDemoNotification = false;

    public $rules = [
        'name' => 'max:10|required|unique:tags',
        'color' => 'max:30'
    ];

    public function updated() {
        $this->validate([
        'name' => 'max:10|required|unique:tags',
        'color' => 'max:30',
        ]);
    }

    public function add(){

        $this->validate();

        $user = Tag::create([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        session()->flash('success', 'Tag created successfully.');
        return redirect(route('tag-management'));

    }

    public function render()
    {
        return view('livewire.new-tag');
    }
}
