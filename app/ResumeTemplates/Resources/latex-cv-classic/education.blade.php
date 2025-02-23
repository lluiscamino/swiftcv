%---------------------------------------------------------------------------------------
%	EDUCATION SECTION
%--------------------------------------------------------------------------------------
\cvsection{Education}

@foreach($vars->educationExperiences as $educationExperience)
    \cvevent{<?= $educationExperience->dateRange ?>}{<?= $educationExperience->getDegreeEscaped() ?>}{<?= $educationExperience->getUniversityEscaped() ?>}{<?= join(',', array_map(fn(string $line) => '{' . $line . '}', $educationExperience->getDescriptionEscaped())) ?>}
@endforeach