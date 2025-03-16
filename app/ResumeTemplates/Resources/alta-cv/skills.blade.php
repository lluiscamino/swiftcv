@if(!empty($vars->skills))
    \cvsection{Skills}
@endif

{\LaTeXraggedright
@foreach($vars->skills as $skill)
    \cvachievement{\faStar}{<?= $skill->getNameEscaped() ?>}{<?= $skill->getDescriptionEscaped() ?>}
@endforeach
\par}