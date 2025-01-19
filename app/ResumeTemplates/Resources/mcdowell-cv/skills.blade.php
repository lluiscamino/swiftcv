\begin{cvsection}{Languages and Technologies}
\begin{cvsubsection}{}{}{}
\begin{itemize}
@foreach($vars->skills as $skill)
    \item \textbf{<?= $skill->name ?>}: {{ $skill->description }}
@endforeach
\end{itemize}
\end{cvsubsection}
\end{cvsection}