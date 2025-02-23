%-------------------------------------------------------------------------------
%    SECTION TITLE
%-------------------------------------------------------------------------------
\cvsection{Personal projects}


%-------------------------------------------------------------------------------
%    CONTENT
%-------------------------------------------------------------------------------
\begin{cvprojects}

%---------------------------------------------------------

@foreach($vars->projects as $project)
    \cvproject
    {} % Role
    {<?= $project->getNameEscaped() ?>} % Title
    {} % Location
    {
    \href{<?= $project->link ?>}{\faGithub\acvHeaderIconSep\@}
    %\href{https://twitter.com/archicontext}{\faTwitter\acvHeaderIconSep\@}
    } % GitHub
    {
    \
    \begin{cvitems} % Description(s)
    @foreach($project->getDescriptionEscaped() as $line)
        \item {<?= $line ?>}
    @endforeach
    \end{cvitems}
    }

@endforeach

%---------------------------------------------------------
\end{cvprojects}
