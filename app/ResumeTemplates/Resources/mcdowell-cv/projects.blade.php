\begin{cvsection}{Technical Experience}
\begin{cvsubsection}{Projects}{}{}

\begin{itemize}
@foreach($vars->projects as $project)
    \item \textbf{<?= $project->getNameEscaped() ?>} (<?= $project->dateRange ?>). {{ implode('. ', $project->getDescriptionEscaped()) }}
@endforeach
\end{itemize}
\end{cvsubsection}
\end{cvsection}