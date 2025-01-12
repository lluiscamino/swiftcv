<div class="grid grid-cols-1 gap-4 lg:grid-cols-2 mb-4 {{ $key > 0 ? 'border-t border-gray-200 pt-6' : '' }}">
    <x-forms.input id="skills.{{ $key }}.name" type="text" label="Name" placeholder="Programming languages"/>
    <x-forms.input id="skills.{{ $key }}.description" type="text" label="Description" placeholder="Java, C++, Rust"/>
</div>