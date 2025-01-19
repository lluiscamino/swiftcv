%-----------EDUCATION-----------
\section{Education}
@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListStart
@endif

@foreach($vars->educationExperiences as $educationExperience)
    \resumeSubheading
    {<?= $educationExperience->university ?>}{<?= $educationExperience->location ?>}
    {<?= $educationExperience->degree ?>}{<?= $educationExperience->dateRange ?>}
    \resumeItemListStart
    @foreach($educationExperience->description as $line)
        \resumeItem{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach

@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListEnd
@endif