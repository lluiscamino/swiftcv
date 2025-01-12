@php use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
%-------------------------
% Resume in Latex
% Author : Jake Gutierrez
% Based off of: https://github.com/sb2nov/resume
% License : MIT
%------------------------

\documentclass[letterpaper,11pt]{article}

\usepackage{latexsym}
\usepackage[empty]{fullpage}
\usepackage{titlesec}
\usepackage{marvosym}
\usepackage[usenames,dvipsnames]{color}
\usepackage{verbatim}
\usepackage{enumitem}
\usepackage[hidelinks]{hyperref}
\usepackage{fancyhdr}
\usepackage[english]{babel}
\usepackage{tabularx}
\input{glyphtounicode}


%----------FONT OPTIONS----------
% sans-serif
% \usepackage[sfdefault]{FiraSans}
% \usepackage[sfdefault]{roboto}
% \usepackage[sfdefault]{noto-sans}
% \usepackage[default]{sourcesanspro}

% serif
% \usepackage{CormorantGaramond}
% \usepackage{charter}


\pagestyle{fancy}
\fancyhf{} % clear all header and footer fields
\fancyfoot{}
\renewcommand{\headrulewidth}{0pt}
\renewcommand{\footrulewidth}{0pt}

% Adjust margins
\addtolength{\oddsidemargin}{-0.5in}
\addtolength{\evensidemargin}{-0.5in}
\addtolength{\textwidth}{1in}
\addtolength{\topmargin}{-.5in}
\addtolength{\textheight}{1.0in}

\urlstyle{same}

\raggedbottom
\raggedright
\setlength{\tabcolsep}{0in}

% Sections formatting
\titleformat{\section}{
\vspace{-4pt}\scshape\raggedright\large
}{}{0em}{}[\color{black}\titlerule \vspace{-5pt}]

% Ensure that generate pdf is machine readable/ATS parsable
\pdfgentounicode=1

%-------------------------
% Custom commands
\newcommand{\resumeItem}[1]{
\item\small{
{#1 \vspace{-2pt}}
}
}

\newcommand{\resumeSubheading}[4]{
\vspace{-2pt}\item
\begin{tabular*}{0.97\textwidth}[t]{l@{\extracolsep{\fill}}r}
\textbf{#1} & #2 \\
\textit{\small#3} & \textit{\small #4} \\
\end{tabular*}\vspace{-7pt}
}

\newcommand{\resumeSubSubheading}[2]{
\item
\begin{tabular*}{0.97\textwidth}{l@{\extracolsep{\fill}}r}
\textit{\small#1} & \textit{\small #2} \\
\end{tabular*}\vspace{-7pt}
}

\newcommand{\resumeProjectHeading}[2]{
\item
\begin{tabular*}{0.97\textwidth}{l@{\extracolsep{\fill}}r}
\small#1 & #2 \\
\end{tabular*}\vspace{-7pt}
}

\newcommand{\resumeSubItem}[1]{\resumeItem{#1}\vspace{-4pt}}

\renewcommand\labelitemii{$\vcenter{\hbox{\tiny$\bullet$}}$}

\newcommand{@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListStart
@endif}{\begin{itemize}[leftmargin=0.15in, label={}]}
\newcommand{@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListEnd
@endif}{\end{itemize}}
\newcommand{\resumeItemListStart}{\begin{itemize}}
\newcommand{\resumeItemListEnd}{\end{itemize}\vspace{-5pt}}

%-------------------------------------------
%%%%%%  RESUME STARTS HERE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%


\begin{document}

%----------HEADING----------
% \begin{tabular*}{\textwidth}{l@{\extracolsep{\fill}}r}
%   \textbf{\href{http://sourabhbajaj.com/}{\Large Sourabh Bajaj}} & Email : \href{mailto:sourabh@sourabhbajaj.com}{sourabh@sourabhbajaj.com}\\
%   \href{http://sourabhbajaj.com/}{http://www.sourabhbajaj.com} & Mobile : +1-123-456-7890 \\
% \end{tabular*}

\begin{center}
\textbf{\Huge \scshape <?= $vars->name ?>} \\ \vspace{1pt}
\small <?= $vars->phoneNumber ?> $|$ \href{mailto:<?= $vars->email ?>}{\underline{<?= $vars->email ?>}} $|$
\href{https://linkedin.com/in/<?= $vars->linkedinUsername ?>}{\underline{linkedin.com/in/<?= $vars->linkedinUsername ?>}} $|$
\href{https://github.com/<?= $vars->githubUsername ?> }{\underline{github.com/<?= $vars->githubUsername ?>}}
\end{center}


%-----------EDUCATION-----------
\section{Education}
@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListStart
@endif

@foreach($vars->educationExperiences as $educationExperience)
    \resumeSubheading
    {<?= $educationExperience->university ?>}{<?= $educationExperience->location ?>}
    {<?= $educationExperience->degree ?>}{<?= $educationExperience->startDate->format('M Y') ?> - <?= $educationExperience->endDate?->format('M Y') ?? 'Present' ?>}
    \resumeItemListStart
    @foreach($educationExperience->description as $line)
        \resumeItem{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach

@if(!empty($vars->educationExperiences))
    \resumeSubHeadingListEnd
@endif


%-----------EXPERIENCE-----------
\section{Experience}
@if(!empty($vars->workExperiences))
    \resumeSubHeadingListStart
@endif

@foreach($vars->workExperiences as $workExperience)
    \resumeSubheading
    {<?= $workExperience->jobTitle ?>}{<?= $workExperience->startDate->format('M Y') ?> - <?= $workExperience->endDate?->format('M Y') ?? 'Present' ?>}
    {<?= $workExperience->company ?>}{<?= $workExperience->location ?>}
    \resumeItemListStart
    @foreach($workExperience->description as $line)
        \resumeItem{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach

@if(!empty($vars->workExperiences))
    \resumeSubHeadingListEnd
@endif

% -----------Multiple Positions Heading-----------
%    \resumeSubSubheading
%     {Software Engineer I}{Oct 2014 - Sep 2016}
%     \resumeItemListStart
%        \resumeItem{Apache Beam}
%          {Apache Beam is a unified model for defining both batch and streaming data-parallel processing pipelines}
%     \resumeItemListEnd
%    \resumeSubHeadingListEnd
%-------------------------------------------

%-----------PROJECTS-----------
\section{Projects}
@if(!empty($vars->projects))
    \resumeSubHeadingListStart
@endif

@foreach($vars->projects as $project)
    \resumeProjectHeading
    {\textbf{<?= $project->name ?>} $|$ \emph{Python, Flask, React, PostgreSQL, Docker}}{<?= $project->startDate->format('M Y') ?> - <?= $project->endDate?->format('M Y') ?? 'Present' ?>}
    \resumeItemListStart
    @foreach($project->description as $line)
        \resumeItem{<?= $line ?>}
    @endforeach
    \resumeItemListEnd
@endforeach

@if(!empty($vars->projects))
    \resumeSubHeadingListEnd
@endif


%
%-----------PROGRAMMING SKILLS-----------
\section{Technical Skills}
\begin{itemize}[leftmargin=0.15in, label={}]
\small{\item{
@foreach($vars->skills as $skill)
    \textbf{<?= $skill->name ?>}{: <?= $skill->description ?>} \\
@endforeach
}}
\end{itemize}


%-------------------------------------------
\end{document}