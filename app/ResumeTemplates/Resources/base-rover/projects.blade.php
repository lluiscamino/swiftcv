\section{Projects}
%=================
@foreach($vars->projects as $project)
    \subsection{ {{$project->name}} $|$ \normalfont\textit{ {{$project->link}} } \hfill {{$project->dateRange}} }
    \begin{itemize}
    @foreach($project->description as $line)
        \item {{$line}}
    @endforeach
    \end{itemize}
@endforeach