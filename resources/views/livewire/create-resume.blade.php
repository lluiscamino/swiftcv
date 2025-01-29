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
                <x-forms.input id="phoneNumber" type="text" label="Phone number" placeholder="+44 987456774"/>
                <x-forms.input id="website" type="url" label="Personal website" placeholder="mysite.com"/>
            </div>
        </div>
        @foreach($form->getOrderedSectionTypes() as $sectionType)
            <x-forms.resume-section :resumeSectionType="$sectionType" :form="$form"/>
        @endforeach
        <button type="submit"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
            Create my resume
        </button>
    </form>
</div>
