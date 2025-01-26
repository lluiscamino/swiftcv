@php use App\ResumeTemplates\TemplateType; @endphp
@php /** @var TemplateType $templateType */ @endphp

@include('common/header')

<div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
    <div class="max-w-screen-lg mx-auto">
        <h2 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-3xl xl:text-4xl dark:text-white">
            {{ $templateType->getUserFriendlyName() }}
        </h2>
        <p class="max-w-2xl mb-2 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
            <strong>Author</strong>: {{ $templateType->getAuthorName() }}
            {{ '' /* TODO: Add description  */ }}
        </p>
        <div class="mb-4">
            <h3 id="source" class="mb-2 text-2xl font-bold dark:text-white">Source</h3>
            <a href="{{ $templateType->getSourceLink() }}"
               class="text-green-700 hover:text-green-800 font-bold align-center">
                View source
            </a>
        </div>
        <div>
            <h3 id="license" class="mb-2 text-2xl font-bold dark:text-white">License</h3>
            <pre>{{ $templateType->getLicenseText() }}</pre>
        </div>
    </div>
</div>

@include('common/footer')

