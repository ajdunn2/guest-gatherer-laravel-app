<div class="py-0 px-1 my-4 bg-gray-50">
    <div class="px-2">
        <p class="text-2xl text-center text-gray-600">Schedule</p>
    </div>

    <div class="px-2 mx-2">
        <div class="px-2 mx-2">
            @foreach ($schedules as $schedule)
                @if ($loop->last)
                    <div class="pb-4 pt-5">
                @else
                    <div class="border-b pb-4 border-gray-400 border-dashed pt-5">
                @endif
                        <p class="text-sm font-light leading-3 text-gray-60000">{{ $schedule->time }}</p>
                        <p class="text-md pt-2 leading-4 leading-none text-black">{{ $schedule->title }}</p>
                        <p class="text-xs pt-2 leading-4 leading-none text-gray-600">{{ $schedule->description }}</p>
                    </div>
            @endforeach
        </div>
    </div>
</div>
