%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     SKILLS
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\section{Skills}
%\subsection{Programming}
@foreach($vars->skills as $skill)
    \textbullet{} \textbf{<?= $skill->getNameEscaped() ?>}: <?= $skill->getDescriptionEscaped() ?>
@endforeach