\begin{cvsection}{Employment}
@foreach($vars->workExperiences as $workExperience)
    \begin{cvsubsection}{<?= $workExperience->jobTitle ?>}{<?= $workExperience->company ?>}{<?= $workExperience->dateRange ?>}
    %iChat AV
    \begin{itemize}
    @foreach($workExperience->description as $line)
        \item {{ $line }}
    @endforeach
    \end{cvsubsection}
@endforeach
\end{cvsection}