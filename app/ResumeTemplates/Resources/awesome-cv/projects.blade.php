@php use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp

%-------------------------------------------------------------------------------
%    SECTION TITLE
%-------------------------------------------------------------------------------
\cvsection{Personal projects}


%-------------------------------------------------------------------------------
%    CONTENT
%-------------------------------------------------------------------------------
\begin{cvprojects}

%---------------------------------------------------------

@foreach($vars->projects as $project)
    \cvproject
    {} % Role
    {\href{<?= $project->link ?>}{<?= $project->getNameEscaped() ?>}} % Title
    {} % Location
    {<?= $project->dateRange ?>} % Date
    {
    \
    \begin{cvitems} % Description(s)
    @foreach($project->getDescriptionEscaped() as $line)
        \item {<?= $line ?>}
    @endforeach
    \end{cvitems}
    }

@endforeach

%---------------------------------------------------------
\end{cvprojects}
