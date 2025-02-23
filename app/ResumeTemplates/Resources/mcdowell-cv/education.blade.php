\begin{cvsection}{Education}

@foreach($vars->educationExperiences as $educationExperience)
    \begin{cvsubsection}{<?= $educationExperience->getLocationEscaped() ?>}{<?= $educationExperience->getUniversityEscaped() ?>}{<?= $educationExperience->dateRange ?>}
    \begin{itemize}
    \item <?= $educationExperience->getDegreeEscaped() ?>. GPA: 3.6
    @foreach($educationExperience->getDescriptionEscaped() as $line)
        \item {{ $line }}
    @endforeach
    \end{itemize}
    \end{cvsubsection}
@endforeach
\end{cvsection}