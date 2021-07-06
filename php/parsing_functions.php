<?php
  function indexPageOffersParser($id, $job_title, $company_name){
    $html_string = '
    <ul class="jobs-listing">
      <li class="job-card" id="%d">
        <div class="job-primary">
          <h2 class="job-title"><a href="#">%s</a></h2>
          <div class="job-meta">
            <a class="meta-company" href="#">%s</a>
            <span class="meta-date">Posted 14 days ago</span>
          </div>
          <div class="job-details">
            <span class="job-location">The Hague (The Netherlands)</span>
            <span class="job-type">Contract staff</span>
          </div>
        </div>
        <div class="job-logo">
          <div class="job-logo-box">
            <img src="https://i.imgur.com/ZbILm3F.png" alt="">
          </div>
        </div>
      </li>
    </ul>
    ';

    return sprintf($html_string, $id, $job_title, $company_name);
  }


  function editsPageOffersParser($job_title, $company_name, $id){
    $html_string = '
    <li class="job-card">
      <div class="job-primary">
        <h2 class="job-title"><a href="#">%s</a></h2>
        <div class="job-meta">
          <a class="meta-company" href="#">%s</a>
          <span class="meta-date">Posted 14 days ago</span>
        </div>
      </div>
      <div class="job-edit">
        <a href="./php/edit_job.php?job_id=%d">Edit</a>
        <a href="./php/delete_job_handler.php?job_id=%d">Delete</a>
      </div>
    </li>
    ';

    return sprintf($html_string, $job_title, $company_name, $id, $id);
  }

?>
