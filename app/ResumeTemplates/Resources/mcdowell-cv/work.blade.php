\begin{cvsection}{Employment}
@foreach($vars->workExperiences as $workExperience)
    \begin{cvsubsection}{<?= $workExperience->getJobTitleEscaped() ?>}{<?= $workExperience->getCompanyEscaped() ?>}{<?= $workExperience->dateRange ?>}
    %iChat AV
    \begin{itemize}
    @foreach($workExperience->getDescriptionEscaped() as $line)
        \item {{ $line }}
    @endforeach
    \end{cvsubsection}
@endforeach
\end{cvsection}