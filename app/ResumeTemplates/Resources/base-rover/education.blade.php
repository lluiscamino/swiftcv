\section{Education}
%=================%
@foreach($vars->educationExperiences as $educationExperience)
    \subsection{<?= $educationExperience->university ?>, <?= $educationExperience->location ?> $|$ {\normalfont\itshape <?= $educationExperience->degree ?>} \hfill <?= $educationExperience->dateRange ?>}
    \begin{itemize}
    @foreach($educationExperience->description as $line)
        \item {{$line}}
    @endforeach
    \end{itemize}
@endforeach