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
    {<?= $workExperience->jobTitle ?>} % Job title
    {<?= $workExperience->company ?>} % Organization
    {<?= $workExperience->location ?>} % Location
    {<?= $workExperience->dateRange ?>} % Date(s)
    {
    \
    \begin{cvitems} % Description(s) of tasks/responsibilities
    @foreach($workExperience->description as $line)
        \item{<?= $line ?>}
    @endforeach
    \end{cvitems}
    }

@endforeach

%---------------------------------------------------------
\end{cventries}