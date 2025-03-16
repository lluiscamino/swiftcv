@if(!empty($vars->educationExperiences))
    \cvsection{Education}
@endif

@foreach($vars->educationExperiences as $index => $educationExperience)
    @if($index > 0)
        \divider
    @endif
    \cvevent{<?= $educationExperience->getDegreeEscaped() ?>}{<?= $educationExperience->getUniversityEscaped() ?>}{<?= $educationExperience->dateRange ?>}{}
    @if(!empty($educationExperience->getDescriptionEscaped()))
        \begin{itemize}
        @foreach($educationExperience->getDescriptionEscaped() as $line)
            \item <?= $line ?>
        @endforeach
        \end{itemize}
    @endif
@endforeach