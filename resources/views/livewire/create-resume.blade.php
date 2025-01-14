<div>
    <h2 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-3xl xl:text-4xl dark:text-white">
        Create your resume in seconds!
    </h2>
    <p class="max-w-2xl mb-2 font-light text-gray-800 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
        Find the ideal look for your resume from our collection of professional LaTeX templates. Simply fill out the
        form
        below to get started.
    </p>
    <form wire:submit="save" autoComplete="off">
        <div class="mb-2">
            <h3 class="w-full mt-6 md:w-1/2 mb-6 max-w-xl text-xl font-bold leading-none tracking-tight dark:text-white">
                Contact information</h3>
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <x-forms.input id="name" type="text" label="Name" placeholder="John Doe"/>
                <x-forms.input id="email" type="email" label="Email address" placeholder="john.doe@gmail.com"/>
                <x-forms.input id="phoneNumber" type="text" label="Phone number" placeholder="+44 987456774"/>
            </div>
        </div>
        <div class="mb-2">
            <h3 class="w-full mt-6 md:w-1/2 mb-6 max-w-xl text-xl font-bold leading-none tracking-tight dark:text-white">
                Work experience</h3>
            @foreach($form->workExperiences as $key => $section)
                <div wire:key="workExperience.{{ $key }}">
                    <button type="button"
                            wire:click="removeWorkExperience({{$key}})"
                            class="rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 float-right">
                        <span class="sr-only">Remove section</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    <x-forms.work-experience-input key="{{ $key }}"/>
                </div>
            @endforeach
            <div class="text-center">
                <button type="button" class="text-green-700 hover:text-green-800 font-bold align-center"
                        wire:click="addWorkExperience()">
                    Add experience
                </button>
            </div>
        </div>
        <div class="mb-2">
            <h3 class="w-full mt-6 md:w-1/2 mb-6 max-w-xl text-xl font-bold leading-none tracking-tight dark:text-white">
                Education</h3>
            @foreach($form->educationExperiences as $key => $section)
                <div wire:key="educationExperience.{{ $key }}">
                    <button type="button"
                            wire:click="removeEducationExperience({{$key}})"
                            class="rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 float-right">
                        <span class="sr-only">Remove section</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    <x-forms.education-experience-input key="{{ $key }}"/>
                </div>
            @endforeach
            <div class="text-center">
                <button type="button" class="text-green-700 hover:text-green-800 font-bold align-center"
                        wire:click="addEducationExperience()">
                    Add education
                </button>
            </div>
        </div>
        <div class="mb-2">
            <h3 class="w-full mt-6 md:w-1/2 mb-6 max-w-xl text-xl font-bold leading-none tracking-tight dark:text-white">
                Projects</h3>
            @foreach($form->projects as $key => $section)
                <div wire:key="projects.{{ $key }}">
                    <button type="button"
                            wire:click="removeProject({{$key}})"
                            class="rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 float-right">
                        <span class="sr-only">Remove section</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    <x-forms.project-input key="{{ $key }}"/>
                </div>
            @endforeach
            <div class="text-center">
                <button type="button" class="text-green-700 hover:text-green-800 font-bold align-center"
                        wire:click="addProject()">
                    Add project
                </button>
            </div>
        </div>
        <div class="mb-2">
            <h3 class="w-full mt-6 md:w-1/2 mb-6 max-w-xl text-xl font-bold leading-none tracking-tight dark:text-white">
                Skills</h3>
            @foreach($form->skills as $key => $section)
                <div wire:key="skills.{{ $key }}">
                    <button type="button"
                            wire:click="removeSkill({{$key}})"
                            class="rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 float-right">
                        <span class="sr-only">Remove section</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    <x-forms.skills-input key="{{ $key }}"/>
                </div>
            @endforeach
            <div class="text-center">
                <button type="button" class="text-green-700 hover:text-green-800 font-bold align-center"
                        wire:click="addSkill()">
                    Add skill
                </button>
            </div>
        </div>
        <button type="submit"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
            Create my resume
        </button>
    </form>
</div>
