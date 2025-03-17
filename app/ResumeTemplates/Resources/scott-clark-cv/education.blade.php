@if(!empty($vars->educationExperiences))
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\resheading{Education}

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\begin{itemize}

@foreach($vars->educationExperiences as $educationExperience)
    \item
    \ressubheading{<?= $educationExperience->getUniversityEscaped() ?>}{<?= $educationExperience->getLocationEscaped() ?>}{<?= $educationExperience->getDegreeEscaped() ?>}{<?= $educationExperience->dateRange ?>}
    \begin{itemize}
    @foreach($educationExperience->getDescriptionEscaped() as $line)
        \resitem{<?= $line ?>}
    @endforeach
    \end{itemize}
@endforeach

\end{itemize}
@endif