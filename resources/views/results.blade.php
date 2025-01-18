@php use App\ResumeCreator\Resume;
@endphp
@include('common/header')

<div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
    <div class="max-w-screen-lg mx-auto">
        <h2 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-3xl xl:text-4xl dark:text-white">
            Your Resumes are Ready!
        </h2>
        <p class="max-w-2xl mb-2 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
            Here are your generated resumes, showcasing a variety of professional LaTeX templates. Preview and download
            the ones that best suit your needs.
        </p>
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
            @php /** @var Resume $resume */ @endphp
            @foreach(request()->query('resumes') as $serializedResumeArray)
                <x-resumes.preview :resume="Resume::createFromSerializedArray($serializedResumeArray)"/>
            @endforeach
        </div>
    </div>
</div>

@include('common/footer')

