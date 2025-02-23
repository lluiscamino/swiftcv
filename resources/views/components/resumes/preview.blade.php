@php use App\ResumeCreator\Resume; @endphp
@php
    /** @var Resume $resume */
    /** @var Resume $prevResume */
    /** @var Resume $nextResume */
@endphp
@php($getResumeId = fn(?Resume $resume) => $resume ? md5($resume->templateType->name) : null)
@php($resumeId = $getResumeId($resume))
@php($prevResumeId = $getResumeId($prevResume))
@php($nextResumeId = $getResumeId($nextResume))
<div class="flex flex-col max-w-lg py-4 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:py-6 dark:bg-gray-800 dark:text-white">
    <h3 class="mb-4 text-xl font-semibold">{{ $resume->templateType->getUserFriendlyName() }}</h3>
    <!--<p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best option for personal use & for
        your next project.</p>-->
    <button data-modal-target="{{$resumeId}}" data-modal-toggle="{{$resumeId}}">
        <img alt="Resume generated with template {{$resume->templateType->getUserFriendlyName()}}"
             src="{{$resume->thumbnailUrl}}">
    </button>
    <div>
        <x-resumes.download-buttons :resume="$resume" :responsive="true"/>
    </div>
</div>

<div id="{{$resumeId}}" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $resume->templateType->getUserFriendlyName() }}
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white z-40"
                        data-modal-hide="{{$resumeId}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <img alt="Resume generated with template {{$resume->templateType->getUserFriendlyName()}}"
                     src="{{$resume->thumbnailUrl}}">
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 space-x-2">
                <div class="grid grid-cols-1 gap-2 sm:grid-cols-3 w-full sm:w-auto">
                    <x-resumes.download-buttons :resume="$resume" :responsive="false"/>
                    <a href="{{ $resume->templateType->getInternalSourceLink() }}"
                       class="py-2.5 text-sm font-medium text-green-700 box-border inline-flex items-center border-2 border-green-600 hover:border-green-700 focus:ring-4 focus:ring-green-200 rounded-lg my-1 justify-center">
                        Source & license
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if($prevResume !== null)
        <div class="h-full absolute top-0 start-0 z-30 flex items-center">
            <button type="button" class="items-center justify-center h-20 px-4 cursor-pointer group focus:outline-none"
                    data-modal-hide="{{$resumeId}}" data-modal-target="{{$prevResumeId}}"
                    data-modal-toggle="{{$prevResumeId}}">
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 md:bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-800/60 md:group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 md:group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-800 md:text-white dark:text-gray-800 rtl:rotate-180"
                         aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>
    @endif
    @if($nextResume !== null)
        <div class="h-full absolute top-0 end-0 z-30 flex items-center align-middle">
            <button type="button"
                    class="items-center justify-center h-20 px-4 cursor-pointer group focus:outline-none"
                    data-modal-hide="{{$resumeId}}" data-modal-target="{{$nextResumeId}}"
                    data-modal-toggle="{{$nextResumeId}}">
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 md:bg-white/30 dark:bg-gray-800/30 group-hover:bg-gray-800/60 md:group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 md:group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-800 md:text-white dark:text-gray-800 rtl:rotate-180"
                         aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    @endif
</div>