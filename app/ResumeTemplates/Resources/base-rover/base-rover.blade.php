@php use App\ResumeTemplates\Utils\SectionsRenderer;use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
@php $sectionsRenderer = SectionsRenderer::createWithDefaultPaths('base-rover'); @endphp
%-------------------------
% Rover Resume - Base Template
% Link: https://github.com/subidit/rover-resume
%
% Shows code for various formatting options for different resume sections.
% Education and Projects have single-line headers; while Experience uses double-line.
% Some formatting codes are kept inline; consider \newcommand{cmd}{def}.
% Excludes hyperref and icons for readability; MVP version.
% Explore other templates for more options.
% Mix and match as desired. Be consistent with headers and sub-headers.
%------------------------

\documentclass[11pt]{article} % fontsize 10pt/11pt/12pt

\usepackage[margin=1in, a4paper]{geometry}
\setcounter{secnumdepth}{0} % remove section numbering
\usepackage{titlesec}
\titlespacing{\subsection}{0pt}{*0}{*0} % remove vertical spacing above and below
\titlespacing{\subsubsection}{0pt}{*0}{*0}
\titleformat{\section}{\large\bfseries\uppercase}{}{}{}[\titlerule]
\titleformat*{\subsubsection}{\large\itshape}
\usepackage{enumitem}
\setlist[itemize]{noitemsep,left=0pt .. \parindent}
\pagestyle{empty} % remove page number
\pdfgentounicode=1


\begin{document}

\begin{center}
\begin{minipage}{0.5\textwidth}
{\Huge\bfseries
{{$vars->contactInfo->name}}
} \\ \medskip
% Resume Template % Title [optional]
\end{minipage} \hfill
\begin{minipage}{0.4\textwidth}
\raggedleft
Email: {{$vars->contactInfo->email}} \\
Mobile: {{$vars->contactInfo->phoneNumber}} \\
LinkedIn: linkedin.com/in/{{$vars->contactInfo->linkedinUsername}} \\
GitHub: github.com/{{$vars->contactInfo->githubUsername}}
\end{minipage}
\end{center}

{!! $sectionsRenderer->renderSectionsInOrder($vars) !!}

%\section{Certification \& Awards}
%===============================%
%\begin{enumerate}[label=\null, left=0pt..0pt, itemsep=0pt]
%\item Some programming bootcamp, Location. \hfill 2023
%\item Forbes Top 15 Procrastinators under 15. \hfill 2022
%\item Perticipation award for attending workshop. \hfill 2021
%\end{enumerate}

\end{document}