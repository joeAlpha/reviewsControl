
    <!-- Pagination nav -->
    <?php 
      $ELEMENTS_PER_PAGE = 6; 
      // echo $origin;
    ?>
    <nav aria-label="Page navigation example" class="<?php if($subjectResult->num_rows <= $ELEMENTS_PER_PAGE) echo 'd-none'; ?>">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link mx-1 bg-dark border-0 rounded" href="#" tabindex="-1">
        <i class="fas fa-chevron-left"></i>
      </a>
    </li>

    <?php
        $numberOfPages = ($subjectResult->num_rows / $ELEMENTS_PER_PAGE) + 1;
        $allSubjects = [];
        while($row = $subjectResult->fetch_array(MYSQLI_ASSOC)) {
            array_push($allSubjects, $row);
        }

        for($i = 1; $i <= $numberOfPages; $i++) { ?>
            <li class="page-item"> 
                <a 
                    class="page-link btn mx-1 bg-dark text-light border-0" 
                    onclick="getNewSubjectPage(
                        '<?php echo $ELEMENTS_PER_PAGE * $i - $ELEMENTS_PER_PAGE + 1; ?>',
                        '<?php echo $_COOKIE['id']; ?>',
                        '<?php echo $ELEMENTS_PER_PAGE; ?>',
                        '<?php echo $origin; ?>'
                    )" 
                >
                    <?php echo $i; ?>
                </a>
            </li>
        <?php } ?>

    <li class="page-item">
      <a class="page-link mx-1 bg-dark border-0 text-light rounded" href="#">
        <i class="fas fa-chevron-right"></i>
      </a>
    </li>
  </ul>
    </nav>