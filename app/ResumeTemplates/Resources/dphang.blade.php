@php use App\ResumeTemplates\Variables\ResumeVariables; @endphp
@php /** @var ResumeVariables $vars */ @endphp
\documentclass[11pt,letterpaper]{article}
\usepackage[letterpaper,margin=0.5in]{geometry}
\usepackage[utf8]{inputenc}
\usepackage{mdwlist}
\usepackage[default]{lato}
\usepackage[T1]{fontenc}
\usepackage{textcomp}
\usepackage{fontawesome}
\usepackage{enumitem}
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
{\LARGE \textbf{ {{$vars->name}} }}\\
Seattle, Washington
\vspace{0.05cm}
\\
\raisebox{-0.2\height} {\Large \faPhoneSquare} \ \  {{$vars->phoneNumber}} \hfill\raisebox{-0.2\height}{\Large \faEnvelopeSquare} \ \ {{$vars->email}} \hfill \raisebox{-0.2\height}{\Large \faGithubSquare} \ \ github.com/{{$vars->githubUsername}} \hfill \raisebox{-0.2\height}{\Large \faLinkedinSquare} \ \ linkedin.com/in/{{$vars->linkedinUsername}}
\end{center}

\hrule
\vspace{-1em}
\subsection*{\Large Experience}

\renewcommand\labelitemi{}
\renewcommand\labelitemii{$\bullet$}
\begin{itemize}[leftmargin=1em]
\parskip=0.1em

@foreach($vars->workExperiences as $workExperience)
    \item
    \headerrow
    {\textbf{ {{ $workExperience->company }} }}
    {\textbf{ {{$workExperience->location}} }}
    \headerrow
    {\emph{ {{$workExperience->jobTitle}} }}
    {\emph{ {{$workExperience->startDate->format('M Y')}} -- {{$workExperience->endDate?->format('M Y') ?? 'Present'}} }}
    \begin{itemize*}
    @foreach($workExperience->description as $line)
        \item {{$line}}
    @endforeach
    \end{itemize*}
@endforeach

\end{itemize}

\hrule
\vspace{-1em}
\subsection*{\Large Skills}

\hyphenpenalty=1000
\begin{itemize}[leftmargin=1em,noitemsep]

@foreach($vars->skills as $skill)
    \item \textbf{ {{ $skill->name }}: }
    {{ $skill->description }}
@endforeach

\end{itemize}

\hrule
\vspace{-1em}
\subsection*{\Large Education}

\begin{itemize}[leftmargin=1em]
\parskip=0.1em

@foreach($vars->educationExperiences as $educationExperience)
    \item
    \headerrow
    {\textbf{ {{$educationExperience->university}} }}
    {\textbf{Bethlehem, PA}}
    \headerrow
    {\emph{ {{$educationExperience->degree}} } (\textbf{GPA:} 3.96/4.00)}
    {\emph{ {{$educationExperience->startDate->format('M Y')}} -- {{$educationExperience->endDate?->format('M Y') ?? 'Present'}} }}
@endforeach

\end{itemize}

\hrule
\vspace{-1em}
\subsection*{\Large Projects}

\renewcommand\labelitemi{}
\renewcommand\labelitemii{$\bullet$}
\begin{itemize}[leftmargin=1em]
\parskip=0.1em

@foreach($vars->projects as $project)
    \item
    \headerrow
    {\textbf{ {{ $project->name }} }}
    {\emph{ {{$project->startDate->format('M Y')}} -- {{$project->endDate?->format('M Y') ?? 'Present'}} }}
    \headerrow
    {\emph{ {{$project->link}} }}
    {\}}
    \begin{itemize*}
    @foreach($project->description as $line)
        \item {{$line}}
    @endforeach
    \end{itemize*}
@endforeach

\end{itemize}

\end{document}