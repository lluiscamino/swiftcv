\hrule
\vspace{-1em}
\subsection*{\Large Experience}

\renewcommand\labelitemi{}
\renewcommand\labelitemii{$\bullet$}
\begin{itemize}[leftmargin=1em]
\parskip=0.1em

@foreach($vars->workExperiences as $workExperience)
    \item
    \headerrow
    {\textbf{ {{ $workExperience->company }} }}
    {\textbf{ {{$workExperience->location}} }}
    \headerrow
    {\emph{ {{$workExperience->jobTitle}} }}
    {\emph{<?= $workExperience->dateRange ?>}}
    \begin{itemize*}
    @foreach($workExperience->description as $line)
        \item {{$line}}
    @endforeach
    \end{itemize*}
@endforeach

\end{itemize}