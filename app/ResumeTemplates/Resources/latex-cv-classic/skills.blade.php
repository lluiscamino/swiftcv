%---------------------------------------------------------------------------------------
%	SKILLS
%----------------------------------------------------------------------------------------
\cvsection{Skills}

\vspace{-8pt}
\textcolor{softcol}{\hrule}
\vspace{6pt}

@foreach($vars->skills as $skill)
    $\cdot$ \ \textbf{<?= $skill->getNameEscaped() ?>}: <?= $skill->getDescriptionEscaped() ?>\\[3pt]
@endforeach

\vspace{3pt}