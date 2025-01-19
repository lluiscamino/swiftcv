\begin{cvsection}{Technical Experience}
\begin{cvsubsection}{Projects}{}{}

\begin{itemize}
@foreach($vars->projects as $project)
    \item \textbf{<?= $project->name ?>} (<?= $project->dateRange ?>). {{ implode('. ', $project->description) }}
@endforeach
\end{itemize}
\end{cvsubsection}
\end{cvsection}