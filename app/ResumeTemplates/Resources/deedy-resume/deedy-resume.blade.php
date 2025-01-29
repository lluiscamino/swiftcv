@php use App\ResumeTemplates\Utils\SectionsRenderer;use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
@php $sectionsRenderer = SectionsRenderer::createWithDefaultPaths('deedy-resume'); @endphp
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
% Deedy - One Page Two Column Resume
% LaTeX Template
% Version 1.2 (16/9/2014)
%
% Original author:
% Debarghya Das (http://debarghyadas.com)
%
% Original repository:
% https://github.com/deedydas/Deedy-Resume
%
% IMPORTANT: THIS TEMPLATE NEEDS TO BE COMPILED WITH XeLaTeX
%
% This template uses several fonts not included with Windows/Linux by
% default. If you get compilation errors saying a font is missing, find the line
% on which the font is used and either change it to a font included with your
% operating system or comment the line out to use the default font.
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% TODO:
% 1. Integrate biber/bibtex for article citation under publications.
% 2. Figure out a smoother way for the document to flow onto the next page.
% 3. Add styling information for a "Projects/Hacks" section.
% 4. Add location/address information
% 5. Merge OpenFont and MacFonts as a single sty with options.
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% CHANGELOG:
% v1.1:
% 1. Fixed several compilation bugs with \renewcommand
% 2. Got Open-source fonts (Windows/Linux support)
% 3. Added Last Updated
% 4. Move Title styling into .sty
% 5. Commented .sty file.
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Known Issues:
% 1. Overflows onto second page if any column's contents are more than the
% vertical limit
% 2. Hacky space on the first bullet point on the second column.
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


\documentclass[]{deedy-resume}
\usepackage{fancyhdr}

\pagestyle{fancy}
\fancyhf{}

\rfoot{Page \thepage \hspace{1pt}}
\begin{document}

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
%     LAST UPDATED DATE
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
\lastupdated

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
%     TITLE NAME
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
\namesection{<?= $vars->contactInfo->name ?>}{}{ \urlstyle{same}\href{<?= $vars->contactInfo->website ?>}{<?= $vars->contactInfo->website ?>}\\
@if($vars->contactInfo->email)
\href{mailto:<?= $vars->contactInfo->email ?>}{<?= $vars->contactInfo->email ?>} |
@endif
@if($vars->contactInfo->phoneNumber)
\href{tel:<?= $vars->contactInfo->phoneNumber ?>}{<?= $vars->contactInfo->phoneNumber ?>}
@endif
}

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
%     COLUMN ONE
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\begin{minipage}[t]{0.33\textwidth}

{!! $sectionsRenderer->renderLeftSideSectionsInOrder($vars) !!}

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     LINKS
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

%\section{Links}
%Facebook:// \href{https://facebook/dd}{\bf dd} \\
%Github:// \href{https://github.com/deedydas}{\bf deedydas} \\
%LinkedIn://  \href{https://www.linkedin.com/in/debarghyadas}{\bf debarghyadas} \\
%YouTube://  \href{https://www.youtube.com/user/DeedyDash007}{\bf DeedyDash007} \\
%Twitter://  \href{https://twitter.com/debarghya_das}{\bf @debarghya\_das} \\
%Quora://  \href{https://www.quora.com/Debarghya-Das}{\bf Debarghya-Das}

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
%     COLUMN TWO
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

\end{minipage}
\hfill
\begin{minipage}[t]{0.66\textwidth}

{!! $sectionsRenderer->renderRightSideSectionsInOrder($vars) !!}

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%     AWARDS
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

%\section{Awards}
%\begin{tabular}{rll}
%2014         & top 52/2500  & KPCB Engineering Fellow\\
%2014         & 1\textsuperscript{st}/50  & Microsoft Coding Competition, Cornell\\
%2013         & National  & Jump Trading Challenge Finalist\\
%2013     & 7\textsuperscript{th}/120 & CS 3410 Cache Race Bot Tournament  \\
%2012     & 2\textsuperscript{nd}/150 & CS 3110 Biannual Intra-Class Bot Tournament \\
%2011     & National & Indian National Mathematics Olympiad (INMO) Finalist \\
%\end{tabular}
%\sectionsep

\end{minipage}
\end{document}  \documentclass[]{article}