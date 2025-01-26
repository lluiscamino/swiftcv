<div class="mb-4 {{ $key > 0 ? 'border-t border-gray-200 pt-6' : '' }}">
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <x-forms.input id="workExperiences.{{ $key }}.company" type="text" label="Company" placeholder="Microsoft"/>
        <x-forms.input id="workExperiences.{{ $key }}.jobTitle" type="text" label="Job title"
                       placeholder="Software Engineer"/>
        <div class="grid gap-4 grid-cols-2">
            <x-forms.input id="workExperiences.{{ $key }}.startDate" type="date" label="Start Date"/>
            <x-forms.input id="workExperiences.{{ $key }}.endDate" type="date" label="End Date"/>
        </div>
        <x-forms.input id="workExperiences.{{ $key }}.location" type="text" label="Location" placeholder="Redmond, WA"/>
    </div>
    <x-forms.textarea id="workExperiences.{{ $key }}.description" type="text"
                      label="Description (bullet points will be added automatically)"
                      placeholder="Reduced memory consumption by 60% by rewriting system in Rust.
Implemented new feature rated positively by 98% of users."/>
</div>