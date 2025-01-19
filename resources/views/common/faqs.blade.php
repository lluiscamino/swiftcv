@php
    $faqs = [
    [
        'question' => 'Do I need to know LaTeX to use this website?',
        'answer' => 'No, you don\'t need any LaTeX knowledge. Our website provides an easy-to-use form where you simply enter your information, and we generate the LaTeX code for you.'
    ],
    [
        'question' => 'What resume templates are available?',
        'answer' => 'We offer a variety of popular LaTeX resume templates, including Awesome-CV, McDowell CV, Jake\'s Resume and others. We are constantly adding new templates to our collection.'
    ],
    [
        'question' => 'What file format will I receive?',
        'answer' => 'You will receive two files: a PDF file, which is the standard format for sharing resumes and is compatible with most Applicant Tracking Systems (ATS), and the .tex file (the raw LaTeX source code). This allows you to further customize your resume if you have LaTeX knowledge.'
    ],
    [
        'question' => 'Is my data secure?',
        'answer' => 'Yes, we take data privacy seriously. We do not store your data after the resume is generated.' // TODO
    ],
    [
        'question' => 'Is there a cost to use this website?',
        'answer' => 'Our basic service is free, with optional premium features available for a fee. <a href="create-resume" class="text-green-600 dark:text-green-500 hover:underline">Start creating your resume for free!</a>' // TODO
    ]
];
@endphp
<h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl dark:text-white">
    Frequently asked questions</h2>
<div class="max-w-screen-md mx-auto">
    <div id="accordion-flush" data-accordion="collapse"
         data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
         data-inactive-classes="text-gray-500 dark:text-gray-400">
        @foreach($faqs as $key => $value)
            @php
                $question = $value['question'];
                $answer = $value['answer'];
            @endphp
            <h3 id="accordion-flush-heading-{{ $key }}">
                <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                        data-accordion-target="#accordion-flush-body{{ $key }}" aria-expanded="true"
                        aria-controls="accordion-flush-body{{ $key }}">
                    <span>{{$question}}</span>
                    <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h3>
            <div id="accordion-flush-body{{ $key }}" class="" aria-labelledby="accordion-flush-heading{{ $key }}">
                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $answer !!}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>