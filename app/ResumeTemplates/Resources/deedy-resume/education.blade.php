%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     EDUCATION
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\section{Education}

@foreach($vars->educationExperiences as $educationExperience)
    \subsection{<?= $educationExperience->university ?>}
    \descript{<?= $educationExperience->degree ?>}
    \location{<?= $educationExperience->dateRange ?> | <?= $educationExperience->location ?>}
    %College of Engineering \\
    %Magna Cum Laude\\
    %\location{ Cum. GPA: 3.83 / 4.0 \\
    %Major GPA: 3.9 / 4.0}
    \sectionsep
@endforeach