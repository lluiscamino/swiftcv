\hrule
\vspace{-1em}
\subsection*{\Large Skills}

\hyphenpenalty=1000
\begin{itemize}[leftmargin=1em,noitemsep]
@foreach($vars->skills as $skill)
    \item \textbf{ {{ $skill->name }}: }
    {{ $skill->description }}
@endforeach
\end{itemize}