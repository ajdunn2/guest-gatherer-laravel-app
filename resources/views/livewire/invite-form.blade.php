<div class="container mx-auto p-1">

    <div class="mt-2">
        <h1 class="text-5xl font-bold text-center drop-shadow-xl cursive-font animate-fade-down animate-delay-100 animate-once">
            {!! $event->title !!}
        </h1>

        <div class="flex justify-center mt-5 mb-0 ">
            <img class="content-center hover:object-top rounded-t-full w-96 border shadow-2xl"
                 src="/images/02.jpg"
                 title="">
        </div>

        <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 bg-blue-950">

        <h2 class="text-2xl text-center drop-shadow-md">{{ $invite->title }}</h2>

        <h3 class="text-md text-center drop-shadow-md mt-1">
            We would be delighted to invite you to our wedding celebration.
        </h3>

        <p class="text-md text-center drop-shadow-md mt-2">
            <a
                href="#rsvp-forms"
                class="inline-block align-bottom text-center pb-2 link hover:text-blue-500"
            >
                Please RSVP Below
            </a>
        </p>

        <div x-data="{
            openShare: false,
            copyText: 'Copy Link',
            copyToClipboard() {
                navigator.clipboard.writeText('{!! Request::url() !!}');
                     this.copyText = 'Copied!';
                     setTimeout(() => { this.copyText = 'Copy Link'; }, 1000);
                }
            }"
             class="flex justify-center mt-3 mb-0">
            <button x-show="!openShare" class="btn btn-sm" x-on:click="openShare = true">
                Share Link
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                </svg>
            </button>

            <div x-show="openShare">
                <div class="grid grid-cols-1 items-stretch" wire:ignore>
                    <div class="w-full card card-side bg-base-100 shadow-xl grid-cols-1 w-full">
                        <div class="card-body">
                            <div class="flex justify-center items-center h-full w-full">
                                {!! QrCode::size(180)->generate(Request::url()) !!}
                            </div>
                            <div>
                                <p class="text-gray-400">{!! Request::url() !!}</p>
                                <div class="card-actions justify-center">
                                    <button class="btn btn-primary" x-on:click="copyToClipboard()">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span x-text="copyText"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($invite->custom_message)
            <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 bg-blue-950">
            <p class=" text-center">{!! $invite->custom_message !!}</p>
        @endif

        <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 bg-blue-950">
    </div>


    <div>
        <h1 class="text-5xl font-bold text-center drop-shadow-md cursive-font">
            @if(session('language') === 'fa')
                تاریخ
            @else
                Date
            @endif
        </h1>
        <h2 class="text-xl font-bold text-center drop-shadow-md nice-font mt-2 mb-5">
            {{ $event->time }}
        </h2>

        <h1 class="text-5xl font-bold text-center drop-shadow-md cursive-font"
        >
            @if(session('language') === 'fa')
                مکان
            @else
                Location
            @endif
        </h1>
        <h2 class="text-xl font-bold text-center drop-shadow-md nice-font mt-1 mb-5">
            {{ $event->location }}
        </h2>

        <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 bg-blue-950">

        <h1 class="text-5xl font-bold text-center drop-shadow-md cursive-font">
            @if(session('language') === 'fa')
                جزئیات بیشتر
            @else
                <span>Details</span>
            @endif
        </h1>

        <div class="max-w-xl mx-auto text-center">
            <p class="text-lg">{!! $event->description !!}</p>
        </div>
    </div>


    <div x-data="{ one: true, two: true }" class="grid md:grid-cols-2 grid-cols-1 gap-3 items-stretch">

            <div class="w-full lg:w-10/12 card bg-base-100 shadow-lg mt-4 mr-auto">
                <div class="card-body" x-init="two = false" style="color: #50596b !important; background-position: right; background-repeat: no-repeat; background-image: url({{ url('/images/beach-road.svg')}});">
                    <span class="text-2xl font-bold mb-0">
                            {!! $event->location_title !!}
                    </span>

                    <p class="link link-hover hover:text-blue-500">
                        <a href="{{ $event->google_maps_hyperlink }}" target="_blank">
                            <span>
                                {{ $event->address }}
                            </span>
                        </a>
                    </p>

                    <img class="h-auto max-w-full rounded-xl" src="/images/01.jpg" alt="">
                </div>

                @if (!empty($event->google_maps_embed_one))
                    <div @click="two = !two; one = !one" class="inline-block align-bottom text-center pb-2 link hover:text-blue-500">change map type</div>
                @endif

                <figure class="relative w-full h-96 min-h-7">
                    @if(!empty($event->google_maps_embed_one))
                    <div x-show="one">
                        <iframe src="{{ $event->google_maps_embed_one }}" class="absolute top-0 left-0 w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    @endif
                    @if(!empty($event->google_maps_embed_two))
                    <div x-show="two">
                        <iframe src="{{ $event->google_maps_embed_two }}" class="absolute top-0 left-0 w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    @endif
                </figure>
            </div>

            <div class="w-full lg:w-10/12 card bg-gray-50 border-gray-400 shadow-lg mt-4 ml-auto">

                <div class="card-body py-0 px-0 ">
                    <div class=" border-b rounded-t-xl bg-white">
                        <div class="px-4 flex items-center justify-between">
                            <p class="text-2xl text-center p-5">
                                {{ \Carbon\Carbon::parse($event->date)->format('F Y') }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between">
                            <table class="w-full">
                                <thead>
                                <tr>
                                    @php ($daysOfWeek = ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su']) @endphp
                                    @foreach($daysOfWeek as $day)
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p class="text-base font-medium text-center text-gray-800">{{ $day }}</p>
                                            </div>
                                        </th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @php
                                        // I just made a fully working Calendar using Tailwind and Carbon.
                                        $firstDayOfMonth = \Carbon\Carbon::parse($event->date)->startOfMonth();
                                        $dayOfWeek = $firstDayOfMonth->dayOfWeek;
                                        $dayOfWeekAdjusted = $dayOfWeek === 0 ? 7 : $dayOfWeek;
                                        $daysInMonth = \Carbon\Carbon::parse($event->date)->daysInMonth;
                                        $startingDay = $dayOfWeekAdjusted - 1;
                                    @endphp
                                    @for ($i = 0; $i < $startingDay; $i++)
                                        <td class="">
                                            <div class="px-1 py-1 cursor-pointer flex w-full justify-center"></div>
                                        </td>
                                    @endfor
                                    @for ($i = 1; $i <= $daysInMonth; $i++)
                                        <td class="">
                                            <div class="px-1 py-1 cursor-pointer flex w-full justify-center">
                                                @if($i == 5)
                                                    <a role="link" tabindex="0" data-tip="the big day" class="tooltip focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-7 h-7 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full">5</a>
                                                @else
                                                    <p class="w-7 h-7 flex items-center justify-center font-medium rounded-full">{{ $i }}</p>
                                                @endif
                                            </div>
                                        </td>
                                        @if(($i + $startingDay) % 7 == 0)
                                        </tr><tr>
                                        @endif
                                    @endfor
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="flex justify-center items-center py-4 tooltip" data-tip="Add to Apple, Google or Outlook Calendar">
                            <a class="btn btn-primary w-3/4" href="{{ route('ical-download') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                                Add to Your Calendar
                            </a>
                        </div>

                        @if (!empty($event->google_calendar_link))
                            <div class="link link-hover hover:text-blue-500 text-center mb-2 button button-red pb-3">
                                <a href="{{ $event->google_calendar_link }}" target="_blank" rel="noopener">
                                    <img
                                        style="height: 1.5em; width: 1.5em; display: inline-block;"
                                        src="data:image/png;base64,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"
                                        alt="">
                                    Make a Google Calendar Event
                                </a>
                            </div>
                        @endif
                    </div>

                    @include('livewire.invite-form-schedule')
                </div>
            </div>
    </div>

    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 bg-blue-950">

    <div id="rsvp-forms" class="mt-5">
        <h1 class="text-5xl font-bold text-center drop-shadow-md cursive-font">RSVP</h1>

        <h2 class="text-xl font-bold text-center drop-shadow-md nice-font">
            Please respond per invited guest.
            If possible please let us know before
            <u title="{{ $event->default_response_deadline->format('D jS F Y') }}">
                {{ $event->default_response_deadline->format('d/m/Y') }}
            </u>
            <br>
            <small>You may edit your response after submitting</small>
        </h2>

        <hr>

        <div class="card-actions justify-center mb-0 mt-4">
            <div class="card w-96 bg-primary p-0">
                <div class="card-body text-center text-white p-2">
                    <p wire:poll>
                        @if($countPending > 0)
                            {{ $countPending }}
                            Responses pending
                        @else
                            All {{ $totalGuests }}
                            Responses received, thank you!
                        @endif
                    </p>
                </div>
            </div>
        </div>

        @foreach ($guests as $guest)
            <livewire:guest-form :$guest :key="$guest->id" />
        @endforeach

    </div>

</div>
