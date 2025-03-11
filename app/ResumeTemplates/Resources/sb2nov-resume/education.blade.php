%-----------EDUCATION-----------------
\section{Education}
\resumeSubHeadingListStart

@foreach($vars->educationExperiences as $educationExperience)
    \resumeSubheading
    {<?= $educationExperience->getUniversityEscaped() ?>}{<?= $educationExperience->getLocationEscaped() ?>}
    {<?= $educationExperience->getDegreeEscaped() ?>}{<?= $educationExperience->dateRange ?>}
    \resumeItemListStart
    @foreach($educationExperience->getDescriptionEscaped() as $line)
        \resumeItemOne{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach
\resumeSubHeadingListEnd