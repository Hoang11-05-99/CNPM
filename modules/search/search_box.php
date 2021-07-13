<?php
if(!defined('SECURITY')){
	die("Bạn không có quyền truy cập file này");
}
?>
<div id="search" class="col-lg-6 col-md-6 col-sm-12">
    <form action="index.php" class="form-inline" method="">
        <input type="hidden" name="page_layout" value="search">
        <input class="form-control mt-3" type="search" placeholder="Thuốc cần tìm" aria-label="Search" name="keyword">
        <button class="btn btn-danger mt-3" type="submit">Tìm kiếm</button>
    </form>
</div>