<div class="grid grid-cols-1 gap-4 lg:grid-cols-2 mb-4 {{ $key > 0 ? 'border-t border-gray-200 pt-6' : '' }}">
    <x-forms.input id="educationExperiences.{{ $key }}.institution" type="text" label="Institution"
                   placeholder="University College London"/>
    <x-forms.input id="educationExperiences.{{ $key }}.degree" type="text" label="Degree"
                   placeholder="Bsc. Computer Science"/>
    <div class="grid gap-4 grid-cols-2">
        <x-forms.input id="educationExperiences.{{ $key }}.startDate" type="date" label="Start Date"/>
        <x-forms.input id="educationExperiences.{{ $key }}.endDate" type="date" label="End Date"/>
    </div>
    <x-forms.input id="educationExperiences.{{ $key }}.location" type="text" label="Location" placeholder="London, UK"/>
</div>