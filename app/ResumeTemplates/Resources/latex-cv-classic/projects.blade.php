%---------------------------------------------------------------------------------------
%	PROJECTS
%----------------------------------------------------------------------------------------
\cvsection{Projects}

@foreach($vars->projects as $project)
    \cvproject{<?= $project->dateRange ?>}{\href{<?= $project->link ?>}{<?= $project->getNameEscaped() ?>}}{<?= join(',', array_map(fn(string $line) => '{' . $line . '}', $project->getDescriptionEscaped())) ?>}
@endforeach