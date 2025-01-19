\hrule
\vspace{-1em}
\subsection*{\Large Projects}

\renewcommand\labelitemi{}
\renewcommand\labelitemii{$\bullet$}
\begin{itemize}[leftmargin=1em]
\parskip=0.1em

@foreach($vars->projects as $project)
    \item
    \headerrow
    {\textbf{ {{ $project->name }} }}
    {\emph{<?= $project->dateRange ?>}}
    \headerrow
    {\emph{ {{$project->link}} }}
    {}
    \begin{itemize*}
    @foreach($project->description as $line)
        \item {{$line}}
    @endforeach
    \end{itemize*}
@endforeach

\end{itemize}