<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditTag extends Component
{
    public Tag $tag;
    public $urlId='';
    public $showDemoNotification = false;

    protected function rules()
    {
        return [
            'tag.name' => ['max:10', 'required', Rule::unique('tags', 'name')->ignore($this->tag)],
            'tag.color' => '',
        ];
    }

    public function updated() {
        $this->validate([
            'tag.name' => ['max:10', 'required', Rule::unique('tags', 'name')->ignore($this->tag)],
            'tag.color' => '',
        ]);
    }

    public function mount($id) {
        $existingTag = Tag::find($id);
        $this->tag = $existingTag;
        $this->urlId = intval($existingTag->id);
    }

    public function edit(){
    $this->validate();
    $existingTag = Tag::where('id', $this->tag->id)->first();
    if($existingTag && $existingTag->id == $this->urlId) {
        $this->tag->update();

        $this->showSavedAlert = true; 

    }
    session()->flash('success', 'Tag edited successfully.');
    return redirect(route('tag-management'));
    }

    public function render()
    {
        return view('livewire.edit-tag');
    }
}
