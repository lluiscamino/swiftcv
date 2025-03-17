@if(!empty($vars->workExperiences))
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
\resheading{Industry Experience}
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
\begin{itemize}
@foreach($vars->workExperiences as $workExperience)
    \item
    \ressubheading{<?= $workExperience->getCompanyEscaped() ?>}{<?= $workExperience->getLocationEscaped() ?>}{<?= $workExperience->getJobTitleEscaped() ?>}{<?= $workExperience->dateRange ?>}
    \begin{itemize}
    @foreach($workExperience->getDescriptionEscaped() as $line)
        \resitem{<?= $line ?>}
    @endforeach
    \end{itemize}
@endforeach
\end{itemize}
@endif