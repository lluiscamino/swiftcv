@php use App\Livewire\ResumeSectionType; @endphp
@php/** @var ResumeSectionType $resumeSectionType */ @endphp

@switch($resumeSectionType)
    @case(ResumeSectionType::WORK_EXPERIENCE)
        <x-forms.work-experience-input key="{{ $key }}"/>
        @break
    @case(ResumeSectionType::EDUCATION_EXPERIENCE)
        <x-forms.education-experience-input key="{{ $key }}"/>
        @break
    @case(ResumeSectionType::PROJECT)
        <x-forms.project-input key="{{ $key }}"/>
        @break
    @case(ResumeSectionType::SKILLS)
        <x-forms.skills-input key="{{ $key }}"/>
        @break
@endswitch
