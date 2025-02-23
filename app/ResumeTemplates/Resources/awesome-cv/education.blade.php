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
    {<?= $educationExperience->getDegreeEscaped() ?>} % Degree
    {<?= $educationExperience->getUniversityEscaped() ?>} % Institution
    {<?= $educationExperience->getLocationEscaped() ?>} % Location
    {<?= $educationExperience->dateRange ?>} % Date(s)
    {
    \
    \begin{cvitems} % Description(s) bullet points
    @foreach($educationExperience->getDescriptionEscaped() as $line)
        \item {<?= $line ?>}
    @endforeach
    \end{cvitems}
    }

@endforeach

%---------------------------------------------------------
\end{cventries}
