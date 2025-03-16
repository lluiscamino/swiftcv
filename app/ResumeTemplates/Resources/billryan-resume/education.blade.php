@if(!empty($vars->educationExperiences))
    \section{\faGraduationCap\ Education}
@endif
@foreach($vars->educationExperiences as $educationExperience)
    \datedsubsection{\textbf{<?= $educationExperience->getUniversityEscaped() ?>}, <?= $educationExperience->getLocationEscaped() ?>}{<?= $educationExperience->dateRange ?>}
    <?= $educationExperience->getDegreeEscaped() ?>
    @if(!empty($educationExperience->getDescriptionEscaped()))
        \begin{itemize}
        @foreach($educationExperience->getDescriptionEscaped() as $line)
            \item <?= $line ?>
        @endforeach
        \end{itemize}
    @endif
@endforeach