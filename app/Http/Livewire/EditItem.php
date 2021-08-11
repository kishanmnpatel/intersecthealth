<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditItem extends Component
{
    use WithFileUploads;

    public Item $item;
    public $urlId = '';
    public $categories;
    public $upload;
    public $tags;
    public $myTags;
    public $tag_id = [];
    public $options = [];
    public $showDemoNotification = false;


    protected function rules()
    {

        return [
            'item.name' => ['required', Rule::unique('items', 'name')->ignore($this->item)],
            'item.category_id' => ['required', Rule::in(collect(DB::table('categories')->pluck('id')))],
            'item.excerpt' => 'max:100',
            'tag_id' => 'required',
            'item.date' => '',
            'item.description' => '',
            'item.status' => '',
            'item.options' => '',
            'item.show_on_homepage' => '',
            'upload' => 'nullable|image|max:2000'
        ];
    }

    public function mount($id)
    {
        $this->item = Item::find($id);
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->tag_id = $this->getExistingTags();
    }

    public function getExistingTags()
    {
        $idArray = [];
        $this->myTags = $this->item->tags;
        foreach($this->myTags as $tag) {
            array_push($idArray, $tag->id);
        }
        return $idArray;
    }

    public function edit()
    {
        $this->validate();

        $this->item->update();

        $this->upload && $this->item->update([
            'picture' => $this->upload->store('/', 'items'),
        ]);
        $this->item->tags()->detach();
        sort($this->tag_id);
        $this->item->tags()->sync($this->tag_id, false);

        session()->flash('success', 'Item edited successfully.');
        return redirect(route('item-management'));
    }


    public function render()
    {
        return view('livewire.edit-item');
    }
}
