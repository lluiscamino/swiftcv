%-----------EXPERIENCE-----------------
\section{Experience}
\resumeSubHeadingListStart

@foreach($vars->workExperiences as $workExperience)
    \resumeSubheading
    {<?= $workExperience->getCompanyEscaped() ?>}{<?= $workExperience->getLocationEscaped() ?>}
    {<?= $workExperience->getJobTitleEscaped() ?>}{<?= $workExperience->dateRange ?>}
    \resumeItemListStart
    @foreach($workExperience->getDescriptionEscaped() as $line)
        \resumeItemOne{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach
\resumeSubHeadingListEnd