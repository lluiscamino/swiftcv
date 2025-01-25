%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     PROJECTS
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\section{Projects}

@foreach($vars->projects as $project)
    \subsection{<?= $project->name ?>}
    \location{<?= $project->dateRange ?> | <?= $project->link ?>}
    \begin{tightemize}
    @foreach($project->description as $line)
        \item {{$line}}
    @endforeach
    \end{tightemize}
@endforeach