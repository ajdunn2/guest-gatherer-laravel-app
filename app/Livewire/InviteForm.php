<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Invite;
use App\Models\Guest;

#[Title('Your Invitation')]
class InviteForm extends Component
{
    public Invite $invite;

    public $guests = [];

    public $totalGuests = 0;
    public $countPending = 0;

    public function mount($slug)
    {
        $this->invite = Invite::with('event', 'guests')
            ->where('slug', $slug)
            ->firstOrFail();

        $this->guests = Guest::where('invite_id', $this->invite->id)->get();

        $this->guests = $this->guests->keyBy('id');

        $this->totalGuests = $this->invite->guests
            ->count();

        $this->countPending = $this->invite->guests
            ->where('guest_status_id', '<', 2)
            ->count();

        session(['language' => $this->invite->language]);
    }

    public function rules()
    {
        return [
            'custom_message' => [
                'required',
            ],
        ];
    }

    public function save()
    {
        $this->validate(); // Add your validation logic here
        session()->flash('status', 'Invite and guests updated successfully.');
    }

    public function update()
    {
        $this->reset();
    }

    public function render()
    {
        $this->totalGuests = $this->invite->guests
            ->count();
        $this->countPending = $this->invite->guests
            ->where('guest_status_id', '<', 2)
            ->count();

        return view('livewire.invite-form', [
            'lang' => $this->invite->language ?? null,
            'event' => $this->invite->event ?? null,
            'schedules' => $this->invite->event->schedules ?? null,
            'guests' => $this->invite->guests ?? null,
            'totalGuests' => $this->totalGuests ,
            'countPending' => $this->countPending,
        ]);
    }
}
