<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');     
define('DB_PASSWORD', '');         
define('DB_NAME', 'job_search');

$pdo = null;
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect to the database. Please check your credentials and ensure MySQL is running. <br>Details: " . $e->getMessage());
}

function get_all_jobs($pdo, $filters = []) {
    $jobs = [];
    $where_clauses = [];
    $params = [];
    
    $sql_base = "
        SELECT 
            jo.id, 
            cp.cmp_name AS company, 
            jo.job_name AS title, 
            jo.posted_date, 
            jo.salary, 
            jo.location, 
            jo.job_type, 
            jo.work_type,
            jo.exp_yrs,
            cp.cmp_logo  
        FROM 
            job_offers jo
        INNER JOIN 
            company_profile cp ON jo.cmp_id = cp.id
    ";

    if (!empty($filters['keyword'])) {
        $where_clauses[] = "(jo.job_name LIKE ? OR cp.cmp_name LIKE ?)";
        $params[] = '%' . $filters['keyword'] . '%';
        $params[] = '%' . $filters['keyword'] . '%';
    }
    if (!empty($filters['location'])) {
        $where_clauses[] = "jo.location LIKE ?";
        $params[] = '%' . $filters['location'] . '%';
    }
    if (!empty($filters['experience'])) {
        $where_clauses[] = "jo.exp_yrs = ?";
        $params[] = $filters['experience'];
    }
    
    if (isset($filters['salary_min']) && $filters['salary_min'] > 0) {
        $where_clauses[] = "jo.salary >= ?";
        $params[] = $filters['salary_min'];
    }
    
    if (isset($filters['salary_max']) && $filters['salary_max'] < 9999999) {
        $where_clauses[] = "jo.salary <= ?";
        $params[] = $filters['salary_max'];
    }
    
    if (!empty($filters['work_schedule'])) {
        $clean_schedule = array_filter($filters['work_schedule'], 'trim');
        if (!empty($clean_schedule)) {
            $placeholders = implode(', ', array_fill(0, count($clean_schedule), '?'));
            $where_clauses[] = "jo.job_type IN ($placeholders)";
            $params = array_merge($params, $clean_schedule);
        }
    }

    if (!empty($filters['employment_type'])) {
        $clean_employment = array_filter($filters['employment_type'], 'trim');
        if (!empty($clean_employment)) {
            $placeholders = implode(', ', array_fill(0, count($clean_employment), '?'));
            $where_clauses[] = "jo.work_type IN ($placeholders)";
            $params = array_merge($params, $clean_employment);
        }
    }


    $sql = $sql_base;
    if (!empty($where_clauses)) {
        $sql .= " WHERE " . implode(' AND ', $where_clauses);
    }
    
    $sql .= " ORDER BY jo.posted_date DESC";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params); 
        $jobs_from_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $jobs = []; 
        $colors = ['soft-orange', 'soft-green', 'soft-purple', 'soft-pink'];
        $color_index = 0; 
        
        foreach ($jobs_from_db as $job) {
            $tags = [];
            if (!empty($job['job_type'])) $tags[] = $job['job_type'];
            if (!empty($job['work_type'])) $tags[] = $job['work_type'];
            if (!empty($job['exp_yrs'])) $tags[] = $job['exp_yrs'];

            $formatted_salary = '$' . number_format($job['salary'], 0); 
            $formatted_date = date('j M, Y', strtotime($job['posted_date']));
            
            $card_color = $colors[$color_index % count($colors)];
            $color_index++;

            $jobs[] = [
                'id'       => $job['id'],
                'company'  => $job['company'],
                'title'    => $job['title'],
                'date'     => $formatted_date,
                'salary'   => $formatted_salary,
                'location' => $job['location'],
                'tags'     => array_unique($tags), 
                'color'    => $card_color
            ];
        }

    } catch (PDOException $e) {
        error_log("SQL Error (Filtering): " . $e->getMessage());
        return [];
    }
    return $jobs;
}
?>