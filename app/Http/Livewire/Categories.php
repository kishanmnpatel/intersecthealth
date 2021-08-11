<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $paginationTheme = 'bootstrap';
    public $fields = ['name', 'description', 'created_at'];

    public $showSuccessNotification = false;
    public $showFailNotification = false;

    protected $queryString = ['sortField', 'sortDirection'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function delete($id)
    {
        $this->category = Category::find($id);
        if (count($this->category->items) < 1) {
            $this->category->delete();
            $this->showFailNotification = false;
            $this->showSuccessNotification = true;
        } else {
            $this->showSuccessNotification = false;
            $this->showFailNotification = true;
        }
    }

    public function render()
    {
        return view('livewire.category-management', [
            'categories' => Category::searchMultipleRoles($this->fields, $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate($this->entries),
        ]);
    }
}
