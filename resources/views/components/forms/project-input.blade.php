<div class="mb-4 {{ $key > 0 ? 'border-t border-gray-200 pt-6' : '' }}">
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <x-forms.input id="projects.{{ $key }}.name" type="text" label="Name" placeholder="GraphFinder"/>
        <x-forms.input id="projects.{{ $key }}.link" type="text" label="Link"/>
        <x-forms.input id="projects.{{ $key }}.startDate" type="date" label="Start Date"/>
        <x-forms.input id="projects.{{ $key }}.endDate" type="date" label="End Date"/>
    </div>
    <x-forms.textarea id="projects.{{ $key }}.description" type="text"
                      label="Description (bullet points will be added automatically)"
                      placeholder=""/>
</div>