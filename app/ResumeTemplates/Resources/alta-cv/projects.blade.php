@if(!empty($vars->projects))
    \cvsection{Projects}
@endif

@foreach($vars->projects as $index => $project)
    @if($index > 0)
        \divider
    @endif
    \cvevent{<?= $project->getNameEscaped() ?>}{}{<?= $project->dateRange ?>}{}
    @if(!empty($project->getDescriptionEscaped()))
        \begin{itemize}
        @foreach($project->getDescriptionEscaped() as $line)
            \item <?= $line ?>
        @endforeach
        \end{itemize}
    @endif
@endforeach