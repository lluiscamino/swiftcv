@php use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
%% The MIT License (MIT)
%%
%% Copyright (c) 2015 Daniil Belyakov
%%
%% Permission is hereby granted, free of charge, to any person obtaining a copy
%% of this software and associated documentation files (the "Software"), to deal
%% in the Software without restriction, including without limitation the rights
%% to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
%% copies of the Software, and to permit persons to whom the Software is
%% furnished to do so, subject to the following conditions:
%%
%% The above copyright notice and this permission notice shall be included in all
%% copies or substantial portions of the Software.
%%
%% THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
%% IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
%% FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
%% AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
%% LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
%% OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
%% SOFTWARE.

% The font could be set to Windows-specific Calibri by using the 'calibri' option
\documentclass[]{mcdowell-cv}

% For mathematical symbols
\usepackage{amsmath}

% Set applicant's personal data for header
\name{<?= $vars->name ?>}
\address{123 Spruce St, Apt 35 \linebreak Philadelphia PA 19103}
\contacts{<?= $vars->phoneNumber ?> \linebreak <?= $vars->email ?>}

\begin{document}

% Print the header
\makeheader

% Print the content
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

\begin{cvsection}{Education}

@foreach($vars->educationExperiences as $educationExperience)
    \begin{cvsubsection}{<?= $educationExperience->location ?>}{<?= $educationExperience->university ?>}{<?= $educationExperience->dateRange ?>}
    \begin{itemize}
    \item <?= $educationExperience->degree ?>. GPA: 3.6
    @foreach($educationExperience->description as $line)
        \item {{ $line }}
    @endforeach
    \end{itemize}
    \end{cvsubsection}
    \end{cvsection}
@endforeach

\begin{cvsection}{Technical Experience}
\begin{cvsubsection}{Projects}{}{}

@foreach($vars->projects as $project)
    \begin{itemize}
    \item \textbf{<?= $project->name ?>} (<?= $project->dateRange ?>). {{ implode('. ', $project->description) }}
    \end{itemize}
@endforeach
\end{cvsubsection}
\end{cvsection}

\begin{cvsection}{Additional Experience and Awards}
\begin{cvsubsection}{}{}{}
\begin{itemize}
\item \textbf{Instructor (2003 – 2005):} Taught two full-credit Computer Science courses; average ratings of 4.8 out of 5.0.
\item \textbf{Third Prize, Senior Design Projects:} Awarded 3rd prize for Synchronized Calendar project, out of 100 projects.
\end{itemize}
\end{cvsubsection}
\end{cvsection}

\begin{cvsection}{Languages and Technologies}
\begin{cvsubsection}{}{}{}
\begin{itemize}
@foreach($vars->skills as $skill)
    \item \textbf{<?= $skill->name ?>}: {{ $skill->description }}
@endforeach
\end{itemize}
\end{cvsubsection}
\end{cvsection}

\end{document}
