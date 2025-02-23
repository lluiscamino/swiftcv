\section{Projects}
%=================
@foreach($vars->projects as $project)
    \subsection{ {{$project->getNameEscaped()}} $|$ \normalfont\textit{ {{$project->link}} } \hfill {{$project->dateRange}} }
    \begin{itemize}
    @foreach($project->getDescriptionEscaped() as $line)
        \item {{$line}}
    @endforeach
    \end{itemize}
@endforeach