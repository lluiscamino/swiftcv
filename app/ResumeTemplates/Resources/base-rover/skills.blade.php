\section{Skills \& Interests}
%===========================%
\begin{description}[itemsep=0pt]
@foreach($vars->skills as $skill)
    \item[{{ $skill->name }}] {{ $skill->description }}
@endforeach
\end{description}