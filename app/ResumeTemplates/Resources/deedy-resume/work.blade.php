\section{Experience}

@foreach($vars->workExperiences as $key => $workExperience)
    \runsubsection{<?= $workExperience->company ?>}
    \descript{| <?= $workExperience->jobTitle ?>}
    \location{<?= $workExperience->dateRange ?> | <?= $workExperience->location ?>}
    @if($key === 0)
        \vspace{\topsep} % Hacky fix for awkward extra vertical space
    @endif
    \begin{tightemize}
    @foreach($workExperience->description as $line)
        \item {{$line}}
    @endforeach
    \end{tightemize}
    \sectionsep
@endforeach