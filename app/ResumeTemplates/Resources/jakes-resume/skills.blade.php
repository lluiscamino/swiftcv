%-----------PROGRAMMING SKILLS-----------
\section{Technical Skills}
\begin{itemize}[leftmargin=0.15in, label={}]
\small{\item{
@foreach($vars->skills as $skill)
    \textbf{<?= $skill->name ?>}{: <?= $skill->description ?>} \\
@endforeach
}}
\end{itemize}