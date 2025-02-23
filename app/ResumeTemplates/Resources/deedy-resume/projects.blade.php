%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     PROJECTS
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\section{Projects}

@foreach($vars->projects as $project)
    \subsection{<?= $project->getNameEscaped() ?>}
    \location{<?= $project->dateRange ?> | <?= $project->link ?>}
    \begin{tightemize}
    @foreach($project->getDescriptionEscaped() as $line)
        \item {{$line}}
    @endforeach
    \end{tightemize}
@endforeach