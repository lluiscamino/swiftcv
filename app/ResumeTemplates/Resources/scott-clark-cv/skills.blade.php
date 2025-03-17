@if(!empty($vars->skills))
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
\resheading{Skills}
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
\begin{itemize}
@foreach($vars->skills as $skill)
    \item {\bf <?= $skill->getNameEscaped() ?>:} <?= $skill->getDescriptionEscaped() ?>
@endforeach
\end{itemize}
@endif