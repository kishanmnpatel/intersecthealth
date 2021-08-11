<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewItem extends Component
{
    use WithFileUploads;

    public $name = '';
    public $category_id = '';
    public $description = '';
    public $excerpt = '';
    public $tag_id = [];
    public $date = '';
    public $categories;
    public $showDemoNotification = false;
    public $upload;
    public $tags;
    public $status = '';
    public $options = [];
    public $showOnHomepage = false;

    protected function rules()
    {
        return [
            'name' => 'max:10|required|unique:items',
            'category_id' => ['required', Rule::in(collect(DB::table('categories')->pluck('id')))],
            'excerpt' => 'max:100',
            'tag_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'description' => 'max:500',
            'status' => 'required',
            'options' => '',
            'showOnHomepage' => '',
            'upload' => 'nullable|image|max:2000'
        ];
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
    }

    public function updated()
    {
        $this->validate([
            'name' => 'max:10|required|unique:items',
            'excerpt' => 'max:100',
            'description' => 'max:500',
        ]);
    }

    public function add()
    {
        $this->validate();

        $item = Item::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'excerpt' => $this->excerpt,
            'description' => $this->description,
            'date' => $this->date,
            'status' => $this->status,
            'show_on_homepage' => $this->showOnHomepage,
            'options' => $this->options
        ]);

        sort($this->tag_id);
        $item->tags()->sync($this->tag_id, false);

        $this->upload && $item->update([
            'picture' => $this->upload->store('/', 'items'),
        ]);

        session()->flash('success', 'Item created successfully.');
        return redirect(route('item-management'));
    }

    public function render()
    {
        return view('livewire.new-item');
    }
}
