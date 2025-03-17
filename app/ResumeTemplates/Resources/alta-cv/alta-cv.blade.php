@php use App\ResumeTemplates\Utils\SectionsRenderer;use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
@php $sectionsRenderer = SectionsRenderer::createWithDefaultPaths('alta-cv'); @endphp
%%%%%%%%%%%%%%%%%
% This is an sample CV template created using altacv.cls
% (v1.7.2, 28 August 2024) written by LianTze Lim (liantze@gmail.com). Compiles with pdfLaTeX, XeLaTeX and LuaLaTeX.
%
%% It may be distributed and/or modified under the
%% conditions of the LaTeX Project Public License, either version 1.3
%% of this license or (at your option) any later version.
%% The latest version of this license is in
%%    http://www.latex-project.org/lppl.txt
%% and version 1.3 or later is part of all distributions of LaTeX
%% version 2003/12/01 or later.
%%%%%%%%%%%%%%%%

%% Use the "normalphoto" option if you want a normal photo instead of cropped to a circle
% \documentclass[10pt,a4paper,normalphoto]{alta-cv}

\documentclass[10pt,a4paper,ragged2e,withhyper]{alta-cv}
%% AltaCV uses the fontawesome5 and simpleicons packages.
%% See http://texdoc.net/pkg/fontawesome5 and http://texdoc.net/pkg/simpleicons for full list of symbols.

% Change the page layout if you need to
\geometry{left=1.25cm,right=1.25cm,top=1.5cm,bottom=1.5cm,columnsep=1.2cm}

% The paracol package lets you typeset columns of text in parallel
\usepackage{paracol}

% Change the font if you want to, depending on whether
% you're using pdflatex or xelatex/lualatex
% WHEN COMPILING WITH XELATEX PLEASE USE
% xelatex -shell-escape -output-driver="xdvipdfmx -z 0" sample.tex

\usepackage[rm]{roboto}
\usepackage[defaultsans]{lato}
\usepackage{sourcesanspro}
\renewcommand{\familydefault}{\sfdefault}

% Change the colours if you want to
\definecolor{SlateGrey}{HTML}{2E2E2E}
\definecolor{LightGrey}{HTML}{666666}
\definecolor{DarkPastelRed}{HTML}{450808}
\definecolor{PastelRed}{HTML}{8F0D0D}
\definecolor{GoldenEarth}{HTML}{E7D192}
\colorlet{name}{black}
\colorlet{tagline}{PastelRed}
\colorlet{heading}{DarkPastelRed}
\colorlet{headingrule}{GoldenEarth}
\colorlet{subheading}{PastelRed}
\colorlet{accent}{PastelRed}
\colorlet{emphasis}{SlateGrey}
\colorlet{body}{LightGrey}

% Change some fonts, if necessary
\renewcommand{\namefont}{\Huge\rmfamily\bfseries}
\renewcommand{\personalinfofont}{\footnotesize}
\renewcommand{\cvsectionfont}{\LARGE\rmfamily\bfseries}
\renewcommand{\cvsubsectionfont}{\large\bfseries}


% Change the bullets for itemize and rating marker
% for \cvskill if you want to
\renewcommand{\cvItemMarker}@{{\small\textbullet}}
\renewcommand{\cvRatingMarker}{\faCircle}
% ...and the markers for the date/location for \cvevent
% \renewcommand{\cvDateMarker}{\faCalendar*[regular]}
% \renewcommand{\cvLocationMarker}{\faMapMarker*}


% If your CV/résumé is in a language other than English,
% then you probably want to change these so that when you
% copy-paste from the PDF or run pdftotext, the location
% and date marker icons for \cvevent will paste as correct
% translations. For example Spanish:
% \renewcommand{\locationname}{Ubicación}
% \renewcommand{\datename}{Fecha}


%% Use (and optionally edit if necessary) this .tex if you
%% want to use an author-year reference style like APA(6)
%% for your publication list
% \input{pubs-authoryear.tex}

%% Use (and optionally edit if necessary) this .tex if you
%% want an originally numerical reference style like IEEE
%% for your publication list
%\input{pubs-num.tex}

%% sample.bib contains your publications
%\addbibresource{sample.bib}
% \usepackage{academicons}\let\faOrcid\aiOrcid
\begin{document}
\name{<?= $vars->contactInfo->getNameEscaped() ?>}
%\tagline{Your Position or Tagline Here}
%% You can add multiple photos on the left or right
\photoR{2.8cm}{Globe_High}
% \photoL{2.5cm}{Yacht_High,Suitcase_High}

\personalinfo{%
% Not all of these are required!
@if($vars->contactInfo->email)
    \email{<?= $vars->contactInfo->email ?>}
@endif
@if($vars->contactInfo->phoneNumber)
    \phone{<?= $vars->contactInfo->phoneNumber ?>}
@endif
@if($vars->contactInfo->website)
    \homepage{<?= $vars->contactInfo->website ?>}
@endif
@if($vars->contactInfo->linkedinUsername)
    \linkedin{<?= $vars->contactInfo->linkedinUsername ?>}
@endif
@if($vars->contactInfo->githubUsername)
    \github{<?= $vars->contactInfo->githubUsername ?>}
@endif
% \mailaddress{Åddrésş, Street, 00000 Cóuntry}
% \location{Location, COUNTRY}
% \twitter{@twitterhandle}
% \xtwitter{@x-handle}
%% You can add your own arbitrary detail with
%% \printinfo{symbol}{detail}[optional hyperlink prefix]
% \printinfo{\faPaw}{Hey ho!}[https://example.com/]

%% Or you can declare your own field with
%% \NewInfoFiled{fieldname}{symbol}[optional hyperlink prefix] and use it:
% \NewInfoField{gitlab}{\faGitlab}[https://gitlab.com/]
% \gitlab{your_id}
%%
%% For services and platforms like Mastodon where there isn't a
%% straightforward relation between the user ID/nickname and the hyperlink,
%% you can use \printinfo directly e.g.
% \printinfo{\faMastodon}{@username@instace}[https://instance.url/@username]
%% But if you absolutely want to create new dedicated info fields for
%% such platforms, then use \NewInfoField* with a star:
% \NewInfoField*{mastodon}{\faMastodon}
%% then you can use \mastodon, with TWO arguments where the 2nd argument is
%% the full hyperlink.
% \mastodon{@username@instance}{https://instance.url/@username}
}

\makecvheader
%% Depending on your tastes, you may want to make fonts of itemize environments slightly smaller
% \AtBeginEnvironment{itemize}{\small}

%% Set the left/right column width ratio to 6:4.
\columnratio{0.6}

% Start a 2-column paracol. Both the left and right columns will automatically
% break across pages if things get too long.
\begin{paracol}{2}

{!! $sectionsRenderer->renderPrimarySectionsInOrder($vars) !!}

\medskip

\switchcolumn

{!! $sectionsRenderer->renderSecondarySectionsInOrder($vars) !!}

\end{paracol}


\end{document}
