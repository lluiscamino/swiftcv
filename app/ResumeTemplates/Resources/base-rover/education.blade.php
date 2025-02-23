\section{Education}
%=================%
@foreach($vars->educationExperiences as $educationExperience)
    \subsection{<?= $educationExperience->getUniversityEscaped() ?>, <?= $educationExperience->getLocationEscaped() ?> $|$ {\normalfont\itshape <?= $educationExperience->getDegreeEscaped() ?>} \hfill <?= $educationExperience->dateRange ?>}
    \begin{itemize}
    @foreach($educationExperience->getDescriptionEscaped() as $line)
        \item {{$line}}
    @endforeach
    \end{itemize}
@endforeach