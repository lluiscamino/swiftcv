\section{Skills \& Interests}
%===========================%
\begin{description}[itemsep=0pt]
@foreach($vars->skills as $skill)
    \item[{{ $skill->getNameEscaped() }}] {{ $skill->getDescriptionEscaped() }}
@endforeach
\end{description}