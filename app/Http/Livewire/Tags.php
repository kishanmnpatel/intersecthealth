<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Tags extends Component
{
    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $paginationTheme = 'bootstrap';
    public $fields = ['name', 'color', 'created_at'];

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
        $this->tag = Tag::find($id);
        if (count($this->tag->items) < 1) {
            $this->tag->delete();
            $this->showFailNotification = false;
            $this->showSuccessNotification = true;
        } else {
            $this->showSuccessNotification = false;
            $this->showFailNotification = true;
        }
    }

    public function render()
    {
        return view('livewire.tag-management', [
            'tags' => Tag::searchMultipleTags($this->fields, $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate($this->entries),
        ]);
    }
}
