<div class="grid grid-cols-1 gap-4 lg:grid-cols-2 mb-4 {{ $key > 0 ? 'border-t border-gray-200 pt-6' : '' }}">
    <x-forms.input id="projects.{{ $key }}.name" type="text" label="Name" placeholder="GraphFinder"/>
    <x-forms.input id="projects.{{ $key }}.link" type="text" label="Link"/>
    <x-forms.input id="projects.{{ $key }}.startDate" type="date" label="Start Date"/>
    <x-forms.input id="projects.{{ $key }}.endDate" type="date" label="End Date"/>
</div>