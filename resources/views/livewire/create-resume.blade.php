<div>
    <h2 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-3xl xl:text-4xl dark:text-white">
        Create your resume in seconds!
    </h2>
    <p class="max-w-2xl mb-2 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
        Find the ideal look for your resume from our collection of professional LaTeX templates. Simply fill out the
        form below to get started.
    </p>
    <form wire:submit="save" autoComplete="off" novalidate>
        <div class="mb-2">
            <h3 class="w-full mt-6 md:w-1/2 mb-6 max-w-xl text-xl font-bold leading-none tracking-tight dark:text-white">
                Contact information</h3>
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <x-forms.input id="name" type="text" label="Name" placeholder="John Doe"/>
                <x-forms.input id="email" type="email" label="Email address" placeholder="john.doe@gmail.com"/>
                <x-forms.input id="phoneNumber" type="tel" label="Phone number" placeholder="+44 987456774"/>
                <x-forms.input id="website" type="url" label="Personal website" placeholder="johndoe.com"/>
                <x-forms.input id="linkedinUsername" type="text" label="LinkedIn username" placeholder="johndoe"/>
                <x-forms.input id="githubUsername" type="text" label="GitHub username" placeholder="johncodes"/>
            </div>
        </div>
        @foreach($form->getOrderedSectionTypes() as $sectionType)
            <x-forms.resume-section :resumeSectionType="$sectionType" :form="$form"/>
        @endforeach
        <button type="submit"
                id="resume-submit-btn"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 w-full sm:w-auto mt-4 disabled:bg-green-700"
                wire:loading.attr="disabled"
        >
            <svg wire:loading.delay aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin"
                 viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                      fill="#E5E7EB"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                      fill="currentColor"/>
            </svg>
            Create my resume
        </button>
        <div wire:loading.delay.longest class="italic text-xs md:text-sm mt-3">
            <div role="status">
                <span>Your resumes are being generated. This may take up to 1 minute. Please do not close this window while we generate your resumes.</span>
            </div>
        </div>
        <div class="italic text-xs md:text-sm mt-3">
            We only store your generated resumes for 8 hours so you have time to download them
        </div>
    </form>
</div>
@livewireScripts
<script>
    Livewire.hook('commit', ({succeed}) => {
        succeed(() => {
            setTimeout(() => {
                const firstErrorMessage = document.querySelector('.input-error-msg');
                if (firstErrorMessage !== null) {
                    firstErrorMessage.scrollIntoView({block: 'center', inline: 'center'});
                }
            }, 0);
        });
    });
</script>