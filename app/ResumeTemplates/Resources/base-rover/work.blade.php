\section{Experience}
%=================%
@foreach($vars->workExperiences as $workExperience)
    \subsection{ {{$workExperience->jobTitle}} \hfill  {{$workExperience->dateRange}} }
    \subsubsection{ {{ $workExperience->company }} \hfill {{$workExperience->location}} }
    \begin{itemize}
    @foreach($workExperience->description as $line)
        \item {{$line}}
    @endforeach
    \end{itemize}
@endforeach