<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditCategory extends Component
{
    public Category $category;
    public $urlId='';
    public $showDemoNotification = false;

    protected function rules()
    {
        return [
            'category.name' => ['max:10', 'required', Rule::unique('categories', 'name')->ignore($this->category)],
            'category.description' => 'max:500',
        ];
    }

    public function updated() {
        $this->validate([
            'category.name' => ['max:10', 'required', Rule::unique('categories', 'name')->ignore($this->category)],
            'category.name' => 'max:15',
        ]);
    }

    public function mount($id) {
        $existingCategory = Category::find($id);
        $this->category = $existingCategory;
        $this->urlId = intval($existingCategory->id);
    }

    public function edit(){

        $this->validate();
        $existingCategory = Category::where('id', $this->category->id)->first();
        if($existingCategory && $existingCategory->id == $this->urlId) {
            $this->category->update();

            session()->flash('success', 'Category edited successfully.');
            return redirect(route('category-management'));

        }
    }

    public function render()
    {
        return view('livewire.edit-category');
    }
}
