\section{Experience}
%=================%
@foreach($vars->workExperiences as $workExperience)
    \subsection{ {{$workExperience->getJobTitleEscaped()}} \hfill  {{$workExperience->dateRange}} }
    \subsubsection{ {{ $workExperience->getCompanyEscaped() }} \hfill {{$workExperience->getLocationEscaped()}} }
    \begin{itemize}
    @foreach($workExperience->getDescriptionEscaped() as $line)
        \item {{$line}}
    @endforeach
    \end{itemize}
@endforeach