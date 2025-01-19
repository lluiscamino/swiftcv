\begin{cvsection}{Education}

@foreach($vars->educationExperiences as $educationExperience)
    \begin{cvsubsection}{<?= $educationExperience->location ?>}{<?= $educationExperience->university ?>}{<?= $educationExperience->dateRange ?>}
    \begin{itemize}
    \item <?= $educationExperience->degree ?>. GPA: 3.6
    @foreach($educationExperience->description as $line)
        \item {{ $line }}
    @endforeach
    \end{itemize}
    \end{cvsubsection}
@endforeach
\end{cvsection}