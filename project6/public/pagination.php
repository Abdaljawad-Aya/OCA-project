<nav class="d-flex justify-content-center text-center">
    <ul class="pagination" style="width:100%">
        <li class="page-item" style="width:30%"><a class="page-link" href="?pageno=1">First</a></li>
        <li class="page-item <?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?>" style="width:20%">
            <a class="page-link" href="<?php if ($pageno <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno - 1);
                                        } ?>">←</a>
        </li>
        <li class="page-item <?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?>" style="width:20%">
            <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno + 1);
                                        } ?>">→</a>
        </li>
        <li class="page-item" style="width:30%"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</nav>