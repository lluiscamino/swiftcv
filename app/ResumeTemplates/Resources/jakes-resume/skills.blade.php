%-----------PROGRAMMING SKILLS-----------
\section{Technical Skills}
\begin{itemize}[leftmargin=0.15in, label={}]
\small{\item{
@foreach($vars->skills as $skill)
    \textbf{<?= $skill->getNameEscaped() ?>}{: <?= $skill->getDescriptionEscaped() ?>} \\
@endforeach
}}
\end{itemize}