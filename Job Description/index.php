<?php
$conn = new mysqli("localhost", "root", "", "jobsearch_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$company_name = 'Apple';

$cmp_query = "SELECT * FROM company_profile WHERE cmp_name = '$company_name'";
$cmp_result = $conn->query($cmp_query);
$company = $cmp_result->fetch_assoc();

$sql = "SELECT * FROM job_offers WHERE cmp_name = '$company_name' LIMIT 1";
$result = $conn->query($sql);
$job = $result->fetch_assoc();

$company_name_lower = strtolower(explode(' ', $company['cmp_name'])[0]);
$logo_path = "assets/logos/" . $company_name_lower . ".png";
$banner_path = "assets/banners/" . $company_name_lower . ".jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $company['cmp_name'] ?> | Job Description</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <div class="left">
      <h1>JobSearch</h1>
    </div>
    <nav>
      <a href="#">Find job</a>
      <a href="#">Messages</a>
      <a href="#">Hiring</a>
      <a href="#">Community</a>
      <a href="#">FAQ</a>
    </nav>
    <div class="right">
      <p class="location">Mumbai, BOM</p>
      <i class="ri-notification-2-line"></i>
      <i class="ri-user-3-line"></i>
    </div>
  </header>

  <div class="job-container">
    <img src="<?= $banner_path ?>" alt="Company Banner" class="banner">

    <div class="job-top">
      <div class="company-info">
        <img src="<?= $logo_path ?>" alt="Company Logo" class="logo">
        <div>
          <h2 class="job-title"><?= $job['job_name'] ?></h2>
          <p class="company-name"><?= $company['cmp_name'] ?></p>
          <p class="date">Posted on <?= date("d M Y", strtotime($job['posted_date'])) ?></p>
        </div>
      </div>
      <button class="apply-btn">Apply</button>
    </div>

    <div class="job-meta">
      <p><i class="ri-user-3-line"></i><?= $job['work_type'] ?></p>
      <p><i class="ri-time-line"></i><?= $job['job_type'] ?></p>
      <p><i class="ri-map-pin-line"></i><?= $job['location'] ?></p>
      <p><i class="ri-money-dollar-circle-line"></i>$<?= number_format($job['salary'], 0) ?>/hr</p>
      <p><i class="ri-briefcase-line"></i><?= $job['exp_yrs'] ?></p>
    </div>

    <div class="job-tabs">
      <div class="tab active" onclick="showTab('description')">Job Description</div>
      <div class="tab" onclick="showTab('details')">Job Details</div>
    </div>

    <div id="description" class="tab-content active">
      <h3>About the role</h3>
      <p>
        As a <?= strtolower($job['job_name']) ?> at <?= $company['cmp_name'] ?>,
        you’ll collaborate with cross-functional teams to design innovative experiences
        that delight millions of users worldwide. You’ll work closely with developers and
        stakeholders to bring your ideas to life.
      </p>

      <h3>Responsibilities</h3>
      <ul>
        <li>Design user-centric interfaces and interactions.</li>
        <li>Collaborate with product teams to define features.</li>
        <li>Maintain design systems and style guides.</li>
        <li>Ensure pixel-perfect execution of UI designs.</li>
      </ul>
    </div>

    <div id="details" class="tab-content">
      <h3>Company Information</h3>
      <ul>
        <li><strong>Industry:</strong> <?= $company['industry'] ?></li>
        <li><strong>Company Size:</strong> <?= $company['cmp_size'] ?> employees</li>
        <li><strong>Headquarters:</strong> <?= $company['headquarters'] ?></li>
      </ul>

      <h3>Work Details</h3>
      <ul>
        <li><strong>Job Type:</strong> <?= $job['job_type'] ?></li>
        <li><strong>Work Type:</strong> <?= $job['work_type'] ?></li>
        <li><strong>Experience Level:</strong> <?= $job['exp_yrs'] ?></li>
        <li><strong>Location:</strong> <?= $job['location'] ?></li>
        <li><strong>Salary:</strong> $<?= number_format($job['salary'], 0) ?>/hr</li>
      </ul>
    </div>
  </div>

  <script>
    function showTab(tab) {
      document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
      document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
      document.querySelector(`.tab[onclick="showTab('${tab}')"]`).classList.add('active');
      document.getElementById(tab).classList.add('active');
    }
  </script>

</body>
</html>