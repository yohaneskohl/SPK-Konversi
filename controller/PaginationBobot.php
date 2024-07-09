<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($aktif > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="hitung_alternatif.php?page=<?= $aktif - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total; $i++) : ?>
            <li class="page-item <?php echo ($i == $aktif) ? 'active' : ''; ?>">
                <a class="page-link" href="hitung_alternatif.php?page=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($aktif < $total) : ?>
            <li class="page-item">
                <a class="page-link" href="hitung_alternatif.php?page=<?= $aktif + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
