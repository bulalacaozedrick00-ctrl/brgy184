<section class="content">

  <div class="container-fluid">
    <?php

    $mydb->setQuery("SELECT COUNT(tblresidents.RESID) as 'RESID',(SELECT SUM(tblresidents.GENDER = 'Male') FROM `tblresidents` WHERE BARANGAYID = '".$_SESSION['BARANGAYID']."') as 'MALE', (SELECT SUM(tblresidents.GENDER = 'Female') FROM `tblresidents` WHERE BARANGAYID = '".$_SESSION['BARANGAYID']."') as 'FEMALE',(SELECT SUM(tblresidents.IS_REGISTERED_VOTER = 1) FROM `tblresidents` WHERE BARANGAYID = '".$_SESSION['BARANGAYID']."') as 'REGISTERED_VOTERS', (SELECT SUM(tblresidents.IS_REGISTERED_VOTER = 0) FROM `tblresidents` WHERE BARANGAYID = '".$_SESSION['BARANGAYID']."') as 'UNREGISTERED_VOTERS', SUM(tblresidents.IS_PWD) as 'PWD', SUM(tblresidents.IS_4PS_REC) as 'PS', SUM(tblresidents.IS_SENIOR) as 'SENIOR', SUM(tblresidents.IS_SINGLE_PARENT) as 'SINGLE_PARENT', SUM(tblresidents.IS_HOUSING_PROJ_REC) as 'HOUSING_PROJECT_RECIPIENT', SUM(tblresidents.IS_GOV_PROG_REC) as 'GOVERNMENT_PROJECT_RECIPIENT' FROM `tblresidents` WHERE BARANGAYID = '".$_SESSION['BARANGAYID']."'");
    $residents_summary = $mydb->loadSingleResult();

    function getRandomColor()
    {
      $colors = [
        "#f97316",
        "#ef4444",
        "#f59e0b",
        "#eab308",
        "#84cc16",
        "#22c55e",
        "#10b981",
        "#14b8a6",
        "#06b6d4",
        "#0ea5e9",
        "#3b82f6",
        "#6366f1",
        "#8b5cf6",
        "#a855f7",
        "#d946ef",
        "#ec4899",
        "#f43f5e",
      ];

      $key = array_rand($colors, 1);

      return $colors[$key];
    }
    $admin_dashboard_cards = [

      [
        "icon" => "fa fa-users",
        "title" => "Population",
        "subtitle" => "Total Population",
        "value" => $residents_summary->RESID ? number_format($residents_summary->RESID) : 0,
      ],
      [
        "icon" => "fa fa-user",
        "title" => "4Ps Members",
        "subtitle" => "4Ps Members",
        "value" => $residents_summary->PS ? number_format($residents_summary->PS) : 0,
      ],
      [
        "icon" => "fa fa-user",
        "title" => "Single Parents",
        "subtitle" => "Single Parents",
        "value" => $residents_summary->SINGLE_PARENT ? number_format($residents_summary->SINGLE_PARENT) : 0,
      ],
      [
        "icon" => "fa fa-user",
        "title" => "Senior Members",
        "subtitle" => "Senior Members",
        "value" => $residents_summary->SENIOR ? number_format($residents_summary->SENIOR) : 0,
      ],
    ];
    ?>
    <div class="row">
      <?php foreach ($admin_dashboard_cards as $row): ?>

        <div class="col-lg-3 col-6">
          <div class="small-box" style="background-color: <?= getRandomColor() ?>; color: #fff">
            <div class="inner">
              <h3><?= $row["value"] ?></h3>

              <p><?= $row["title"] ?></p>
            </div>
            <div class="icon">
              <i class="<?= $row["icon"] ?>"></i>
            </div>
            
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<h2>Charts</h2>
<br>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
           <h3 class="card-title"><i class="fa fa-venus-double"></i> Sex</h3>            
         </div>
         <div class="card-body">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-3">

      <div class="card card-primary">
        <div class="card-header">
         <h3 class="card-title"><i class="fas fa-fingerprint"></i> Voters & Non Voters</h3>              
       </div>
       <div class="card-body">
        <canvas id="donutChart_voters" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card card-primary">
      <div class="card-header">
       <h3 class="card-title"><i class="fas fa-syringe"></i> Vaccinated & Non Vaccinated</h3>
     </div>
     <div class="card-body">
      <canvas id="donutChart_vax" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
  </div>
</div>


<div class="col-md-3">
  <div class="card card-primary">
    <div class="card-header">
       <h3 class="card-title"><i class="fas fa-house-user"></i> Renter & Non Renter</h3>
    </div>
    <div class="card-body">
      <canvas id="donutChart_sr" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="card card-primary">
    <div class="card-header">
       <h3 class="card-title"><i class="fas fa-chart-line"></i> Age</h3>
    </div>
    <div class="card-body">
     <canvas id="barChart_age" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

    </div>
  </div>
</div>

</div>
</div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$mydb->setQuery("SELECT COUNT(CASE WHEN GENDER = 'Female' THEN 1 END) AS female_count, 
 COUNT(CASE WHEN GENDER = 'Male' THEN 1 END) AS male_count, 
 COUNT(*) AS total_count 
 FROM `tblresidents`;");
$residentStats = $mydb->loadSingleResult();
$femaleCount = $residentStats->female_count;
$maleCount = $residentStats->male_count;
$totalCount = $residentStats->total_count;
?>

<script type="text/javascript">
  function getRandomColor() {
    return '#' + Math.floor(Math.random()*16777215).toString(16);
  }

  var randomColors = [getRandomColor(), getRandomColor()];
  var femaleCount = <?php echo $femaleCount; ?>;
  var maleCount = <?php echo $maleCount; ?>;
  var totalCount = <?php echo $totalCount; ?>;

  var femalePercentage = ((femaleCount / totalCount) * 100).toFixed(2);
  var malePercentage = ((maleCount / totalCount) * 100).toFixed(2);

  var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
  var donutData = {
    labels: ['Female (' + femalePercentage + '%)', 'Male (' + malePercentage + '%)'],
    datasets: [
    {
      data: [femaleCount, maleCount],
      backgroundColor: randomColors,
    }
    ]
  };
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  };

  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  });
</script>
<?php
$mydb->setQuery("SELECT COUNT(CASE WHEN IS_REGISTERED_VOTER = 1 THEN 1 END) AS registered_voter, 
 COUNT(CASE WHEN IS_REGISTERED_VOTER = 0 THEN 1 END) AS non_registered_voter, 
 COUNT(*) AS total_count 
 FROM `tblresidents`;");
$residentVoterStats = $mydb->loadSingleResult();
$registeredVoter = $residentVoterStats->registered_voter;
$nonRegisteredVoter = $residentVoterStats->non_registered_voter;
$totalVoters = $residentVoterStats->total_count;
?>

<script type="text/javascript">
  function getRandomColor() {
    return '#' + Math.floor(Math.random()*16777215).toString(16);
  }

  var randomColors = [getRandomColor(), getRandomColor()];
  var registeredVoter = <?php echo $registeredVoter; ?>;
  var nonRegisteredVoter = <?php echo $nonRegisteredVoter; ?>;
  var totalVoters = <?php echo $totalVoters; ?>;

  var registeredPercentage = ((registeredVoter / totalVoters) * 100).toFixed(2);
  var nonRegisteredPercentage = ((nonRegisteredVoter / totalVoters) * 100).toFixed(2);

  var donutChartCanvas = $('#donutChart_voters').get(0).getContext('2d');
  var donutData = {
    labels: ['Registered Voter (' + registeredPercentage + '%)', 'Non-Registered Voter (' + nonRegisteredPercentage + '%)'],
    datasets: [
    {
      data: [registeredVoter, nonRegisteredVoter],
      backgroundColor: randomColors,
    }
    ]
  };
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  };

  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  });
</script>


<?php
$mydb->setQuery("SELECT COUNT(CASE WHEN vaccinated = 1 THEN 1 END) AS vaccinated_count, 
 COUNT(CASE WHEN vaccinated = 0 THEN 1 END) AS non_vaccinated_count, 
 COUNT(*) AS total_count 
 FROM `tblresidents`;");
$residentVaxStats = $mydb->loadSingleResult();
$vaccinatedCount = $residentVaxStats->vaccinated_count;
$nonVaccinatedCount = $residentVaxStats->non_vaccinated_count;
$totalCount = $residentVaxStats->total_count;
?>

<script type="text/javascript">
  function getRandomColor() {
    return '#' + Math.floor(Math.random()*16777215).toString(16);
  }

  var randomColors = [getRandomColor(), getRandomColor()];
  var vaccinatedCount = <?php echo $vaccinatedCount; ?>;
  var nonVaccinatedCount = <?php echo $nonVaccinatedCount; ?>;
  var totalCount = <?php echo $totalCount; ?>;

  var vaccinatedPercentage = ((vaccinatedCount / totalCount) * 100).toFixed(2);
  var nonVaccinatedPercentage = ((nonVaccinatedCount / totalCount) * 100).toFixed(2);

  var donutChartCanvas = $('#donutChart_vax').get(0).getContext('2d');
  var donutData = {
    labels: ['Vaccinated (' + vaccinatedPercentage + '%)', 'Non-Vaccinated (' + nonVaccinatedPercentage + '%)'],
    datasets: [
    {
      data: [vaccinatedCount, nonVaccinatedCount],
      backgroundColor: randomColors,
    }
    ]
  };
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  };

  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  });
</script>


<?php
$mydb->setQuery("SELECT COUNT(CASE WHEN IS_SENIOR = 1 THEN 1 END) AS senior_count, COUNT(CASE WHEN IS_SENIOR = 0 THEN 1 END) AS non_senior_count FROM `tblresidents`;");
$residentSeniorStats = $mydb->loadSingleResult();
$seniorCount = $residentSeniorStats->senior_count;
$nonSeniorCount = $residentSeniorStats->non_senior_count;
?>

<?php
$mydb->setQuery("SELECT COUNT(CASE WHEN IS_HOME_OWNER = 1 THEN 1 END) AS senior_count, 
 COUNT(CASE WHEN IS_HOME_OWNER = 0 THEN 1 END) AS non_senior_count, 
 COUNT(*) AS total_count 
 FROM `tblresidents`;");
$residentSeniorStats = $mydb->loadSingleResult();
$seniorCount = $residentSeniorStats->senior_count;
$nonSeniorCount = $residentSeniorStats->non_senior_count;
$totalCount = $residentSeniorStats->total_count;
?>

<script type="text/javascript">
  function getRandomColor() {
    return '#' + Math.floor(Math.random()*16777215).toString(16);
  }

  var randomColors = [getRandomColor(), getRandomColor()];
  var seniorCount = <?php echo $seniorCount; ?>;
  var nonSeniorCount = <?php echo $nonSeniorCount; ?>;
  var totalCount = <?php echo $totalCount; ?>;

  var seniorPercentage = ((seniorCount / totalCount) * 100).toFixed(2);
  var nonSeniorPercentage = ((nonSeniorCount / totalCount) * 100).toFixed(2);

  var donutChartCanvas = $('#donutChart_sr').get(0).getContext('2d');
  var donutData = {
    labels: ['Renter (' + seniorPercentage + '%)', 'Non Renter (' + nonSeniorPercentage + '%)'],
    datasets: [
    {
      data: [seniorCount, nonSeniorCount],
      backgroundColor: randomColors,
    }
    ]
  };
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  };

  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  });
</script>

<?php
$mydb->setQuery("
  SELECT 
    TIMESTAMPDIFF(YEAR, BIRTHDATE, CURDATE()) AS age, 
    COUNT(*) AS count 
  FROM tblresidents 
  GROUP BY age 
  ORDER BY age;
");
$ageStats = $mydb->loadResultList();

$ageLabels = [];
$ageCounts = [];

foreach ($ageStats as $row) {
  $ageLabels[] = $row->age . ' yrs';
  $ageCounts[] = $row->count;
}
?>
<script type="text/javascript">
  var ageLabels = <?php echo json_encode($ageLabels); ?>;
  var ageCounts = <?php echo json_encode($ageCounts); ?>;

  var barChartCanvas = $('#barChart_age').get(0).getContext('2d');  // You may rename the canvas ID
  var barChartData = {
    labels: ageLabels,
    datasets: [{
      label: 'Number of Residents',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      data: ageCounts
    }]
  };

  var barChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        ticks: {
          autoSkip: true,
          maxRotation: 90,
          minRotation: 45
        },
        title: {
          display: true,
          text: 'Age'
        }
      },
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: 'Number of Residents'
        }
      }
    }
  };

  new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
  });
</script>

