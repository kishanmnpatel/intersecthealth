<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination;
    public $entries = 10;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $paginationTheme = 'bootstrap';
    public $fields = ['items.name', 'items.category_id', 'items.picture', 'TagsName', 'items.created_at'];
    public $showSuccessNotification = false;

    protected $queryString = ['sortField', 'sortDirection'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
        $this->showSuccessNotification = false;
    }

    public function delete($id)
    {
        $item = Item::find($id);
        $item->tags()->detach();
        $item->delete();
        $this->showSuccessNotification = true;
    }

    public function render()
    {
        return view('livewire.item-management', [
            'items' => Item::searchMultipleItems($this->search)
                ->join('item_tag', 'id', '=', 'item_tag.item_id')
                ->join('tags', 'tags.id', '=', 'item_tag.tag_id')
                ->groupBy('items.id')
                ->orderBy($this->sortField, $this->sortDirection)
                ->select('items.*', DB::raw('GROUP_CONCAT(tags.id) as TagsName'))
                ->paginate($this->entries),
        ]);
    }
}
