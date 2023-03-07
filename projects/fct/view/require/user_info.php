<!--User info-->
<section class='d-flex align-items-center justify-content-between text-bg-secondary' style='width: 25rem'>
    <div class="d-flex">
        <div class="d-flex align-items: center">
            <span class="material-symbols-outlined mx-2" style="font-size: 2rem;">
                account_circle
            </span>
        </div>
        <div class="col w-75 d-flex">
            <p><?php echo getGreeting() . ' ' . $_SESSION['user']['username'] ;?></p>
        </div>
    </div>
    <?php require_once 'info_data.php';?>
</section>