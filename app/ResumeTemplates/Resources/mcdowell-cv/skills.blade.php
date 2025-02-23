\begin{cvsection}{Languages and Technologies}
\begin{cvsubsection}{}{}{}
\begin{itemize}
@foreach($vars->skills as $skill)
    \item \textbf{<?= $skill->getNameEscaped() ?>}: {{ $skill->getDescriptionEscaped() }}
@endforeach
\end{itemize}
\end{cvsubsection}
\end{cvsection}