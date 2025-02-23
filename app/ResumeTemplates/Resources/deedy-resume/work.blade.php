\section{Experience}

@foreach($vars->workExperiences as $key => $workExperience)
    \runsubsection{<?= $workExperience->getCompanyEscaped() ?>}
    \descript{| <?= $workExperience->getJobTitleEscaped() ?>}
    \location{<?= $workExperience->dateRange ?> | <?= $workExperience->getLocationEscaped() ?>}
    @if($key === 0)
        \vspace{\topsep} % Hacky fix for awkward extra vertical space
    @endif
    \begin{tightemize}
    @foreach($workExperience->getDescriptionEscaped() as $line)
        \item {{$line}}
    @endforeach
    \end{tightemize}
    \sectionsep
@endforeach