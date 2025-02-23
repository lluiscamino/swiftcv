%-----------EXPERIENCE-----------
\section{Experience}
@if(!empty($vars->workExperiences))
    \resumeSubHeadingListStart
@endif

@foreach($vars->workExperiences as $workExperience)
    \resumeSubheading
    {<?= $workExperience->getJobTitleEscaped() ?>}{<?= $workExperience->dateRange ?>}
    {<?= $workExperience->getCompanyEscaped() ?>}{<?= $workExperience->getLocationEscaped() ?>}
    \resumeItemListStart
    @foreach($workExperience->getDescriptionEscaped() as $line)
        \resumeItem{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach

@if(!empty($vars->workExperiences))
    \resumeSubHeadingListEnd
@endif

% -----------Multiple Positions Heading-----------
%    \resumeSubSubheading
%     {Software Engineer I}{Oct 2014 - Sep 2016}
%     \resumeItemListStart
%        \resumeItem{Apache Beam}
%          {Apache Beam is a unified model for defining both batch and streaming data-parallel processing pipelines}
%     \resumeItemListEnd
%    \resumeSubHeadingListEnd
%-------------------------------------------