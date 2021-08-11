<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class NewCategory extends Component
{
    public $name = '';
    public $description = '';
    public $showDemoNotification = false;

    public $rules = [
        'name' => 'max:10|required|unique:categories',
        'description' => 'max:30'
    ];

    public function updated() {
        $this->validate([
        'name' => 'max:10|required|unique:categories',
        'description' => 'max:30',
        ]);
    }

    public function add(){

        $this->validate();

        $user = Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Category created successfully.');
        return redirect(route('category-management'));


    }

    public function render()
    {
        return view('livewire.new-category');
    }
}
