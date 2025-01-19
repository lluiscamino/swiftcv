@php use App\Livewire\ResumeSectionType; @endphp
@php /** @var ResumeSectionType $resumeSectionType */ @endphp

<div class="mb-2">
    <div class="float-right">
        @if($resumeSectionType->shouldShowMoveUpButton($form))
            <button type="button" wire:click="moveSectionUp({{ $resumeSectionType }})"
                    class="rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Move up</span>
                <!-- Heroicon name: chevron-up -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5"/>
                </svg>
            </button>
        @endif
        @if($resumeSectionType->shouldShouldMoveDownButton($form))
            <button type="button" wire:click="moveSectionDown({{ $resumeSectionType }})"
                    class="rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Move down</span>
                <!-- Heroicon name: chevron-down -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                </svg>
            </button>
        @endif
    </div>
    <h3 class="w-full mt-6 md:w-1/2 mb-6 max-w-xl text-xl font-bold leading-none tracking-tight dark:text-white">
        {{ $resumeSectionType->getTitle() }}
    </h3>
    @foreach($resumeSectionType->getEntries($form) as $key => $entry)
        <div wire:key="{{ $resumeSectionType->getId() }}.{{ $key }}">
            <x-forms.remove-section-btn key="{{$key}}" :callback="$resumeSectionType->getRemoveButtonCallback($key)"/>
            <x-forms.resume-section-input :resumeSectionType="$resumeSectionType" :key="$key"/>
        </div>
    @endforeach
    <div class="text-center">
        <button type="button" class="text-green-700 hover:text-green-800 font-bold align-center"
                wire:click="{{ $resumeSectionType->getAddButtonCallback() }}">
            {{ $resumeSectionType->getAddButtonLabel() }}
        </button>
    </div>
</div>