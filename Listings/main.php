<?php
require_once 'config.php';

$username = $_SESSION['username'];
$salary_min_input = $_GET['salary_min'] ?? '';
$salary_max_input = $_GET['salary_max'] ?? '';

if ($salary_min_input === '') {
    $min_value = 0;
} else {
    $min_value = filter_var($salary_min_input, FILTER_VALIDATE_FLOAT) !== false ? (float)$salary_min_input : 0;
}

if ($salary_max_input === '') {
    $max_value = 9999999;
} else {
    $max_value = filter_var($salary_max_input, FILTER_VALIDATE_FLOAT) !== false ? (float)$salary_max_input : 9999999;
}


$filters = [
    'keyword' => trim($_GET['keyword'] ?? ''),
    'location' => trim($_GET['location'] ?? ''),
    'experience' => $_GET['experience'] ?? '',
    
    'salary_min' => $min_value,
    'salary_max' => $max_value,
    
    'work_schedule' => $_GET['work_schedule'] ?? [],
    'employment_type' => $_GET['employment_type'] ?? [],
];

$filters['work_schedule'] = is_array($filters['work_schedule']) ? $filters['work_schedule'] : [];
$filters['employment_type'] = is_array($filters['employment_type']) ? $filters['employment_type'] : [];


$is_filtered = false;
foreach ($_GET as $key => $value) {
    if (!is_array($value)) {
        $trimmed_value = trim($value);
    } else {
        if(empty($value)) continue;
        $trimmed_value = $value;
    }
    
    if (!empty($trimmed_value) && $key !== 'salary_max' && $key !== 'salary_min') {
        $is_filtered = true;
        break;
    }
}
if ($filters['salary_min'] > 0 || ($filters['salary_max'] < 9999999 && $filters['salary_max'] > 0)) {
    $is_filtered = true;
} 
if (!empty($filters['work_schedule']) || !empty($filters['employment_type'])) {
    $is_filtered = true;
}


$jobs = get_all_jobs($pdo, $filters);

$job_count = count($jobs);

function is_checked($value, $array) {
    return in_array($value, $array) ? 'checked' : '';
}

function is_selected($option, $current_value) {
    return $option === $current_value ? 'selected' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSearch</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <span class="lucky-text">Job</span><span class="job-text">Search</span>
        </div>
        <nav class="nav-links">
            <a href="#">Find job</a>
            <a href="#">Messages</a>
            <a href="#">Hiring</a>
            <a href="#">Community</a>
            <a href="#">FAQ</a>
        </nav>
        <div class="user-area">
            <span class="location">Mumbai, BOM</span>
            <div class="notification-icon">🔔</div>
            <a href = "..\\applicant\\profile.php"><div class="user-avatar"></div></a>
            <div class="settings-icon">⚙️</div>
        </div>
    </header>

    <div class="search-bar-container">
        <div class="search-input-group">
            <input type="text" name="keyword" placeholder="Job title, company, or keyword" class="search-input" form="filterForm" value="<?php echo htmlspecialchars($filters['keyword']); ?>">
        </div>
        <div class="search-input-group">
            <input type="text" name="location" placeholder="Work location" class="search-input" form="filterForm" value="<?php echo htmlspecialchars($filters['location']); ?>">
        </div>
    </div>

    <main class="main-content">
        <aside class="sidebar">
            <div class="learn-more-box">
                <h3>Get Your best profession with JobSearch</h3>
                <button class="learn-more-btn">Learn more</button>
            </div>

            <form id="filterForm" method="GET" action="main.php" class="filters">
                <h3>Filters</h3>

                <div class="filter-group">
                    <h4>Experience</h4>
                    <select name="experience" class="filter-select">
                        <option value="">All Experience Levels</option>
                        <option value="Junior level" <?php echo is_selected('Junior level', $filters['experience']); ?>>Junior level</option>
                        <option value="Middle level" <?php echo is_selected('Middle level', $filters['experience']); ?>>Middle level</option>
                        <option value="Senior level" <?php echo is_selected('Senior level', $filters['experience']); ?>>Senior level</option>
                        <option value="Lead/Manager" <?php echo is_selected('Lead/Manager', $filters['experience']); ?>>Lead/Manager</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <h4>Salary Range ($)</h4>
                    <div class="salary-range-inputs">
                        <input type="number" name="salary_min" placeholder="Min (150)" class="salary-input min-salary" 
                               value="<?php echo $min_value > 0 || (isset($_GET['salary_min']) && $salary_min_input !== '') ? htmlspecialchars($salary_min_input) : ''; ?>">
                        <span class="range-separator">-</span>
                        <input type="number" name="salary_max" placeholder="Max (2000)" class="salary-input max-salary" 
                               value="<?php echo $max_value < 9999999 ? htmlspecialchars($salary_max_input) : ''; ?>">
                    </div>
                </div>
                

                <div class="filter-group">
                    <h4>Working schedule</h4>
                    <label><input type="checkbox" name="work_schedule[]" value="Full time" <?php echo is_checked('Full time', $filters['work_schedule']); ?>> Full time</label>
                    <label><input type="checkbox" name="work_schedule[]" value="Part time" <?php echo is_checked('Part time', $filters['work_schedule']); ?>> Part time</label>
                    <label><input type="checkbox" name="work_schedule[]" value="Internship" <?php echo is_checked('Internship', $filters['work_schedule']); ?>> Internship</label>
                    <label><input type="checkbox" name="work_schedule[]" value="Project work" <?php echo is_checked('Project work', $filters['work_schedule']); ?>> Project work</label>
                    <label><input type="checkbox" name="work_schedule[]" value="Volunteering" <?php echo is_checked('Volunteering', $filters['work_schedule']); ?>> Volunteering</label>
                </div>

                <div class="filter-group">
                    <h4>Employment type</h4>
                    <label><input type="checkbox" name="employment_type[]" value="Full day" <?php echo is_checked('Full day', $filters['employment_type']); ?>> Full day</label>
                    <label><input type="checkbox" name="employment_type[]" value="Flexible schedule" <?php echo is_checked('Flexible schedule', $filters['employment_type']); ?>> Flexible schedule</label>
                    <label><input type="checkbox" name="employment_type[]" value="Shift work" <?php echo is_checked('Shift work', $filters['employment_type']); ?>> Shift work</label>
                    <label><input type="checkbox" name="employment_type[]" value="Distant" <?php echo is_checked('Distant', $filters['employment_type']); ?>> Distant work</label>
                    <label><input type="checkbox" name="employment_type[]" value="Shift method" <?php echo is_checked('Shift method', $filters['employment_type']); ?>> Shift method</label>
                </div>
                
                <button type="submit" class="apply-filter-btn">Apply Filter</button>
            </form>
            
            <?php if ($is_filtered): ?>
            <a href="main.php" class="clear-filters-btn">Clear Filters</a>
            <?php endif; ?>

            </aside>

        <section class="job-listings">
            <div class="listings-header">
                <h2>Recommended jobs</h2>
                <span class="job-count"><?php echo $job_count; ?></span>
                <div class="sort-options">
                    <span class="sort-label">Sort by:</span>
                    <span class="sort-value">Last updated</span>
                    <span class="sort-icon">⇅</span>
                </div>
            </div>

            <div class="job-grid">
                <?php
                if (!empty($jobs)) {
                    foreach ($jobs as $job) {
                        echo '<div class="job-card ' . htmlspecialchars($job['color']) . '">';
                        echo '  <div class="job-header">';
                        echo '      <span class="job-date">' . htmlspecialchars($job['date']) . '</span>';
                        echo '      <span class="bookmark-icon">☐</span>';
                        echo '  </div>';
                        echo '  <div class="job-details">';
                        echo '      <div class="company-logo-large"><img style = "height:50px ;border-radius:25px" src = "..\\cmp_logos\\'.$job['company'].'\\logo.jpeg"></div>';
                        echo '      <div class="job-info">';
                        echo '          <p class="company-name">' . htmlspecialchars($job['company']) . '</p>';
                        echo '          <h3 class="job-title-card">' . htmlspecialchars($job['title']) . '</h3>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '  <div class="job-tags">';
                        foreach ($job['tags'] as $tag) {
                            echo '<span class="tag">' . htmlspecialchars(trim($tag)) . '</span>';
                        }
                        echo '  </div>';
                        echo '  <div class="job-footer">';
                        echo '      <span class="job-salary">' . htmlspecialchars($job['salary']) . '</span>';
                        echo '      <span class="job-location">' . htmlspecialchars($job['location']) . '</span>';
                        echo '      <a href="#" class="details-btn">Details</a>';
                        echo '  </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="grid-column: 1 / -1; text-align: center; padding: 50px;">No job listings found matching your criteria.</p>';
                }
                ?>
            </div>
        </section>
    </main>

</body>
</html>