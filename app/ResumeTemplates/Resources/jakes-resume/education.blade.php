%-----------EDUCATION-----------
\section{Education}
@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListStart
@endif

@foreach($vars->educationExperiences as $educationExperience)
    \resumeSubheading
    {<?= $educationExperience->getUniversityEscaped() ?>}{<?= $educationExperience->getLocationEscaped() ?>}
    {<?= $educationExperience->getDegreeEscaped() ?>}{<?= $educationExperience->dateRange ?>}
    \resumeItemListStart
    @foreach($educationExperience->getDescriptionEscaped() as $line)
        \resumeItem{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach

@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListEnd
@endif