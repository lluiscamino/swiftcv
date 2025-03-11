%--------SKILLS------------
\section{Skills}
\resumeSubHeadingListStart
\item{
@foreach($vars->skills as $skill)
    \textbf{<?= $skill->getNameEscaped() ?>}{: <?= $skill->getDescriptionEscaped() ?>}
    \hfill
@endforeach
}
\resumeSubHeadingListEnd