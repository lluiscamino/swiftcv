@if(!empty($vars->projects))
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\resheading{Projects}

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

@foreach($vars->projects as $project)
    \item
    \ressubheading{\href{<?= $project->link ?>}{<?= $project->getNameEscaped() ?>}}{\textit{<?= $project->dateRange ?>}}{}{}
    \begin{itemize}
    @foreach($project->getDescriptionEscaped() as $line)
        \resitem{<?= $line ?>}
    @endforeach
    \end{itemize}
@endforeach
\end{itemize}
@endif