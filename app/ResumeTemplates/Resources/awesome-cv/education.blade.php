%-------------------------------------------------------------------------------
%    SECTION TITLE
%-------------------------------------------------------------------------------
\cvsection{Education}


%-------------------------------------------------------------------------------
%    CONTENT
%-------------------------------------------------------------------------------
\begin{cventries}

@foreach($vars->educationExperiences as $educationExperience)
    %---------------------------------------------------------
    \cventry
    {<?= $educationExperience->degree ?>} % Degree
    {<?= $educationExperience->university ?>} % Institution
    {<?= $educationExperience->location ?>} % Location
    {<?= $educationExperience->dateRange ?>} % Date(s)
    {
    \
    \begin{cvitems} % Description(s) bullet points
    @foreach($educationExperience->description as $line)
        \item {<?= $line ?>}
    @endforeach
    \end{cvitems}
    }

@endforeach

%---------------------------------------------------------
\end{cventries}
