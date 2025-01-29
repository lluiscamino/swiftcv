@php use App\ResumeTemplates\Utils\SectionsRenderer;use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
@php $sectionsRenderer = SectionsRenderer::createWithDefaultPaths('dphang'); @endphp
\documentclass[11pt,letterpaper]{article}
\usepackage[letterpaper,margin=0.5in]{geometry}
\usepackage[utf8]{inputenc}
\usepackage{mdwlist}
\usepackage[default]{lato}
\usepackage[T1]{fontenc}
\usepackage{textcomp}
\usepackage{fontawesome}
\usepackage{enumitem}
\usepackage{hyperref}
\DeclareFontFamily{U}{fontawesomeOne}{}
\DeclareFontShape{U}{fontawesomeOne}{m}{n}
{<-> FontAwesome--fontawesomeone}{}
\DeclareRobustCommand\FAone{\fontencoding{U}\fontfamily{fontawesomeOne}\selectfont}
\pagestyle{empty}
\setlength{\tabcolsep}{0em}

% indentsection style, used for sections that aren't already in lists
% that need indentation to the level of all text in the document
\newenvironment{indentsection}[1]%
{\begin{list}{}%
{\setlength{\leftmargin}{#1}}%
\item[]
}
{\end{list}}

% opposite of above; bump a section back toward the left margin
\newenvironment{unindentsection}[1]%
{\begin{list}{}%
{\setlength{\leftmargin}{-0.5#1}}%
\item[]%
}
{\end{list}}

% format two pieces of text, one left aligned and one right aligned
\newcommand{\headerrow}[2]
{\begin{tabular*}{\linewidth}{l@{\extracolsep{\fill}}r}
#1 &
#2 \\
\end{tabular*}}

% make "C++" look pretty when used in text by touching up the plus signs
\newcommand{\CPP}
{C\nolinebreak[4]\hspace{-.05em}\raisebox{.22ex}{\footnotesize\bf ++}}

% and the actual content starts here
\begin{document}

\begin{center}
{\LARGE \textbf{ {{$vars->contactInfo->name}} }}\\
%Seattle, Washington
\vspace{0.05cm}
\\
@php($useHfill = false)
@if($vars->contactInfo->phoneNumber)
\raisebox{-0.2\height} {\Large \faPhoneSquare} \ \  {{$vars->contactInfo->phoneNumber}}
@php($useHfill = true)
@endif
@if($vars->contactInfo->email)
    @if($useHfill)
        \hfill
    @endif
    \raisebox{-0.2\height}{\Large \faEnvelopeSquare} \ \ {{$vars->contactInfo->email}}
@php($useHfill = true)
@endif
@if($vars->contactInfo->githubUsername)
    @if($useHfill)
        \hfill
    @endif
    \raisebox{-0.2\height}{\Large \faGithubSquare} \ \ \href{https://github.com/<?= $vars->contactInfo->githubUsername ?>}{<?= $vars->contactInfo->githubUsername ?>}
@php($useHfill = true)
@endif
@if($vars->contactInfo->linkedinUsername)
    @if($useHfill)
        \hfill
    @endif
    \raisebox{-0.2\height}{\Large \faLinkedinSquare} \ \ \href{https://linkedin.com/in/<?= $vars->contactInfo->linkedinUsername ?>}{<?= $vars->contactInfo->linkedinUsername ?>}
@php($useHfill = true)
@endif
\end{center}

{!! $sectionsRenderer->renderSectionsInOrder($vars) !!}

\end{document}