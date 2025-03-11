%-----------PROJECTS-----------------
\section{Projects}
\resumeSubHeadingListStart
@foreach($vars->projects as $project)
   @if($project->getDescriptionEscaped())
       \resumeSubItem{\href{<?= $project->link ?>}{<?= $project->getNameEscaped() ?> (<?= $project->dateRange ?>)}}
       {<?= join(',', $project->getDescriptionEscaped()) ?>}
   @else
       \resumeSubItemOne{\href{<?= $project->link ?>}{<?= $project->getNameEscaped() ?> (<?= $project->dateRange ?>)}}
   @endif

@endforeach
\resumeSubHeadingListEnd