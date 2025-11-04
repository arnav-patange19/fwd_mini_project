<?php
try{
require_once "job_view_inc.php";
require_once "..\\includes\\db_inc.php";
$job_name = $_GET['name'];

$query = "SELECT * FROM job_offers WHERE job_name = :job_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":job_name",$job_name);

    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $requirements = explode("|",$results['requirements']);
    $responsibilities = explode("|",$results['responsibilities']);

    $pdo = null;
    $stmt = null;
}
catch(PDOException $e){
    die("Connection failed : ".$e->getMessage());
}

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
    <img src='<?php echo "..\\cmp_logos\\" . $results['cmp_name'] . "\\cover.jpeg"; ?>' alt="Company Banner" class="banner">

    <div class="job-top">
      <div class="company-info">
        <img src='<?php echo "..\\cmp_logos\\" . $results['cmp_name'] . "\\logo.jpeg"; ?>' alt="Company Logo" class="logo">
        <div>
          <h2 class="job-title"><?= $results['job_name'] ?></h2>
          <p class="company-name"><?= $results['cmp_name'] ?></p>
          <p class="date">Posted on <?= date("d M Y", strtotime($results['posted_date'])) ?></p>
        </div>
      </div>
      <button class="apply-btn">Apply</button>
    </div>

    <div class="job-meta">
      <p><i class="ri-user-3-line"></i><?= $results['work_type'] ?></p>
      <p><i class="ri-time-line"></i><?= $results['job_type'] ?></p>
      <p><i class="ri-map-pin-line"></i><?= $results['location'] ?></p>
      <p><i class="ri-money-dollar-circle-line"></i>$<?= number_format($results['salary'], 0) ?>/hr</p>
      <p><i class="ri-briefcase-line"></i><?= $results['exp_yrs'] ?></p>
    </div>

    <div class="job-tabs">
      <div class="tab active" onclick="showTab('description')">Job Description</div>
      <div class="tab" onclick="showTab('details')">Job Details</div>
    </div>

    <div id="description" class="tab-content active">
      <h3>About the role</h3>
      <p>
        <?php echo $results['about']; ?>
      </p><br><br>

      <h3>Responsibilities</h3>
      <?php
      echo "<ul>";
      foreach ($responsibilities as $responsible){
        echo "<li>".$responsible."</li>";
      }
      echo "</ul>";
      ?><br><br>

      <h3>Requirements</h3>
      <?php
      echo "<ul>";
      foreach ($requirements as $responsible){
        echo "<li>".$responsible."</li>";
      }
      echo "</ul>";
      ?>
      
    </div>

    <div id="details" class="tab-content">
      <!-- <h3>Company Information</h3>
      <ul>
        <li><strong>Industry:</strong> <?= $results['industry'] ?></li>
        <li><strong>Company Size:</strong> <?= $company['cmp_size'] ?> employees</li>
        <li><strong>Headquarters:</strong> <?= $company['headquarters'] ?></li>
      </ul> -->

      <h3>Work Details</h3>
      <ul>
        <li><strong>Job Type:</strong> <?= $results['job_type'] ?></li>
        <li><strong>Work Type:</strong> <?= $results['work_type'] ?></li>
        <li><strong>Experience Level:</strong> <?= $results['exp_yrs'] ?></li>
        <li><strong>Location:</strong> <?= $results['location'] ?></li>
        <li><strong>Salary:</strong> $<?= number_format($results['salary'], 0) ?>/hr</li>
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