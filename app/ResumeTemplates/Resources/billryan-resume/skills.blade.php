@if(!empty($vars->skills))
    \section{\faCogs\ Skills}
    \begin{itemize}[parsep=0.5ex]
    @foreach($vars->skills as $skill)
        \item <?= $skill->getNameEscaped() ?>: <?= $skill->getDescriptionEscaped() ?>
    @endforeach
    \end{itemize}
@endif