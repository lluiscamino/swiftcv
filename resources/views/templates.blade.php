@php use App\ResumeTemplates\TemplateType; @endphp

@include('common/header')

<div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
    <div class="max-w-screen-lg mx-auto pt-20 lg:pt-0">
        <h2 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-3xl xl:text-4xl dark:text-white">
            Resume Templates
        </h2>
        <p class="max-w-2xl mb-2 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
            These are all of the templates that will be filled with your details when you
            <a href="/create-resume" class="text-green-700 hover:text-green-800">create your resume</a> using our tool.
        </p>
        @foreach(TemplateType::orderedCases() as $templateType)
            <div class="mb-4" id="{{ $templateType->name }}">
                <h3 id="source"
                    class="mb-2 text-2xl font-bold dark:text-white">{{ $templateType->getUserFriendlyName() }}</h3>
                <img alt="{{$templateType->getUserFriendlyName()}}" src="{{$templateType->getExampleImageLink()}}"
                     class="max-w-full max-h-[700px]">
                <p class="max-w-2xl mb-2 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    <strong>Author</strong>: {{ $templateType->getAuthorName() }}
                    {{ '' /* TODO: Add description  */ }}
                </p>
                <a href="{{ $templateType->getInternalSourceLink() }}"
                   class="text-green-700 hover:text-green-800 font-bold align-center">
                    View source and license
                </a>
            </div>
        @endforeach
    </div>
</div>

@include('common/start-building-resume')

@include('common/footer')

