@if(!empty($vars->workExperiences))
    \cvsection{Experience}
@endif

@foreach($vars->workExperiences as $index => $workExperience)
    @if($index > 0)
        \divider
    @endif
    \cvevent{<?= $workExperience->getJobTitleEscaped() ?>}{<?= $workExperience->getCompanyEscaped() ?>}{<?= $workExperience->dateRange ?>}{<?= $workExperience->getLocationEscaped() ?>}
    @if(!empty($workExperience->getDescriptionEscaped()))
        \begin{itemize}
        @foreach($workExperience->getDescriptionEscaped() as $line)
            \item <?= $line ?>
        @endforeach
        \end{itemize}
    @endif
@endforeach