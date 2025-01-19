%-----------PROJECTS-----------
\section{Projects}
@if(!empty($vars->projects))
    \resumeSubHeadingListStart
@endif

@foreach($vars->projects as $project)
    \resumeProjectHeading
    {\textbf{<?= $project->name ?>} $|$ \emph{Python, Flask, React, PostgreSQL, Docker}}{<?= $project->dateRange ?>}
    \resumeItemListStart
    @foreach($project->description as $line)
        \resumeItem{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach

@if(!empty($vars->projects))
    \resumeSubHeadingListEnd
@endif