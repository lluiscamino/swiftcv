@if(!empty($vars->projects))
    \section{\faUsers\ Projects}
@endif

@foreach($vars->projects as $project)
    \datedsubsection{\textbf{<?= $project->getNameEscaped() ?>}}{<?= $project->dateRange ?>}
    @if(!empty($project->getDescriptionEscaped()))
        \begin{itemize}
        @foreach($project->getDescriptionEscaped() as $line)
            \item <?= $line ?>
        @endforeach
        \end{itemize}
    @endif
@endforeach