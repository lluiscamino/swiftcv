%---------------------------------------------------------------------------------------
%	EXPERIENCE
%----------------------------------------------------------------------------------------
\cvsection{Experience}

@foreach($vars->workExperiences as $workExperience)
    \cvevent{<?= $workExperience->dateRange ?>}{<?= $workExperience->getJobTitleEscaped() ?>}{<?= $workExperience->getCompanyEscaped() ?>}{<?= join(',', array_map(fn(string $line) => '{' . $line . '}', $workExperience->getDescriptionEscaped())) ?>}
@endforeach