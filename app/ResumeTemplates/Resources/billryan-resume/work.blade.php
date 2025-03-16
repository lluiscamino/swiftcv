@if(!empty($vars->workExperiences))
    \section{\faUsers\ Experience}
@endif

@foreach($vars->workExperiences as $workExperience)
    \datedsubsection{\textbf{<?= $workExperience->getCompanyEscaped() ?>} <?= $workExperience->getLocationEscaped() ?>}{<?= $workExperience->dateRange ?>}
    \role{<?= $workExperience->getJobTitleEscaped() ?>}{}
    @if(!empty($workExperience->getDescriptionEscaped()))
        \begin{itemize}
        @foreach($workExperience->getDescriptionEscaped() as $line)
            \item <?= $line ?>
        @endforeach
        \end{itemize}
    @endif
@endforeach