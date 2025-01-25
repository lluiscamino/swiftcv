%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     SKILLS
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\section{Skills}
%\subsection{Programming}
@foreach($vars->skills as $skill)
    \textbullet{} \textbf{<?= $skill->name ?>}: <?= $skill->description ?>
@endforeach