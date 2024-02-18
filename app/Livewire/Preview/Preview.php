<?php

namespace App\Livewire\Preview;

use App\Models\Foto;
use Livewire\Component;

class Preview extends Component
{
    // public $photos;
    // public $isLiked;
    // public $content;
    // public $komen;

    public function render()
    {
        return view('livewire.upload.preview');
    }

    // public function mount($foto_id)
    // {
    //     $this->photos = Foto::with('user')->find($foto_id);
    // }

    // public function showPreview($foto_id)
    // {
    //     return redirect()->to(route('page.upload.detail.preview', $foto_id));
    // }
    // public function like()
    // {
    //     if ($this->isLiked) {
    //         $this->data->like()->where('user_id', Auth::user()->id)->delete();
    //     } else {
    //         $like = new Like();
    //         $like->user_id = Auth::user()->id;
    //         $like->post_id = $this->data->id;
    //         $like->like = 1;
    //         $like->save();
    //     }
    //     $this->isLiked = !$this->isLiked;
    // }

    // public function comment()
    // {
    //     $this->validate([
    //         'content' => 'required|max:3000'
    //     ]);

    //     $comment = new Komentar();
    //     $comment->user_id = Auth::user()->id;

    //     if ($this->data) {
    //         $comment->post_id = $this->data->id;
    //     }

    //     $comment->content = $this->content;
    //     $comment->save();

    //     $this->content = '';
    //     $this->komen = Komentar::where('post_id', $this->data->id)->get();
    //     if ($this->data) {
    //         $this->data = Post::with('user')->withCount('comments')->find($this->data->id);
    //     }
    // }
    // public function delete($id)
    // {
    //     $this->data = Post::with('user')->findOrFail($id);
    //     $this->data->delete();

    //     return redirect('/');
    // }
}
