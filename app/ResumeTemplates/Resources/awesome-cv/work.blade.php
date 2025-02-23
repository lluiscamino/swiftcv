%-------------------------------------------------------------------------------
%    SECTION TITLE
%-------------------------------------------------------------------------------
\cvsection{Experience}


%-------------------------------------------------------------------------------
%    CONTENT
%-------------------------------------------------------------------------------
\begin{cventries}

@foreach($vars->workExperiences as $workExperience)
    %---------------------------------------------------------
    \cventry
    {<?= $workExperience->getJobTitleEscaped() ?>} % Job title
    {<?= $workExperience->getCompanyEscaped() ?>} % Organization
    {<?= $workExperience->getLocationEscaped() ?>} % Location
    {<?= $workExperience->dateRange ?>} % Date(s)
    {
    \
    \begin{cvitems} % Description(s) of tasks/responsibilities
    @foreach($workExperience->getDescriptionEscaped() as $line)
        \item{<?= $line ?>}
    @endforeach
    \end{cvitems}
    }

@endforeach

%---------------------------------------------------------
\end{cventries}