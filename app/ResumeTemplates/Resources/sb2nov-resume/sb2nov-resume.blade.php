@php use App\ResumeTemplates\Utils\SectionsRenderer;use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
@php $sectionsRenderer = SectionsRenderer::createWithDefaultPaths('sb2nov-resume'); @endphp
%-------------------------
% Resume in LateX
% Author : Sourabh Bajaj
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

\pagestyle{fancy}
\fancyhf{} % Clear all header and footer fields
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

% Ensure that generate PDF is machine readable/ATS parsable
\pdfgentounicode=1

%-------------------------
% Custom commands
\newcommand{\resumeItem}[2]{
\item\small{
\textbf{#1}{: #2 \vspace{-2pt}}
}
}

\newcommand{\resumeItemOne}[1]{
\item\small{
\textbf{}{#1 \vspace{-2pt}}
}
}

\newcommand{\resumeItemOneBold}[1]{
\item\small{
\textbf{#1}{\vspace{-2pt}}
}
}

% Just in case someone needs a heading that does not need to be in a list
\newcommand{\resumeHeading}[4]{
\begin{tabular*}{0.99\textwidth}[t]{l@{\extracolsep{\fill}}r}
\textbf{#1} & #2 \\
\textit{\small#3} & \textit{\small #4} \\
\end{tabular*}\vspace{-5pt}
}

\newcommand{\resumeSubheading}[4]{
\vspace{-1pt}\item
\begin{tabular*}{0.97\textwidth}[t]{l@{\extracolsep{\fill}}r}
\textbf{#1} & #2 \\
\textit{\small#3} & \textit{\small #4} \\
\end{tabular*}\vspace{-5pt}
}

\newcommand{\resumeSubSubheading}[2]{
\begin{tabular*}{0.97\textwidth}{l@{\extracolsep{\fill}}r}
\textit{\small#1} & \textit{\small #2} \\
\end{tabular*}\vspace{-5pt}
}

\newcommand{\resumeSubItem}[2]{\resumeItem{#1}{#2}\vspace{-4pt}}
\newcommand{\resumeSubItemOne}[1]{\resumeItemOneBold{#1}\vspace{-4pt}}

\renewcommand{\labelitemii}{$\circ$}

\newcommand{\resumeSubHeadingListStart}{\begin{itemize}[leftmargin=*]}
\newcommand{\resumeSubHeadingListEnd}{\end{itemize}}
\newcommand{\resumeItemListStart}{\begin{itemize}}
\newcommand{\resumeItemListEnd}{\end{itemize}\vspace{-5pt}}

%-------------------------------------------
%%%%%%  CV STARTS HERE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%


\begin{document}

%----------HEADING-----------------
\begin{tabular*}{\textwidth}{l@{\extracolsep{\fill}}r}
\textbf{\href{<?= $vars->contactInfo->website ?>}{\Large <?= $vars->contactInfo->getNameEscaped() ?>}}
@if($vars->contactInfo->email)
& Email: \href{mailto:<?= $vars->contactInfo->email ?>}{<?= $vars->contactInfo->email ?>}
@endif
\\
@if($vars->contactInfo->website)
\href{<?= $vars->contactInfo->website ?>}{<?= $vars->contactInfo->website ?>}
@endif
@if($vars->contactInfo->phoneNumber)
& Mobile: \href{tel:<?= $vars->contactInfo->phoneNumber ?>}{<?= $vars->contactInfo->phoneNumber ?>}
@endif
\\
\end{tabular*}


{!! $sectionsRenderer->renderSectionsInOrder($vars) !!}


%-------------------------------------------
\end{document}