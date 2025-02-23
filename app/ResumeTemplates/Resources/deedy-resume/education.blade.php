%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     EDUCATION
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\section{Education}

@foreach($vars->educationExperiences as $educationExperience)
    \subsection{<?= $educationExperience->getUniversityEscaped() ?>}
    \descript{<?= $educationExperience->getDegreeEscaped() ?>}
    \location{<?= $educationExperience->dateRange ?> | <?= $educationExperience->getLocationEscaped() ?>}
    %College of Engineering \\
    %Magna Cum Laude\\
    %\location{ Cum. GPA: 3.83 / 4.0 \\
    %Major GPA: 3.9 / 4.0}
    \sectionsep
@endforeach