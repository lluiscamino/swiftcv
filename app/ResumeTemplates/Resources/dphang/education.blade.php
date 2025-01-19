\hrule
\vspace{-1em}
\subsection*{\Large Education}

\begin{itemize}[leftmargin=1em]
\parskip=0.1em

@foreach($vars->educationExperiences as $educationExperience)
    \item
    \headerrow
    {\textbf{ {{$educationExperience->university}} }}
    {\textbf{<?= $educationExperience->location ?>}}
    \headerrow
    {\emph{ {{$educationExperience->degree}} } (\textbf{GPA:} 3.96/4.00)}
    {\emph{<?= $educationExperience->dateRange ?>}}
@endforeach

\end{itemize}