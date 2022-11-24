<?php

namespace App\Http\Livewire;

use App\Mail\NewPostCreated;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use App\Services\Newsletter;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $thumbnail;
    public $excerpt;
    public $body;
    public $tempUrl;

    protected $rules = [
        'title' => 'required',
        'thumbnail' => 'required|image|max:30720',
        'slug' => 'required|unique:posts,slug',
        'excerpt' => 'required',
        'body' => 'required',
    ];

    protected $validationAttributes = [
        'thumbnail' => 'miniatura',
        'excerpt' => 'excerto',
        'body' => 'corpo'
    ];

    public function updated($propertyName)
    {
        if ($propertyName == 'thumbnail') {
            try {
                $this->tempUrl = $this->thumbnail->temporaryUrl();
            } catch (\Exception $e) {
                $this->tempUrl = null;
            }
        }

        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $attributes = $this->validate();

        // append the user_id value to the $attributes array so that a new Post instance can be created
        $attributes['user_id'] = auth()->id();

        // image sanitation
        $image = Image::make($this->thumbnail);
        $image->resize(400, 400);

        $path = config('filesystems.disks.public.root') . "/thumbnails/" . $this->thumbnail->hashName();
        $image->save($path);

        // store thumbnail file path in $attributes array
        $attributes['thumbnail'] = '/thumbnails/' . $this->thumbnail->hashName();
        // instantiate a new post
        $post = Post::create($attributes);

        // send email notifying a new post has been created
        // get members array
        $client = new \MailchimpMarketing\ApiClient();
        $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us18'
        ]);

        $response = (array) $client->lists->getListMembersInfo(
            config('services.mailchimp.lists.subscribers'),
            ['members.email_address']
        );

        $member_emails = array_map(function ($member) {
            return $member->email_address;
        }, $response['members']);

        // send mail
        foreach ($member_emails as $recipient) {
            Mail::to($recipient)->send(new NewPostCreated($post));
        }

        return redirect('posts/' . $post->slug)->with('success', 'Seu post foi criado!');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
