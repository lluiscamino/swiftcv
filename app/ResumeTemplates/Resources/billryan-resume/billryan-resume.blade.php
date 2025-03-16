@php use App\ResumeTemplates\Utils\SectionsRenderer;use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
@php $sectionsRenderer = SectionsRenderer::createWithDefaultPaths('billryan-resume'); @endphp
% !TEX program = xelatex

\documentclass{billryan-resume}
%\usepackage{zh_CN-Adobefonts_external} % Simplified Chinese Support using external fonts (./fonts/zh_CN-Adobe/)
%\usepackage{zh_CN-Adobefonts_internal} % Simplified Chinese Support using system fonts

\begin{document}
\pagenumbering{gobble} % suppress displaying page number

\name{<?= $vars->contactInfo->getNameEscaped()?>}

\basicInfo{
@if($vars->contactInfo->email)
    \email{<?= $vars->contactInfo->email?>}
@endif
@if($vars->contactInfo->phoneNumber)
    \textperiodcentered\ \phone{<?= $vars->contactInfo->phoneNumber?>}
@endif
@if($vars->contactInfo->website)
    \textperiodcentered\ \homepage{<?= $vars->contactInfo->website?>}
@endif
@if($vars->contactInfo->linkedinUsername)
    \textperiodcentered\ \linkedin[<?= $vars->contactInfo->linkedinUsername?>]{https://www.linkedin.com/in/<?= $vars->contactInfo->linkedinUsername?>}
@endif
@if($vars->contactInfo->githubUsername)
    \textperiodcentered\ \github[<?= $vars->contactInfo->githubUsername?>]{https://github.com/<?= $vars->contactInfo->linkedinUsername?>}
@endif
}

{!! $sectionsRenderer->renderSectionsInOrder($vars) !!}

% \section{\faHeartO\ Honors and Awards}
% \datedline{\textit{\nth{1} Prize}, Award on xxx }{Jun. 2013}
% \datedline{Other awards}{2015}

% \section{\faInfo\ Miscellaneous}
% \begin{itemize}[parsep=0.5ex]
% \item Blog: http://your.blog.me
% \item GitHub: https://github.com/username
% \item Languages: English - Fluent, Mandarin - Native speaker
% \end{itemize}

%% Reference
%\newpage
%\bibliographystyle{IEEETran}
%\bibliography{mycite}
\end{document}